<footer class="py-16 bg-gradient-to-r from-green-600 to-green-400 text-white py-5 mt-auto dark:bg-green-800">
    <div class="container mx-auto px-4">
        <div class="row">
            <!-- Logo and Description -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="flex items-center mb-3">
                    <div class="bg-green-700 rounded-lg p-2 mr-2 shadow-sm">
                        <i class="fas fa-handshake text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="mb-0 font-bold text-white" data-translate="site.name">CoopMarket</h4>
                        <small class="text-gray-200 dark:text-gray-300" data-translate="site.tagline">Marketplace Coopérative</small>
                    </div>
                </div>
                <p class="text-white mb-3 dark:text-gray-200" data-translate="footer.description">
                    La première marketplace dédiée aux coopératives marocaines. Découvrez des produits authentiques et soutenez l'économie sociale et solidaire.
                </p>

                <!-- Social Media -->
                <div class="flex gap-2">
                    <a href="#" class="btn btn-outline-light btn-sm hover:bg-gray-200 hover:text-green-800" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm hover:bg-gray-200 hover:text-green-800" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm hover:bg-gray-200 hover:text-green-800" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm hover:bg-gray-200 hover:text-green-800" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm hover:bg-gray-200 hover:text-green-800" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="text-white mb-3 font-bold dark:text-gray-200" data-translate="footer.quick_links">Liens Rapides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="<?php echo e(route('home')); ?>" class="text-white hover:text-gray-200 dark:hover:text-gray-300" data-translate="nav.home">Accueil</a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo e(route('home')); ?>" class="text-white hover:text-gray-200 dark:hover:text-gray-300" data-translate="nav.products">Produits</a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo e(route('home')); ?>" class="text-white hover:text-gray-200 dark:hover:text-gray-300" data-translate="nav.cooperatives">Coopératives</a>
                    </li>
                    <li class="mb-2">
                        <a href="<?php echo e(route('home')); ?>" class="text-white hover:text-gray-200 dark:hover:text-gray-300" data-translate="nav.categories">Catégories</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-white mb-3 font-bold dark:text-gray-200" data-translate="footer.contact">Contact</h5>
                <div class="text-white dark:text-gray-200">
                    <div class="mb-2">
                        <i class="fas fa-phone mr-2"></i>
                        <span data-translate="contact.phone">+212 123 456 789</span>
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-envelope mr-2"></i>
                        <span data-translate="contact.email">contact@marketplace.ma</span>
                    </div>
                    <div>
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span data-translate="contact.address">Casablanca, Maroc</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Certifications and Partners -->
        <div class="row py-4 border-t border-gray-500 dark:border-gray-600">
            <div class="col-md-6">
                <h6 class="text-white mb-3 font-bold dark:text-gray-200" data-translate="footer.certifications">Certifications & Partenaires</h6>
                <div class="flex gap-3 items-center">
                    <div class="bg-white rounded p-2 dark:bg-gray-700">
                        <img src="<?php echo e(asset('images/ssl-secure.png')); ?>" alt="SSL Secure" class="h-8">
                    </div>
                    <div class="bg-white rounded p-2 dark:bg-gray-700">
                        <img src="<?php echo e(asset('images/payment-secure.png')); ?>" alt="Paiement Sécurisé" class="h-8">
                    </div>
                    <div class="bg-white rounded p-2 dark:bg-gray-700">
                        <img src="<?php echo e(asset('images/eco-friendly.png')); ?>" alt="Éco-responsable" class="h-8">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h6 class="text-white mb-3 font-bold dark:text-gray-200" data-translate="footer.payment_methods">Moyens de Paiement</h6>
                <div class="flex gap-2 items-center">
                    <i class="fab fa-cc-visa text-blue-600 dark:text-blue-400 text-2xl"></i>
                    <i class="fab fa-cc-mastercard text-yellow-600 dark:text-yellow-400 text-2xl"></i>
                    <i class="fab fa-cc-paypal text-blue-500 dark:text-blue-300 text-2xl"></i>
                    <i class="fas fa-mobile-alt text-green-600 dark:text-green-400 text-2xl"></i>
                    <span class="text-gray-200 text-sm dark:text-gray-300" data-translate="footer.mobile_money">+ Mobile Money</span>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row pt-4 border-t border-gray-500 dark:border-gray-600">
            <div class="col-md-6">
                <p class="text-white text-sm mb-0 dark:text-gray-200">
                    © <?php echo e(date('Y')); ?> <span data-translate="site.name">CoopMarket</span>.
                    <span data-translate="footer.rights">Tous droits réservés.</span>
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="text-white text-sm mb-0 dark:text-gray-200">
                    <span data-translate="footer.made_with">Fait avec</span>
                    <i class="fas fa-heart text-red-500 dark:text-red-400"></i>
                    <span data-translate="footer.for_cooperatives">pour les coopératives marocaines</span>
                </p>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\Users\hp\Application-Marketplace\resources\views/components/footer.blade.php ENDPATH**/ ?>