<?php


namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->id(); // Récupérer l'ID de l'utilisateur connecté
        $isMyOffers = $request->query('type') === 'myoffers'; // Vérifier si "mes offres" est demandé

        // Initialiser la requête pour les offres
        $query = Offre::with(['user' => function ($q) {
            $q->whereNotNull('id'); // Ensure user exists
        }]);

        if ($isMyOffers) {
            // Afficher uniquement les offres de l'utilisateur connecté
            if (!$user_id) {
                return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos offres.');
            }
            $query->where('user_id', $user_id);
        } else {
            // Appliquer les filtres pour la liste générale
            if ($search = $request->query('search')) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            }

            if ($category = $request->query('category')) {
                $query->where('category', $category);
            }

            if ($max_price = $request->query('max_price')) {
                $query->where('price', '<=', $max_price);
            }

            if ($location = $request->query('location')) {
                $query->where('location', 'like', '%' . $location . '%');
            }

            // Appliquer le tri
            switch ($request->query('sort')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'quantity':
                    $query->orderBy('quantity', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $offers = $query->paginate(10);

        // Choisir la vue appropriée
        $view = $isMyOffers ? 'user_space.offers.MyOffers' : 'user_space.offers.index';

        return view($view, [
            'title' => $isMyOffers ? __('offers.my_offers') : __('nav.offers'),
            'offers' => $offers,
            'totalOffers' => Offre::count(),
            'newToday' => Offre::whereDate('created_at', today())->count(),
            'myOffers' => $user_id ? Offre::where('user_id', $user_id)->count() : 0,
            //'totalViews' => $user_id ? Offre::where('user_id', $user_id)->sum('views') : 0,
            //'totalSales' => $user_id ? Offre::where('user_id', $user_id)->sum('orders') : 0,
            'totalRevenue' => $user_id ? Offre::where('user_id', $user_id)->sum('price') : 0,
            'isAuthenticated' => auth()->check(), // Pass authentication status
        ]);
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', __('messages.login_required'));
        }
        return view('user_space.offers.create');
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', __('messages.login_required'));
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:fruits,legumes,cereales,produits-laitiers,viandes,autres',
            'description' => 'required|string|min:50',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|in:kg,g,l,piece,botte,panier',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'origin' => 'nullable|string|max:255',
            'certification' => 'nullable|in:bio-ab,demeter,nature-progres,ecocert',
            'status' => 'nullable|in:active,inactive,sold_out,draft',
            //'available_until' => 'nullable|date',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('offres', 'public');
                $imagePaths[] = $path;
            }
        }

        Offre::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'unit' => $validated['unit'],
            'images' => !empty($imagePaths) ? json_encode($imagePaths) : null,
            'origin' => $validated['origin'],
            'certification' => $validated['certification'],
            'status' => $validated['status'] ?? 'draft',
            //'available_until' => $validated['available_until'],
        ]);

        return redirect()->route($request->action === 'draft' ? 'offers.myoffers' : 'offers.index')
            ->with('success', __('messages.offer_created'));
    }

    public function edit($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', __('messages.login_required'));
        }

        $offre = Offre::where('id', $id)->firstOrFail();
        if ($offre->user_id !== auth()->id()) {
            return redirect()->route('offres.index')->with('error', __('messages.unauthorized'));
        }

        return view('user_space.offers.edit', compact('offre'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', __('messages.login_required'));
        }

        $offre = Offre::where('id', $id)->firstOrFail();
        if ($offre->user_id !== auth()->id()) {
            return redirect()->route('offres.index')->with('error', __('messages.unauthorized'));
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:fruits,legumes,cereales,produits-laitiers,viandes,autres',
            'description' => 'required|string|min:50',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|in:kg,g,l,piece,botte,panier',
            'new_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'origin' => 'nullable|string|max:255',
            'certification' => 'nullable|in:bio-ab,demeter,nature-progres,ecocert',
            'status' => 'nullable|in:active,inactive,sold_out,draft',
            'available_until' => 'nullable|date',
        ]);

        $imagePaths = json_decode($offre->images ?? '[]', true);
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $image) {
                $imagePaths[] = $image->store('offres', 'public');
            }
        }

        if ($request->has('remove_images')) {
            $imagePaths = array_diff($imagePaths, $request->input('remove_images', []));
        }

        $offre->update([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'unit' => $validated['unit'],
            'images' => !empty($imagePaths) ? json_encode($imagePaths) : null,
            'origin' => $validated['origin'],
            'certification' => $validated['certification'],
            'status' => $validated['status'] ?? 'draft',
            'available_until' => $validated['available_until'],
        ]);

        return redirect()->route($request->action === 'draft' ? 'offers.myoffers' : 'offers.index')
            ->with('success', __('messages.offer_updated'));
    }

    public function destroy($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', __('messages.login_required'));
        }

        $offre = Offre::where('id', $id)->firstOrFail();
        if ($offre->user_id !== auth()->id()) {
            return redirect()->route('offers.index')->with('error', __('messages.unauthorized'));
        }

        $offre->delete();
        return redirect()->route('offers.myoffers')->with('success', __('messages.offer_deleted'));
    }
}

