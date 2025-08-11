@extends('layouts.user_space')

@section('title', __('Création de demande'))

@section('content')
    <div class="container-fluid px-4 py-6">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-2 text-primary-green">{{ __('Création de demande') }}</h1>
                        <p class="text-muted">{{ __('Crée votre propre demande') }}</p>
                    </div>
                    <a href="{{ route('requests.index') }}" class="btn btn-outline-primary-green">
                        <i class="fas fa-arrow-left me-2"></i>{{ __('retour') }}
                    </a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('requests.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">{{ __('titre') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">{{ __('categorie') }} <span class="text-danger">*</span></label>
                                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                            <option value="">{{ __('Sélectionner une catégorie') }}</option>
                                            <option value="fruits" {{ old('category') == 'fruits' ? 'selected' : '' }}>{{ __('fruits') }}</option>
                                            <option value="legumes" {{ old('category') == 'legumes' ? 'selected' : '' }}>{{ __('légumes') }}</option>
                                            <option value="cereales" {{ old('category') == 'cereales' ? 'selected' : '' }}>{{ __('céréale') }}</option>
                                            <option value="produits-laitiers" {{ old('category') == 'produits-laitiers' ? 'selected' : '' }}>{{ __('produits-laitiers') }}</option>
                                            <option value="viandes" {{ old('category') == 'viandes' ? 'selected' : '' }}>{{ __('viande') }}</option>
                                            <option value="autres" {{ old('category') == 'autres' ? 'selected' : '' }}>{{ __('autre') }}</option>
                                        </select>
                                        @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('description') }} <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="budget" class="form-label">{{ __('Budget maximum') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control @error('budget') is-invalid @enderror"
                                                   id="budget" name="budget" value="{{ old('budget') }}" step="0.01" min="0" required>
                                            <span class="input-group-text">DH</span>
                                        </div>
                                        @error('budget')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">{{ __('Quantité') }} <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                               id="quantity" name="quantity" value="{{ old('quantity') }}" min="1" required>
                                        @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="unit" class="form-label">{{ __('Unité') }} <span class="text-danger">*</span></label>
                                        <select class="form-select @error('unit') is-invalid @enderror" id="unit" name="unit" required>
                                            <option value="">{{ __('Selectionner unité') }}</option>
                                            <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>{{ __('kg') }}</option>
                                            <option value="g" {{ old('unit') == 'g' ? 'selected' : '' }}>{{ __('g') }}</option>
                                            <option value="l" {{ old('unit') == 'l' ? 'selected' : '' }}>{{ __('l') }}</option>
                                            <option value="piece" {{ old('unit') == 'piece' ? 'selected' : '' }}>{{ __('piece') }}</option>
                                            <option value="botte" {{ old('unit') == 'botte' ? 'selected' : '' }}>{{ __('botte') }}</option>
                                            <option value="panier" {{ old('unit') == 'panier' ? 'selected' : '' }}>{{ __('panier') }}</option>
                                        </select>
                                        @error('unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="location" class="form-label">{{ __('destination') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                                               id="location" name="location" value="{{ old('location') }}" required>
                                        @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="urgency" class="form-label">{{ __('Priorité') }} <span class="text-danger">*</span></label>
                                        <select class="form-select @error('urgency') is-invalid @enderror" id="urgency" name="urgency" required>
                                            <option value="">{{ __('Sélectionner urgence de votre demande') }}</option>
                                            <option value="low" {{ old('urgency') == 'low' ? 'selected' : '' }}>{{ __('pas urgente') }}</option>
                                            <option value="medium" {{ old('urgency') == 'medium' ? 'selected' : '' }}>{{ __('moins urgente') }}</option>
                                            <option value="high" {{ old('urgency') == 'high' ? 'selected' : '' }}>{{ __('urgente') }}</option>
                                        </select>
                                        @error('urgency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="needed_by" class="form-label">{{ __('Besion en') }} <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('needed_by') is-invalid @enderror"
                                       id="needed_by" name="needed_by" value="{{ old('needed_by') }}" required>
                                @error('needed_by')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary-green">
                                    <i class="fas fa-check me-2"></i>{{ __('Publier demande') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
