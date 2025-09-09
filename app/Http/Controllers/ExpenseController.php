<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required','date'],
            'amount' => ['required','integer','min:0'],
            'category' => ['nullable','string','max:100'],
            'description' => ['nullable','string','max:500'],
        ]);
        $validated['created_by'] = auth()->id();
        Expense::create($validated);
        return back()->with('ok','Pengeluaran dicatat.');
    }
}
