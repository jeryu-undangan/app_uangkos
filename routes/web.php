<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [BudgetController::class, 'index'])->name('budget.index');
    Route::post('/transactions/expense', [BudgetController::class, 'storeExpense'])->name('transactions.expense');
    Route::post('/transactions/income', [BudgetController::class, 'storeIncome'])->name('transactions.income');
    Route::delete('/transactions/{transaction}', [BudgetController::class, 'destroy'])->name('transactions.destroy');
    Route::put('/budget', [BudgetController::class, 'updateBudget'])->name('budget.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
