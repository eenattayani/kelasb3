<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Catat Transaksi</h2>

        <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block">Jenis</label>
                <select name="type" class="border rounded p-2 w-full">
                    <option value="income">Pemasukan</option>
                    <option value="expense">Pengeluaran</option>
                </select>
            </div>

            <div>
                <label class="block">Keterangan</label>
                <input type="text" name="description" class="border rounded p-2 w-full" required>
            </div>

            <div>
                <label class="block">Jumlah</label>
                <input type="number" name="amount" class="border rounded p-2 w-full" required>
            </div>

            <div>
                <label class="block">Tanggal</label>
                <input type="date" name="date" class="border rounded p-2 w-full" required>
            </div>

            <div>
                <label class="block">Bukti Transaksi (opsional)</label>
                <input type="file" name="proof" class="border rounded p-2 w-full">
                <small class="text-gray-500">Format: JPG, PNG, atau PDF. Maks 2MB.</small>
            </div>


            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
