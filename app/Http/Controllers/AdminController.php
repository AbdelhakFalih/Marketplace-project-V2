<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Offre;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $stats = [
            'users' => User::count(),
            'profiles' => Profile::count(),
            'offers' => Offre::count(),
            'transactions' => Transaction::count(),
        ];

        return view('admin.dashboard', [
            'title' => __('nav.dashboard'),
            'stats' => $stats,
        ]);
    }

    public function usersIndex(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $query = User::with('profile');
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->role) {
            $query->where('role', $request->role);
        }
        $users = $query->paginate(10);

        return view('admin.users.index', [
            'title' => __('users.title'),
            'users' => $users,
        ]);
    }

    public function usersShow($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $user = User::with('profile')->findOrFail($id);
        return view('admin.users.show', [ // Rename user_detail to show
            'title' => __('users.details'),
            'user' => $user,
        ]);
    }

    public function usersEdit($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $user = User::with('profile')->findOrFail($id);
        return view('admin.users.edit', [
            'title' => __('users.edit'),
            'user' => $user,
        ]);
    }

    public function usersUpdate(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:cooperative,commerçant,admin',
            'status' => 'sometimes|in:active,inactive,suspended', // Add status if needed
        ]);
        $user->update($validated);
        return redirect()->route('admin.users.index')->with('success', __('messages.user_updated'));
    }

    public function usersDelete($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', __('messages.user_deleted'));
    }

    public function stats(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $query = Transaction::query();
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $usersCount = User::count();
        $offersCount = Offre::count();
        $transactionsTotal = $query->sum('amount');
        $transactionsByMonth = Transaction::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        return view('admin.stats', [
            'title' => __('admin.stats'),
            'users' => $usersCount,
            'offers' => $offersCount,
            'transactions' => $transactionsTotal,
            'transactionsByMonth' => $transactionsByMonth,
        ]);
    }
}
