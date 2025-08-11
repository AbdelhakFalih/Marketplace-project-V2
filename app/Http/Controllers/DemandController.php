<?php

namespace App\Http\Controllers;

use App\Models\Request; // Utiliser le modèle Request
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller;

class DemandController extends Controller
{
    public function index(HttpRequest $request)
    {
        $query = Request::with('user');

        // Appliquer les filtres
        if ($search = $request->query('search')) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        if ($category = $request->query('category')) {
            $query->where('category', $category);
        }

        if ($max_budget = $request->query('max_budget')) {
            $query->where('budget', '<=', $max_budget);
        }

        if ($location = $request->query('location')) {
            $query->where('location', 'like', '%' . $location . '%');
        }

        if ($urgency = $request->query('urgency')) {
            $query->where('urgency', $urgency);
        }

        $requests = $query->paginate(10);

        return view('requests.index', [
            'title' => __('nav.demands'),
            'requests' => $requests,
            'totalRequests' => Request::count(),
            'urgentRequests' => Request::where('urgency', 'high')->count(),
        ]);
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer une demande.');
        }

        return view('user_space.requests.create', [
            'title' => __('user_space.requests.create'),
        ]);
    }

    public function store(HttpRequest $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour créer une demande.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'category' => 'required|in:fruits,legumes,cereales,produits-laitiers,viandes,autres',
            'budget' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|in:kg,g,l,piece,botte,panier',
            'location' => 'required|string|max:255',
            'urgency' => 'required|in:low,medium,high',
            'needed_by' => 'required|date|after:today',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        Request::create($data);

        return redirect()->route('requests.index')->with('success', __('messages.demand_created'));
    }

    public function show($id)
    {
        $requestModel = Request::with('user')->where('id', $id)->firstOrFail();

        return view('requests.show', [
            'title' => $requestModel->title,
            'request' => $requestModel,
        ]);
    }

    public function respond($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour répondre à une demande.');
        }

        $requestModel = Request::where('id', $id)->firstOrFail();

        return view('requests.respond', [
            'title' => __('demands.respond'),
            'request' => $requestModel,
        ]);
    }

    public function storeResponse(HttpRequest $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour répondre à une demande.');
        }

        $requestModel = Request::where('id', $id)->firstOrFail();

        $request->validate([
            'message' => 'required|string|min:10',
            'offer_id' => 'nullable|exists:offres,id', // Optionnel : proposer une offre existante
        ]);

        // Logique pour enregistrer la réponse (par exemple, dans une table responses)
        // Pour l'exemple, on suppose une table responses avec les champs : request_id, user_id, message, offer_id
        \App\Models\Response::create([
            'request_id' => $id,
            'user_id' => auth()->id(),
            'message' => $request->message,
            'offer_id' => $request->offer_id,
        ]);

        // Incrémenter le compteur de réponses
        $requestModel->increment('responses_count');

        return redirect()->route('requests.show', $id)->with('success', __('messages.response_sent'));
    }

    public function edit($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour modifier une demande.');
        }

        $requestModel = Request::where('id', $id)->firstOrFail();
        if ($requestModel->user_id !== auth()->id()) {
            return redirect()->route('requests.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cette demande.');
        }

        return view('requests.edit', [
            'title' => __('demands.edit'),
            'request' => $requestModel,
        ]);
    }

    public function update(HttpRequest $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour modifier une demande.');
        }

        $requestModel = Request::where('id', $id)->firstOrFail();
        if ($requestModel->user_id !== auth()->id()) {
            return redirect()->route('requests.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cette demande.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:20',
            'category' => 'required|in:fruits,legumes,cereales,produits-laitiers,viandes,autres',
            'budget' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|in:kg,g,l,piece,botte,panier',
            'location' => 'required|string|max:255',
            'urgency' => 'required|in:low,medium,high',
            'needed_by' => 'required|date|after:today',
        ]);

        $requestModel->update($request->all());

        return redirect()->route('requests.index')->with('success', __('messages.demand_updated'));
    }

    public function destroy($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour supprimer une demande.');
        }

        $requestModel = Request::where('id', $id)->firstOrFail();
        if ($requestModel->user_id !== auth()->id()) {
            return redirect()->route('requests.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette demande.');
        }

        $requestModel->delete();

        return redirect()->route('requests.index')->with('success', __('messages.demand_deleted'));
    }
}
