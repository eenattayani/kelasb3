<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-6">🗓️ Atur Pekan & Due Amount</h1>

        <table class="min-w-full text-sm border border-gray-200 bg-white shadow rounded">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Tahun</th>
                    <th class="px-4 py-2 text-left">Bulan</th>
                    <th class="px-4 py-2 text-left">Pekan</th>
                    <th class="px-4 py-2 text-left">Tanggal</th>
                    <th class="px-4 py-2 text-left">Due Amount</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($feeWeeks as $w)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $w->year }}</td>
                        <td class="px-4 py-2">{{ $w->month }}</td>
                        <td class="px-4 py-2">Pekan {{ $w->week_of_month }}</td>
                        <td class="px-4 py-2">{{ $w->start_date }} – {{ $w->end_date }}</td>
                        <td class="px-4 py-2 font-semibold">
                            Rp{{ number_format($w->due_amount,0,',','.') }}
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('feeweeks.edit', $w) }}"
                               class="text-indigo-600 hover:underline text-sm">Ubah</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
