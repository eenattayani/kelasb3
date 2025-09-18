<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    StudentController, PaymentController, ExpenseController,
    FeeWeekController,
    OtherIncomeController, ReportController, ParentController,
    TransactionController
};

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', fn() => redirect()->route('login'));

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('payments', [PaymentController::class,'index'])->name('payments.index');
    Route::post('payments', [PaymentController::class,'store'])->name('payments.store');
    Route::delete('payments/{payment}', [PaymentController::class,'destroy'])->name('payments.destroy');

    Route::post('expenses', [ExpenseController::class,'store'])->name('expenses.store');
    Route::post('incomes', [OtherIncomeController::class,'store'])->name('incomes.store');

    Route::get('reports/monthly', [ReportController::class,'monthly'])->name('reports.monthly');

    Route::resource('feeweeks', FeeWeekController::class)->only(['index','edit','update']);

    
});



Route::middleware(['auth','role:parent,admin'])->group(function () {
    Route::get('parent/payments', [ParentController::class,'payments'])->name('parent.payments');
    
    Route::resource('students', StudentController::class);

    Route::resource('transactions', TransactionController::class)->only(['index', 'create', 'store', 'destroy']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
