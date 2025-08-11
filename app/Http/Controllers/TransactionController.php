<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Offre;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionVerification;
use App\Mail\TransactionConfirmation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos transactions.');
        }

        $query = Transaction::with(['offer', 'buyer', 'seller'])
            ->where('buyer_id', auth()->id())
            ->orWhere('seller_id', auth()->id());

        // Appliquer les filtres
        if ($type = $request->query('type')) {
            if ($type === 'purchase') {
                $query->where('buyer_id', auth()->id());
            } elseif ($type === 'sale') {
                $query->where('seller_id', auth()->id());
            }
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        if ($date_from = $request->query('date_from')) {
            $query->whereDate('created_at', '>=', $date_from);
        }

        if ($date_to = $request->query('date_to')) {
            $query->whereDate('created_at', '<=', $date_to);
        }

        if ($search = $request->query('search')) {
            $query->whereHas('offer', function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            });
        }

        $transactions = $query->paginate(10);

        // Calcul des statistiques
        $stats = [
            'activeTransactions' => Transaction::whereIn('status', ['pending', 'confirmed', 'shipped'])
                ->where('buyer_id', auth()->id())
                ->orWhere('seller_id', auth()->id())
                ->count(),
            'completedTransactions' => Transaction::where('status', 'delivered')
                ->where('buyer_id', auth()->id())
                ->orWhere('seller_id', auth()->id())
                ->count(),
            'pendingPayments' => Transaction::where('status', 'pending')
                ->where('buyer_id', auth()->id())
                ->count(),
            'monthlyTotal' => Transaction::whereMonth('created_at', now()->month)
                ->where('status', 'delivered')
                ->where('seller_id', auth()->id())
                ->sum('amount'),
        ];

        return view('user_space.transactions.MyTransactions', [
            'title' => __('transactions.my_transactions'),
            'transactions' => $transactions,
            'stats' => $stats,
        ]);
    }

    public function history(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir l\'historique.');
        }

        $query = Transaction::with(['offer', 'buyer', 'seller'])
            ->where('buyer_id', auth()->id())
            ->orWhere('seller_id', auth()->id());

        // Appliquer les filtres
        if ($period = $request->query('period')) {
            $query->whereDate('created_at', '>=', now()->subDays($period));
        }

        if ($type = $request->query('type')) {
            if ($type === 'purchase') {
                $query->where('buyer_id', auth()->id());
            } elseif ($type === 'sale') {
                $query->where('seller_id', auth()->id());
            }
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        $transactions = $query->paginate(10);

        // Calcul des statistiques
        $stats = [
            'totalTransactions' => Transaction::where('buyer_id', auth()->id())
                ->orWhere('seller_id', auth()->id())
                ->count(),
            'totalAmount' => Transaction::where('buyer_id', auth()->id())
                ->orWhere('seller_id', auth()->id())
                ->sum('amount'),
            'avgTransaction' => Transaction::where('buyer_id', auth()->id())
                    ->orWhere('seller_id', auth()->id())
                    ->avg('amount') ?? 0,
            'thisMonth' => Transaction::whereMonth('created_at', now()->month)
                ->where('buyer_id', auth()->id())
                ->orWhere('seller_id', auth()->id())
                ->count(),
        ];

        // Données pour le graphique
        $chartData = [
            'labels' => ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
            'purchases' => [],
            'sales' => [],
        ];

        for ($i = 1; $i <= 12; $i++) {
            $chartData['purchases'][] = Transaction::whereMonth('created_at', $i)
                ->where('buyer_id', auth()->id())
                ->sum('amount');
            $chartData['sales'][] = Transaction::whereMonth('created_at', $i)
                ->where('seller_id', auth()->id())
                ->sum('amount');
        }

        return view('user_space.transactions.History', [
            'title' => __('transactions.history'),
            'transactions' => $transactions,
            'stats' => $stats,
            'chartData' => $chartData,
        ]);
    }

    public function create($offerId)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer une transaction.');
        }

        $offer = Offre::findOrFail($offerId);
        if ($offer->user_id === auth()->id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas acheter votre propre offre.');
        }

        return view('transactions.create', [
            'title' => __('transactions.create'),
            'offer' => $offer,
        ]);
    }

    public function store(Request $request, $offerId)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer une transaction.');
        }

        $offer = Offre::findOrFail($offerId);
        if ($offer->user_id === auth()->id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas acheter votre propre offre.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
        ]);

        $transaction = Transaction::create([
            'offer_id' => $offerId,
            'buyer_id' => auth()->id(),
            'seller_id' => $offer->user_id,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);

        Mail::to(auth()->user()->email)->send(new TransactionVerification($transaction));
        if ($request->status === 'delivered') {
            Mail::to($offer->user->email)->send(new TransactionConfirmation($transaction));
        }

        return redirect()->route('user_space.transactions.index')->with('success', __('messages.transaction_created'));
    }

    public function show($id)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Vous devez être connecté.'], 401);
        }

        $transaction = Transaction::with(['offer', 'buyer', 'seller'])
            ->where('id', $id)
            ->where(function ($query) {
                $query->where('buyer_id', auth()->id())
                    ->orWhere('seller_id', auth()->id());
            })
            ->firstOrFail();

        return response()->json([
            'id' => $transaction->id,
            'created_at' => $transaction->created_at->format('d/m/Y'),
            'type' => $transaction->buyer_id === auth()->id() ? 'Achat' : 'Vente',
            'status' => $transaction->status,
            'product_name' => $transaction->offer->title,
            'quantity' => $transaction->quantity,
            'unit' => $transaction->offer->unit,
            'unit_price' => $transaction->unit_price,
            'amount' => $transaction->amount,
        ]);
    }

    public function cancel($id)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Vous devez être connecté.'], 401);
        }

        $transaction = Transaction::where('id', $id)
            ->where(function ($query) {
                $query->where('buyer_id', auth()->id())
                    ->orWhere('seller_id', auth()->id());
            })
            ->firstOrFail();

        if ($transaction->status !== 'pending') {
            return response()->json(['error' => 'Seules les transactions en attente peuvent être annulées.'], 403);
        }

        $transaction->update(['status' => 'cancelled']);

        return response()->json(['success' => true]);
    }

    public function continue($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour continuer une transaction.');
        }

        $transaction = Transaction::where('id', $id)
            ->where('buyer_id', auth()->id())
            ->firstOrFail();

        if ($transaction->status !== 'pending') {
            return redirect()->route('transactions.index')->with('error', 'Cette transaction ne peut pas être continuée.');
        }

        // Logique pour continuer (par exemple, redirection vers un paiement)
        return redirect()->route('transactions.index')->with('success', 'Transaction continuée.');
    }

    public function rate(Request $request, $id)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Vous devez être connecté.'], 401);
        }

        $transaction = Transaction::where('id', $id)
            ->where(function ($query) {
                $query->where('buyer_id', auth()->id())
                    ->orWhere('seller_id', auth()->id());
            })
            ->firstOrFail();

        if ($transaction->status !== 'delivered') {
            return response()->json(['error' => 'Seules les transactions livrées peuvent être notées.'], 403);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Rating::create([
            'transaction_id' => $id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return response()->json(['success' => true]);
    }

    public function invoice($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour télécharger une facture.');
        }

        $transaction = Transaction::with(['offer', 'buyer', 'seller'])
            ->where('id', $id)
            ->where(function ($query) {
                $query->where('buyer_id', auth()->id())
                    ->orWhere('seller_id', auth()->id());
            })
            ->firstOrFail();

        $pdf = Pdf::loadView('transactions.invoice', ['transaction' => $transaction]);
        return $pdf->download('invoice_txn_' . $id . '.pdf');
    }

    public function export(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour exporter les transactions.');
        }

        $query = Transaction::with(['offer', 'buyer', 'seller'])
            ->where('buyer_id', auth()->id())
            ->orWhere('seller_id', auth()->id());

        // Appliquer les filtres
        if ($type = $request->query('type')) {
            if ($type === 'purchase') {
                $query->where('buyer_id', auth()->id());
            } elseif ($type === 'sale') {
                $query->where('seller_id', auth()->id());
            }
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        if ($date_from = $request->query('date_from')) {
            $query->whereDate('created_at', '>=', $date_from);
        }

        if ($date_to = $request->query('date_to')) {
            $query->whereDate('created_at', '<=', $date_to);
        }

        if ($search = $request->query('search')) {
            $query->whereHas('offer', function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            });
        }

        $transactions = $query->get();

        $csv = fopen('php://output', 'w');
        fputcsv($csv, ['ID', 'Date', 'Type', 'Produit', 'Quantité', 'Montant', 'Statut']);
        foreach ($transactions as $transaction) {
            fputcsv($csv, [
                $transaction->id,
                $transaction->created_at->format('d/m/Y'),
                $transaction->buyer_id === auth()->id() ? 'Achat' : 'Vente',
                $transaction->offer->title,
                $transaction->quantity . ' ' . $transaction->offer->unit,
                $transaction->amount . '€',
                $transaction->status,
            ]);
        }
        fclose($csv);

        return response()->streamDownload(function () use ($csv) {
            echo ob_get_clean();
        }, 'transactions_' . now()->format('Ymd') . '.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }
}
