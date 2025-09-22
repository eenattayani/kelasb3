<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Transaksi</h2>

        <form action="{{ route('transactions.update', $transaction->id) }}" 
              method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label class="block">Jenis</label>
                <select name="type" class="border rounded p-2 w-full">
                    <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>

            <div>
                <label class="block">Keterangan</label>
                <input type="text" name="description" class="border rounded p-2 w-full" 
                       value="{{ old('description',$transaction->description) }}" required>
            </div>

            <div>
                <label class="block">Jumlah</label>
                <input type="number" name="amount" class="border rounded p-2 w-full" 
                       value="{{ old('amount',$transaction->amount) }}" required>
            </div>

            <div>
                <label class="block">Tanggal</label>
                <input type="date" name="date" class="border rounded p-2 w-full" 
                       value="{{ old('date',$transaction->date) }}" required>
            </div>

            <div>
                <label class="block">Bukti Transaksi</label>
                @if($transaction->proof)
                    <p class="mb-2">
                        <a href="{{ asset('storage/'.$transaction->proof) }}" target="_blank" class="text-blue-600 underline">
                            Lihat Bukti Lama
                        </a>
                    </p>
                @endif
                <input type="file" name="proof" class="border rounded p-2 w-full">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah.</small>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
