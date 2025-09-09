<?php

namespace App\Http\Controllers;

use App\Models\FeeWeek;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->integer('year', now()->year);
        $month = $request->integer('month', now()->month);

        $weeks = FeeWeek::where('year',$year)->where('month',$month)->orderBy('week_of_month')->get();
        $students = Student::where('aktif', true)->orderBy('nama')->get()
            ->load(['payments' => function($q) use ($weeks) {
                $q->whereIn('fee_week_id', $weeks->pluck('id'));
            }]); 
        
        return view('admin.payments.index', compact('weeks','students','year','month'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => ['required','exists:students,id'],
            'fee_week_id'=> ['required','exists:fee_weeks,id'],
            'amount'     => ['nullable','integer','min:0'],
            'method'     => ['nullable','string','max:50'],
            'note'       => ['nullable','string','max:500'],
            'paid_at'    => ['nullable','date'],
        ]);

        $data['amount']  = $data['amount'] ?? config('komite.weekly_fee', 2000);
        $data['paid_at'] = $data['paid_at'] ?? now();
        $data['created_by'] = auth()->id();

        // hindari duplikat pembayaran untuk pekan yang sama
        $payment = Payment::updateOrCreate(
            ['student_id'=>$data['student_id'],'fee_week_id'=>$data['fee_week_id']],
            $data
        );

        return back()->with('ok', 'Pembayaran tersimpan.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back()->with('ok','Pembayaran dihapus.');
    }
}
