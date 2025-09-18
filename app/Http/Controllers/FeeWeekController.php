<?php

namespace App\Http\Controllers;

use App\Models\FeeWeek;
use Illuminate\Http\Request;

class FeeWeekController extends Controller
{
    public function index()
    {
        $feeWeeks = FeeWeek::where('week_of_month', 5)
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return view('admin.feeweeks.index', compact('feeWeeks'));
    }

    public function edit(FeeWeek $feeweek)
    {
        return view('admin.feeweeks.edit', compact('feeweek'));
    }

    public function update(Request $request, FeeWeek $feeweek)
    {
        $data = $request->validate([
            'due_amount' => ['required','integer','min:0'],
        ]);

        $feeweek->update($data);

        return redirect()->route('feeweeks.index')->with('ok','Nilai due_amount berhasil diperbarui.');
    }
}
