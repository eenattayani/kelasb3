<?php

namespace App\Http\Controllers;

use App\Models\OtherIncome;
use Illuminate\Http\Request;

class OtherIncomeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required','date'],
            'amount' => ['required','integer','min:0'],
            'source' => ['nullable','string','max:100'],
            'description' => ['nullable','string','max:500'],
        ]);
        $validated['created_by'] = auth()->id();
        OtherIncome::create($validated);
        return back()->with('ok','Pengeluaran dicatat.');
    }
}
