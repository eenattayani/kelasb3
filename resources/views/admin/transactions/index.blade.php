<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Transaksi</h2>
    @auth
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Catat Transaksi</a>
        @endif
    @endauth

        <table class="w-full mt-4 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Jenis</th>
                    <th class="px-4 py-2 border">Keterangan</th>
                    <th class="px-4 py-2 border">Jumlah</th>
                    <th class="px-4 py-2 border">Bukti</th>
                @auth
                    @if(auth()->user()->role === 'admin')
                    <th class="px-4 py-2 border">Aksi</th>
                    @endif
                @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $t)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $t->date }}</td>
                    <td class="px-4 py-2 border">
                        <span class="{{ $t->type == 'income' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ucfirst($t->type) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border">{{ $t->description }}</td>
                    <td class="px-4 py-2 border">Rp {{ number_format($t->amount,0,',','.') }}</td>
                    <td class="px-4 py-2 border">
                        @if($t->proof)
                            <a href="{{ asset('storage/'.$t->proof) }}" target="_blank" class="text-blue-600 underline">
                                Lihat Bukti
                            </a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                @auth
                    @if(auth()->user()->role === 'admin')
                    <td class="px-4 py-2 border text-center flex gap-2 justify-center">
                        <a href="{{ route('transactions.edit',$t->id) }}" 
                        class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('transactions.destroy',$t->id) }}" method="POST" onsubmit="return confirm('Hapus transaksi ini?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                    @endif
                @endauth    
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $transactions->links() }}</div>
    </div>
</x-app-layout>
