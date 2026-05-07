<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Public as PublicController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DonationController;

// ── Public Routes ──────────────────────────────────────────────────────────
Route::get('/', [PublicController\HomeController::class, 'index'])->name('home');
Route::get('/projects', [PublicController\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [PublicController\ProjectController::class, 'show'])->name('projects.show');
Route::get('/track', [PublicController\ComplaintController::class, 'track'])->name('complaints.track');
Route::post('/complaints', [PublicController\ComplaintController::class, 'store'])->name('complaints.store');
Route::get('/complaints/submit', [PublicController\ComplaintController::class, 'create'])->name('complaints.create');

// ── Donation Public Routes ─────────────────────────────────────────────────
Route::get('/donate', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donate', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donate/track', [DonationController::class, 'track'])->name('donations.track');
Route::get('/donate/thank-you/{donation}', [DonationController::class, 'thankYou'])->name('donations.thank-you');
Route::get('/donate/history', [DonationController::class, 'index'])->name('donations.index');
Route::get('/donate/{donation}', [DonationController::class, 'show'])->name('donations.show');

// ── Register Routes ────────────────────────────────────────────────────────
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register.store');

// ── Auth Routes ────────────────────────────────────────────────────────────
require __DIR__ . '/auth.php';

// ── Admin Routes ───────────────────────────────────────────────────────────
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('/change-password', [Admin\PasswordController::class, 'edit'])->name('password.edit');
        Route::put('/change-password', [Admin\PasswordController::class, 'update'])->name('password.update');

        // Projects
        Route::resource('projects', Admin\ProjectController::class);
        Route::post('projects/{project}/milestones', [Admin\ProjectController::class, 'storeMilestone'])->name('projects.milestones.store');
        Route::post('milestones/{milestone}/toggle', [Admin\ProjectController::class, 'toggleMilestone'])->name('milestones.toggle');
        Route::delete('milestones/{milestone}', [Admin\ProjectController::class, 'destroyMilestone'])->name('milestones.destroy');

        // Budgets
        Route::resource('budgets', Admin\BudgetController::class);

        // Expenses
        Route::get('expenses/allocations', [Admin\ExpenseController::class, 'getAllocations'])->name('expenses.allocations');
        Route::resource('expenses', Admin\ExpenseController::class);
        Route::post('expenses/{expense}/approve', [Admin\ExpenseController::class, 'approve'])->name('expenses.approve');
        Route::post('expenses/{expense}/reject', [Admin\ExpenseController::class, 'reject'])->name('expenses.reject');

        // Complaints
        Route::resource('complaints', Admin\ComplaintController::class);
        Route::post('complaints/{complaint}/respond', [Admin\ComplaintController::class, 'respond'])->name('complaints.respond');

        // Donations Admin
        Route::get('donations', [DonationController::class, 'adminIndex'])->name('donations.index');
        Route::patch('donations/{donation}/verify', [DonationController::class, 'verify'])->name('donations.verify');

        // Reports
        Route::get('reports', [Admin\ReportController::class, 'index'])->name('reports.index');
        Route::get('reports/generate/{type}', [Admin\ReportController::class, 'generate'])->name('reports.generate');
    });