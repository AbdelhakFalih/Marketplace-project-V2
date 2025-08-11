<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\TransactionController;

// Page d'accueil et pages liées
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');
Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
Route::get('/offer/detail/{id}', [OfferController::class, 'showOfferdetail'])->name('offers.detail');
Route::get('/offers/myoffers', [OfferController::class, 'index'])->name('offers.myoffers')->defaults('type', 'myoffers');
Route::get('/offers/create', [OfferController::class, 'create'])->name('offers.create');
Route::post('/offers', [OfferController::class, 'store'])->name('offers.store');
Route::get('/offers/{id}/edit', [OfferController::class, 'edit'])->name('offers.edit');
Route::put('/offers/{id}', [OfferController::class, 'update'])->name('offers.update');
Route::delete('/offers/{id}', [OfferController::class, 'destroy'])->name('offers.destroy');

// Routes pour les demandes
Route::get('/requests', [DemandController::class, 'index'])->name('requests.index');
Route::get('/requests/create', [DemandController::class, 'create'])->name('requests.create');
Route::post('/requests', [DemandController::class, 'store'])->name('requests.store');
Route::get('/requests/{id}', [DemandController::class, 'show'])->name('requests.show');
Route::get('/requests/{id}/respond', [DemandController::class, 'respond'])->name('requests.respond');
Route::post('/requests/{id}/respond', [DemandController::class, 'storeResponse'])->name('requests.storeResponse');
Route::get('/requests/{id}/edit', [DemandController::class, 'edit'])->name('requests.edit');
Route::put('/requests/{id}', [DemandController::class, 'update'])->name('requests.update');
Route::delete('/requests/{id}', [DemandController::class, 'destroy'])->name('requests.destroy');

// Admin routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
    Route::get('/users/{id}', [AdminController::class, 'usersShow'])->name('admin.users.show'); // Add for details
    Route::get('/users/{id}/edit', [AdminController::class, 'usersEdit'])->name('admin.users.edit');
    Route::put('/users/{id}', [AdminController::class, 'usersUpdate'])->name('admin.users.update'); // Change to PUT
    Route::delete('/users/{id}', [AdminController::class, 'usersDelete'])->name('admin.users.delete'); // Add delete
    Route::get('/stats', [AdminController::class, 'stats'])->name('admin.stats');
    Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'usersStore'])->name('admin.users.store');
});
// Connexion et réinitialisation de mot de passe
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/password/reset', [LoginController::class, 'showResetForm'])->name('password.request');
Route::post('/password/email', [LoginController::class, 'sendResetLink'])->name('password.email');

// Inscription et authentification
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
Route::get('/email/verify/{token}', [RegisterController::class, 'verifyEmail'])->name('email.verify');

// User routes
Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('user.dashboard');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('user.profile');
Route::get('/profile/edit/avatar', [ProfileController::class, 'editAvatar'])->name('user.profile.edit.avatar');
Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('user.profile.update.avatar');
Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('user.profile.edit');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('user.profile.update');
Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('user.password.edit');
Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('user.password.update');

// Transactions
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');
Route::get('/transactions/create/{offerId}', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions/{offerId}', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::post('/transactions/{id}/cancel', [TransactionController::class, 'cancel'])->name('transactions.cancel');
Route::post('/transactions/{id}/continue', [TransactionController::class, 'continue'])->name('transactions.continue');
Route::post('/transactions/{id}/rate', [TransactionController::class, 'rate'])->name('transactions.rate');
Route::get('/transactions/{id}/invoice', [TransactionController::class, 'invoice'])->name('transactions.invoice');
Route::get('/transactions/export', [TransactionController::class, 'export'])->name('transactions.export');
