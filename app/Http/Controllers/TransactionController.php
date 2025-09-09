<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::latest()->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:income,expense',
            'description' => 'required|string|max:255',
            'amount' => 'required|integer|min:0',
            'date' => 'required|date',
            'proof' => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:2048', // bisa gambar atau pdf
        ]);

        $data = $request->only(['type','description','amount','date']);

        if ($request->hasFile('proof')) {
            $data['proof'] = $request->file('proof')->store('proofs', 'public');
        }

        Transaction::create($data);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dicatat.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return back()->with('success', 'Transaksi dihapus.');
    }
}
