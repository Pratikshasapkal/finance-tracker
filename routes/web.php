<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('incomes', IncomeController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('savings', SavingController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
    Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
    Route::post('/income', [IncomeController::class, 'store'])->name('income.store');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Edit Routes
Route::get('/incomes/{income}/edit', [IncomeController::class, 'edit'])->name('incomes.edit');
Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
Route::get('/savings/{saving}/edit', [SavingController::class, 'edit'])->name('savings.edit');

// Update Routes
Route::put('/incomes/{income}', [IncomeController::class, 'update'])->name('incomes.update');
Route::put('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');
Route::put('/savings/{saving}', [SavingController::class, 'update'])->name('savings.update');

// Delete Routes
Route::delete('/incomes/{income}', [IncomeController::class, 'destroy'])->name('incomes.destroy');
Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
Route::delete('/savings/{saving}', [SavingController::class, 'destroy'])->name('savings.destroy');

Route::get('/reports/pdf', [ReportController::class, 'downloadPDF'])->name('reports.pdf');

Route::get('/savings/{id}/edit', [SavingController::class, 'edit'])->name('savings.edit');
Route::put('/savings/{id}', [SavingController::class, 'update'])->name('savings.update');



require __DIR__.'/auth.php';
