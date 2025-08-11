@extends('layouts.app')

@section('title')
    <span data-translate="contact.title">Contact</span>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="display-4 fw-bold mb-4" data-translate="contact.title">Contactez-nous</h1>
                <p class="lead max-w-3xl mx-auto" data-translate="contact.subtitle">Nous sommes là pour vous aider. N'hésitez pas à nous contacter pour toute question ou suggestion.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <h3 class="font-bold mb-4" data-translate="contact.form.title">Envoyez-nous un message</h3>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span data-translate="contact.form.success">{{ session('success') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('contact.send') }}" method="POST" id="contactForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name" class="form-label" data-translate="contact.form.first_name">Prénom <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                               id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                        <div class="invalid-feedback" data-translate="contact.form.error.first_name">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name" class="form-label" data-translate="contact.form.last_name">Nom <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                               id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                        <div class="invalid-feedback" data-translate="contact.form.error.last_name">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label" data-translate="contact.form.email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <div class="invalid-feedback" data-translate="contact.form.error.email">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label" data-translate="contact.form.phone">Téléphone</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                               id="phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="invalid-feedback" data-translate="contact.form.error.phone">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label" data-translate="contact.form.message">Votre message <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('message') is-invalid @enderror"
                                              id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="invalid-feedback" data-translate="contact.form.error.message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary" id="submitBtn" data-translate="contact.form.submit">Envoyer</button>
                                <span id="spinner" class="d-none spinner-border spinner-border-sm me-2"></span>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="font-bold mb-3" data-translate="contact.info.title">Nos coordonnées</h5>
                            <ul class="list-none mb-4 text-gray-600">
                                <li><strong data-translate="contact.info.email">Email :</strong> support@marketplace.com</li>
                                <li><strong data-translate="contact.info.phone">Téléphone :</strong> +33 1 23 45 67 89</li>
                                <li><strong data-translate="contact.info.address">Adresse :</strong> 123 Rue de la Paix, 75001 Paris, France</li>
                            </ul>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-outline-info btn-sm">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-sm">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Link -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="font-bold mb-3" data-translate="contact.faq.title">Besoin d'aide rapide ?</h5>
                            <p class="text-gray-600 mb-3" data-translate="contact.faq.text">Consultez notre FAQ pour trouver des réponses immédiates.</p>
                            <a href="{{ route('faq') }}" class="btn btn-outline-primary" data-translate="contact.faq.link">Voir la FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-translate="contact.map.title">Notre localisation</h2>
                <p class="text-lg text-gray-600" data-translate="contact.map.subtitle">Venez nous rendre visite à notre bureau parisien</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="aspect-video bg-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-map-marked-alt text-4xl text-gray-400 mb-3"></i>
                        <p class="text-gray-600" data-translate="contact.map.text">Carte interactive</p>
                        <p class="text-sm text-gray-500" data-translate="contact.map.address">123 Rue de la Paix, 75001 Paris</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const spinner = document.getElementById('spinner');

            form.addEventListener('submit', function(e) {
                submitBtn.disabled = true;
                spinner.classList.remove('d-none');
                submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span><span data-translate="contact.form.sending">Envoi en cours...</span>`;
            });

            // Character counter for message
            const messageTextarea = document.getElementById('message');
            const maxLength = 1000;

            if (messageTextarea) {
                const counter = document.createElement('div');
                counter.className = 'text-muted text-sm mt-1';
                counter.innerHTML = `0/${maxLength} <span data-translate="contact.form.characters">caractères</span>`;
                messageTextarea.parentNode.appendChild(counter);

                function updateCounter() {
                    const length = messageTextarea.value.length;
                    counter.innerHTML = `${length}/${maxLength} <span data-translate="contact.form.characters">caractères</span>`;

                    counter.classList.toggle('text-warning', length > maxLength * 0.9 && length < maxLength);
                    counter.classList.toggle('text-danger', length >= maxLength);
                }

                messageTextarea.addEventListener('input', updateCounter);

                // Update counter on language change
                document.addEventListener('languageChanged', updateCounter);
            }
        });
    </script>
@endpush
