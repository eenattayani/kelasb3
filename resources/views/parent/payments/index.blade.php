<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-6">💳 Status Pembayaran Anak</h1>

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

        @foreach ($students as $s)
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">
                    👦 {{ $s->nama }} ({{ $s->kelas }})
                </h2>
                <div class="overflow-hidden rounded-xl border border-gray-200 shadow">
                    <ul class="divide-y divide-gray-200">
                        @foreach ($weeks as $w)
                            @php
                                $paid = $payments->where('student_id', $s->id)->firstWhere('fee_week_id', $w->id);
                            @endphp
                            <li class="flex justify-between items-center px-4 py-3 bg-white hover:bg-gray-50">
                                <div>
                                    <div class="font-medium">Pekan {{ $w->week_of_month }}</div>
                                    <div class="text-xs text-gray-500">
                                        {{ $w->start_date }} – {{ $w->end_date }}
                                    </div>
                                </div>
                                @if ($paid)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-medium">
                                        ✅ Lunas
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full bg-gray-200 text-gray-600 text-sm font-medium">
                                        ⏳ Belum
                                    </span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
