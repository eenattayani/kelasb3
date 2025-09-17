<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Keuangan Kelas B3') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Statistik Ringkas --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow rounded-xl p-6 text-center">
                    <p class="text-sm text-gray-500">Total Pemasukan Pekan Ini</p>
                    <p class="mt-2 text-2xl font-bold text-green-600">
                        Rp{{ number_format($weekIncome, 0, ',', '.') }}
                    </p>
                </div>
                <div class="bg-white shadow rounded-xl p-6 text-center">
                    <p class="text-sm text-gray-500">Total Pemasukan Bulan Ini</p>
                    <p class="mt-2 text-2xl font-bold text-blue-600">
                        Rp{{ number_format($monthIncome, 0, ',', '.') }}
                    </p>
                </div>
                <div class="bg-white shadow rounded-xl p-6 text-center">
                    <p class="text-sm text-gray-500">Total Pemasukan Keseluruhan</p>
                    <p class="mt-2 text-2xl font-bold text-purple-600">
                        Rp{{ number_format($totalIncome, 0, ',', '.') }}
                    </p>
                </div>
            </div>

            {{-- Daftar Pemasukan --}}
            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Daftar Pemasukan (Iuran Siswa)</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border">Tanggal</th>
                                <th class="px-4 py-2 border">Nama Siswa</th>
                                <th class="px-4 py-2 border">Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($payments as $payment)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $payment->tanggal->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 border">{{ $payment->nama }}</td>
                                    <td class="px-4 py-2 border text-green-600 font-semibold">
                                        Rp{{ number_format($payment->amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-3 text-center text-gray-500">Belum ada pemasukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Daftar Pengeluaran --}}
            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Daftar Transaksi</h3>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border">Tanggal</th>
                                <th class="px-4 py-2 border">Keterangan</th>
                                <th class="px-4 py-2 border">Nominal</th>
                                <th class="px-4 py-2 border">Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $transaction->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 border">{{ $transaction->description }}</td>
                                    <td class="px-4 py-2 border text-red-600 font-semibold">
                                        Rp{{ number_format($transaction->amount, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-2 border text-center">
                                        @if($transaction->proof)
                                            <a href="{{ asset('storage/'.$transaction->proof) }}" target="_blank"
                                               class="text-blue-600 underline">Lihat</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-center text-gray-500">Belum ada pengeluaran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
