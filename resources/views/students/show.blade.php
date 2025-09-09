<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Keuangan Kelas B3') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

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
                          @forelse($payments as $tanggal => $items)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($tanggal)->format('d/m/Y') }}</td>
                                <td class="px-4 py-2 border">{{ $student->nama }}</td>
                                <td class="px-4 py-2 border text-green-600 font-semibold">
                                    Rp{{ number_format($items->sum('amount'), 0, ',', '.') }}
                                </td>
                            </tr>
                          @empty
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-center text-gray-500">Belum ada pembayaran.</td>
                            </tr>
                          @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
