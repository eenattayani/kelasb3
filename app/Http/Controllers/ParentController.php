<?php

namespace App\Http\Controllers;

use App\Models\{Student,FeeWeek,Payment};
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function payments(Request $request)
    {
        $user = auth()->user();
        $year = $request->integer('year', now()->year);
        $month = $request->integer('month', now()->month);
        $studentId = $request->integer('student_id');

        $students = $user->students()->where('aktif',1)->get(); 
        
        if ($studentId) {
            $students = $students->where('id', $studentId);
        }

        // $weeks = FeeWeek::where('year',$year)->where('month',$month)->orderBy('week_of_month')->get();
        $weeks = FeeWeek::where('year', $year)
                ->where('month', $month)
                ->where('due_amount', '>', 0)
                ->orderBy('week_of_month')
                ->get();

        $payments = Payment::whereIn('student_id', $students->pluck('id'))
                    ->whereIn('fee_week_id', $weeks->pluck('id'))
                    ->get();

        return view('parent.payments.index', compact('students','weeks','payments','year','month'));
    }
}
