<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // $students = Student::all();
    //     $students = Student::withSum('payments', 'amount')->get();
    //     return view('students.index', compact('students'));
    // }

    // public function index()
    // {
    //     $students = Student::withSum('payments', 'amount')->get();

    //     $grandTotal = $students->sum('payments_sum_amount');

    //     return view('students.index', compact(
    //         'students',
    //         'grandTotal'
    //     ));
    // }

    // public function index()
    // {
    //     $students = Student::with([
    //         'payments' => function ($query) {
    //             $query->select(
    //                 'id',
    //                 'student_id',
    //                 'amount',
    //                 'created_at'
    //             );
    //         }
    //     ])
    //     ->withSum('payments', 'amount')
    //     ->orderBy('nama')
    //     ->get();

    //     $months = [];

    //     $start = Carbon::create(2025, 7, 1);

    //     for ($i = 0; $i < 12; $i++) {
    //         $months[] = $start->copy()->addMonths($i);
    //     }

    //     return view('students.index', compact(
    //         'students',
    //         'months'
    //     ));
    // }

    // public function index()
    // {
    //     // Periode Juli 2025 s.d Juni 2026
    //     $months = [];

    //     $start = Carbon::create(2025, 7, 1);

    //     for ($i = 0; $i < 12; $i++) {
    //         $months[] = $start->copy()->addMonths($i);
    //     }

    //     $students = Student::with([
    //         'parent',
    //         'payments'
    //     ])
    //     ->orderBy('nama')
    //     ->get();

    //     $monthTotals = [];
    //     $grandTotal = 0;

    //     // Inisialisasi total bulanan
    //     foreach ($months as $month) {
    //         $monthTotals[$month->format('Y-m')] = 0;
    //     }

    //     // Hitung per siswa
    //     foreach ($students as $student) {

    //         $studentTotal = 0;

    //         $monthlyTotals = [];

    //         foreach ($months as $month) {

    //             $key = $month->format('Y-m');

    //             $monthlyAmount = $student->payments
    //                 ->filter(function ($payment) use ($month) {

    //                     return $payment->created_at->year == $month->year
    //                         && $payment->created_at->month == $month->month;

    //                 })
    //                 ->sum('amount');

    //             $monthlyTotals[$key] = $monthlyAmount;

    //             $studentTotal += $monthlyAmount;

    //             $monthTotals[$key] += $monthlyAmount;
    //         }

    //         $student->monthly_totals = $monthlyTotals;

    //         $student->grand_total = $studentTotal;

    //         $grandTotal += $studentTotal;
    //     }

    //     return view(
    //         'students.index',
    //         compact(
    //             'students',
    //             'months',
    //             'monthTotals',
    //             'grandTotal'
    //         )
    //     );
    // }

    public function index()
    {
        return view(
            'students.index',
            $this->buildReportData()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        // Ambil semua pembayaran siswa
        $payments = $student->payments()
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function($payment) {
                return $payment->created_at->format('Y-m-d');
            });

        return view('students.show', compact('student', 'payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportPdf()
    {
        $pdf = Pdf::loadView(
            'students.pdf',
            $this->buildReportData()
        );

        $pdf->setPaper('legal', 'landscape');

        return $pdf->download(
            'laporan-iuran-kelas-b3.pdf'
        );
    }

    private function buildReportData()
    {
        $months = [];

        $start = Carbon::create(2025, 7, 1);

        for ($i = 0; $i < 12; $i++) {
            $months[] = $start->copy()->addMonths($i);
        }

        $students = Student::with([
            'parent',
            'payments'
        ])
        ->orderBy('nama')
        ->get();

        $monthTotals = [];
        $grandTotal = 0;

        foreach ($months as $month) {
            $monthTotals[$month->format('Y-m')] = 0;
        }

        foreach ($students as $student) {

            $studentTotal = 0;

            $monthlyTotals = [];

            foreach ($months as $month) {

                $key = $month->format('Y-m');

                $monthlyAmount = $student->payments
                    ->filter(function ($payment) use ($month) {

                        return $payment->created_at->year == $month->year
                            && $payment->created_at->month == $month->month;

                    })
                    ->sum('amount');

                $monthlyTotals[$key] = $monthlyAmount;

                $studentTotal += $monthlyAmount;

                $monthTotals[$key] += $monthlyAmount;
            }

            $student->monthly_totals = $monthlyTotals;

            $student->grand_total = $studentTotal;

            $grandTotal += $studentTotal;
        }

        return compact(
            'students',
            'months',
            'monthTotals',
            'grandTotal'
        );
    }
}
