@extends('layouts.admin')

@section('title', 'Détails utilisateur')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Détails de l'utilisateur</h1>
        <div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Modifier
            </a>
            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <i class="fas fa-trash me-2"></i>Supprimer
                </button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil utilisateur</h6>
                </div>
                <div class="card-body text-center">
                    <div class="w-32 h-32 bg-gray-200 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="Avatar" class="w-32 h-32 rounded-circle object-cover">
                        @else
                            <i class="fas fa-user fa-3x text-gray-400"></i>
                        @endif
                    </div>
                    <h5 class="card-title mb-1">{{ $user->name }}</h5>
                    <p class="text-muted mb-2">{{ $user->email }}</p>
                    <span class="badge bg-{{ $user->status == 'active' ? 'success' : ($user->status == 'inactive' ? 'secondary' : 'danger') }} mb-3">
                    {{ ucfirst($user->status) }}
                </span>
                    <div class="mb-3">
                    <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'cooperative' ? 'success' : 'info') }}">
                        {{ ucfirst($user->role) }}
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
