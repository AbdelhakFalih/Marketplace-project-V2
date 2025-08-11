@extends('layouts.user_space')

@section('title', __('requests.respond'))

@section('content')
    <div class="container-fluid px-4 py-6">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-2 text-primary-green">{{ __('requests.respond') }}</h1>
                        <p class="text-muted">{{ __('requests.respond_subtitle') }}</p>
                    </div>
                    <a href="{{ route('requests.show', $request->id) }}" class="btn btn-outline-primary-green">
                        <i class="fas fa-arrow-left me-2"></i>{{ __('common.back') }}
                    </a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>{{ $request->title }}</h5>
                        <p class="text-muted">{{ $request->description }}</p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-user me-1"></i>{{ $request->user->name }} |
                                <i class="fas fa-map-marker-alt me-1"></i>{{ $request->location }} |
                                <i class="fas fa-calendar me-1"></i>{{ $request->needed_by }}
                            </small>
                        </div>

                        <form method="POST" action="{{ route('requests.storeResponse', $request->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="message" class="form-label">{{ __('requests.response_message') }} <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror"
                                          id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="offer_id" class="form-label">{{ __('requests.link_offer') }}</label>
                                <select class="form-select" id="offer_id" name="offer_id">
                                    <option value="">{{ __('requests.no_offer') }}</option>
                                    @foreach(auth()->user()->offres as $offer)
                                        <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary-green">
                                    <i class="fas fa-reply me-2"></i>{{ __('requests.submit_response') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
