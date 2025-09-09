<?php

namespace App\Http\Controllers;

use App\Models\{Feeweek,Payment,Student,Expense,OtherIncome};
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function monthly(Request $request)
    {
        $year = $request->integer('year', now()->year);
        $month = $request->integer('month', now()->month);
        $start = Carbon::create($year,$month,1)->startOfMonth();
        $end   = $start->copy()->endOfMonth();

        $weeks = FeeWeek::where('year',$year)->where('month',$month)->pluck('id');
        $totalStudents = Student::where('aktif',1)->count();

        $totalDue = FeeWeek::where('year',$year)->where('month',$month)->sum('due_amount') * $totalStudents;
        $totalPaid = Payment::whereIn('fee_week_id',$weeks)->sum('amount');
        $otherIncome = OtherIncome::whereBetween('date',[$start,$end])->sum('amount');
        $expenses = Expense::whereBetween('date',[$start,$end])->sum('amount');
        $cashflow = $totalPaid + $otherIncome - $expenses;

        return view('admin.reports.monthly', compact(
            'year','month','totalStudents','totalDue','totalPaid','otherIncome','expenses','cashflow'
        ));
    }
}
