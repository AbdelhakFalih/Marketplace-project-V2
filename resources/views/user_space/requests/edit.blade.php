@extends('layouts.user_space')

@section('title', __('requests.edit'))

@section('content')
    <div class="container-fluid px-4 py-6">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-2 text-primary-green">{{ __('requests.edit') }}</h1>
                        <p class="text-muted">{{ $request->title }}</p>
                    </div>
                    <div>
                        <a href="{{ route('requests.show', $request->id) }}" class="btn btn-outline-primary-green me-2">
                            <i class="fas fa-eye me-2"></i>{{ __('requests.view') }}
                        </a>
                        <a href="{{ route('requests.index') }}" class="btn btn-outline-primary-green">
                            <i class="fas fa-arrow-left me-2"></i>{{ __('common.back') }}
                        </a>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('requests.update', $request->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">{{ __('requests.title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               id="title" name="title" value="{{ old('title', $request->title) }}" required>
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">{{ __('requests.category') }} <span class="text-danger">*</span></label>
                                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                            <option value="">{{ __('requests.select_category') }}</option>
                                            <option value="fruits" {{ old('category', $request->category) == 'fruits' ? 'selected' : '' }}>{{ __('requests.fruits') }}</option>
                                            <option value="legumes" {{ old('category', $request->category) == 'legumes' ? 'selected' : '' }}>{{ __('requests.vegetables') }}</option>
                                            <option value="cereales" {{ old('category', $request->category) == 'cereales' ? 'selected' : '' }}>{{ __('requests.cereals') }}</option>
                                            <option value="produits-laitiers" {{ old('category', $request->category) == 'produits-laitiers' ? 'selected' : '' }}>{{ __('requests.dairy') }}</option>
                                            <option value="viandes" {{ old('category', $request->category) == 'viandes' ? 'selected' : '' }}>{{ __('requests.meat') }}</option>
                                            <option value="autres" {{ old('category', $request->category) == 'autres' ? 'selected' : '' }}>{{ __('requests.other') }}</option>
                                        </select>
                                        @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('requests.description') }} <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="4" required>{{ old('description', $request->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="budget" class="form-label">{{ __('requests.max_budget') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control @error('budget') is-invalid @enderror"
                                                   id="budget" name="budget" value="{{ old('budget', $request->budget) }}" step="0.01" min="0" required>
                                            <span class="input-group-text">€</span>
                                        </div>
                                        @error('budget')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">{{ __('requests.quantity') }} <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                               id="quantity" name="quantity" value="{{ old('quantity', $request->quantity) }}" min="1" required>
                                        @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="unit" class="form-label">{{ __('requests.unit') }} <span class="text-danger">*</span></label>
                                        <select class="form-select @error('unit') is-invalid @enderror" id="unit" name="unit" required>
                                            <option value="">{{ __('requests.select_unit') }}</option>
                                            <option value="kg" {{ old('unit', $request->unit) == 'kg' ? 'selected' : '' }}>{{ __('requests.kg') }}</option>
                                            <option value="g" {{ old('unit', $request->unit) == 'g' ? 'selected' : '' }}>{{ __('requests.g') }}</option>
                                            <option value="l" {{ old('unit', $request->unit) == 'l' ? 'selected' : '' }}>{{ __('requests.l') }}</option>
                                            <option value="piece" {{ old('unit', $request->unit) == 'piece' ? 'selected' : '' }}>{{ __('requests.piece') }}</option>
                                            <option value="botte" {{ old('unit', $request->unit) == 'botte' ? 'selected' : '' }}>{{ __('requests.botte') }}</option>
                                            <option value="panier" {{ old('unit', $request->unit) == 'panier' ? 'selected' : '' }}>{{ __('requests.panier') }}</option>
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
                                        <label for="location" class="form-label">{{ __('requests.location') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                                               id="location" name="location" value="{{ old('location', $request->location) }}" required>
                                        @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="urgency" class="form-label">{{ __('requests.urgency') }} <span class="text-danger">*</span></label>
                                        <select class="form-select @error('urgency') is-invalid @enderror" id="urgency" name="urgency" required>
                                            <option value="">{{ __('requests.select_urgency') }}</option>
                                            <option value="low" {{ old('urgency', $request->urgency) == 'low' ? 'selected' : '' }}>{{ __('requests.low') }}</option>
                                            <option value="medium" {{ old('urgency', $request->urgency) == 'medium' ? 'selected' : '' }}>{{ __('requests.medium') }}</option>
                                            <option value="high" {{ old('urgency', $request->urgency) == 'high' ? 'selected' : '' }}>{{ __('requests.high') }}</option>
                                        </select>
                                        @error('urgency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="needed_by" class="form-label">{{ __('requests.needed_by') }} <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('needed_by') is-invalid @enderror"
                                       id="needed_by" name="needed_by" value="{{ old('needed_by', $request->needed_by) }}" required>
                                @error('needed_by')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary-green">
                                    <i class="fas fa-check me-2"></i>{{ __('requests.update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
