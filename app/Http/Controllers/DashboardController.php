<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\OtherIncome;
use App\Models\Transaction;
use Carbon\Carbon; // ini berfungsi untuk manipulasi tanggal

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $startOfWeek = $now->copy()->startOfWeek();
        $startOfMonth = $now->copy()->startOfMonth();

        // Hitung total pemasukan (Payment + OtherIncome)
        $weekIncome = Payment::where('created_at', '>=', $startOfWeek)->sum('amount')
                    + OtherIncome::where('created_at', '>=', $startOfWeek)->sum('amount');

        $monthIncome = Payment::where('created_at', '>=', $startOfMonth)->sum('amount')
                    + OtherIncome::where('created_at', '>=', $startOfMonth)->sum('amount');

        $totalIncome = Payment::sum('amount') + OtherIncome::sum('amount');

        $totalOutcome = Transaction::where('type', 'expense')->sum('amount');
        
        $netIncome = $totalIncome - $totalOutcome;

        // Ambil daftar pemasukan (misalnya 10 terakhir)
        $payments = Payment::with('student')->latest()->get(); //kode ini adalah untuk mengambil data payment beserta relasi studentnya 

        $payments = $payments
            ->groupBy(function($item) {
                // Gabungkan tanggal dan nama siswa sebagai key
                return $item->created_at->format('Y-m-d') . '|' . $item->student->nama;
            })
            ->map(function($group) {
                // Ambil payment pertama untuk referensi tanggal & nama
                $first = $group->first();
                return (object)[
                    'tanggal' => $first->created_at,
                    'nama' => $first->student->nama,
                    'amount' => $group->sum('amount'),
                ];
            })
            ->values();

        // Ambil daftar pengeluaran (misalnya 10 terakhir)
        $transactions = Transaction::latest()->get();

        return view('dashboard', compact(
            'weekIncome',
            'monthIncome',
            'totalIncome',
            'totalOutcome',
            'netIncome',
            'payments',
            'transactions'
        ));
    }
}
