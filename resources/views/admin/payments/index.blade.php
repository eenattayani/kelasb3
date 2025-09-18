<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        {{-- <h1 class="text-2xl font-semibold mb-6">📊 Pembayaran Iuran</h1> --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">📊 Pembayaran Iuran</h1>
            <a href="{{ route('feeweeks.index') }}"
            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
            ⚙️ Atur Pekan
            </a>
        </div>

        {{-- Filter bulan/tahun --}}
        <form method="get" class="flex items-center gap-3 mb-6">
            <input type="number" name="month" min="1" max="12" value="{{ $month }}"
                class="w-28 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <input type="number" name="year" min="2020" max="2100" value="{{ $year }}"
                class="w-32 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <button
                class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 shadow transition">
                Terapkan
            </button>
        </form>

        

        {{-- Tabel pembayaran --}}
        <div class="overflow-x-auto rounded-xl shadow border border-gray-200 bg-white">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-100 text-gray-800">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold">Siswa</th>
                        @foreach ($weeks as $w)
                            <th class="px-4 py-3 text-center font-semibold">
                                Pekan {{ $w->week_of_month }}
                                <div class="text-xs text-gray-500">
                                    {{ $w->start_date }} – {{ $w->end_date }}
                                </div>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $s)
                        <tr class="border-t">
                            <td class="px-4 py-3 font-medium">{{ $s->nama }}</td>
                            @foreach ($weeks as $w)
                                @php
                                    $paid = $s->payments->firstWhere('fee_week_id', $w->id);
                                @endphp
                                <td class="px-4 py-3 text-center">
                                    @if ($paid)
                                        <span
                                            class="inline-flex items-center px-2 py-1 rounded-full bg-green-100 text-green-800 text-xs font-semibold">
                                            Lunas
                                        </span>
                                        <form action="{{ route('payments.destroy', $paid) }}" method="post"
                                            class="mt-2">
                                            @csrf @method('delete')
                                            <button
                                                class="text-xs text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    @else
                                        @if ($w->due_amount > 0)
                                            <form action="{{ route('payments.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{ $s->id }}">
                                                <input type="hidden" name="fee_week_id" value="{{ $w->id }}">
                                                <button
                                                    class="px-2 py-1 text-xs rounded bg-indigo-50 text-indigo-700 hover:bg-indigo-100 transition">
                                                    Tandai Lunas <br>
                                                    <span class="font-semibold">
                                                        Rp{{ number_format($w->due_amount, 0, ',', '.') }}
                                                    </span>
                                                </button>
                                            </form>
                                        @else
                                            <span class="font-semibold text-gray-400">Rp 0</span>
                                        @endif
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
