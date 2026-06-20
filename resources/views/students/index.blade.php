<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Laporan Iuran Komite Kelas B3
                </h1>

                <p class="text-sm text-gray-500">
                    Periode Juli 2025 - Juni 2026
                </p>
            </div>

            <div class="mt-3 md:mt-0">
                <a href="{{ route('students.export.pdf') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow">
                    📄 Export PDF
                </a>
            </div>
        </div>

        {{-- <a href="{{ route('students.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg mb-4 inline-block">
           + Tambah Siswa
        </a> --}}

        @if(session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

            <div class="bg-white rounded-xl shadow border p-5">
                <div class="text-gray-500 text-sm">
                    Jumlah Siswa
                </div>

                <div class="text-2xl font-bold text-indigo-600">
                    {{ $students->count() }}
                </div>
            </div>

            <div class="bg-white rounded-xl shadow border p-5">
                <div class="text-gray-500 text-sm">
                    Total Iuran Terkumpul
                </div>

                <div class="text-2xl font-bold text-green-600">
                    Rp{{ number_format($grandTotal,0,',','.') }}
                </div>
            </div>

            <div class="bg-white rounded-xl shadow border p-5">
                <div class="text-gray-500 text-sm">
                    Rata-rata per Siswa
                </div>

                <div class="text-2xl font-bold text-blue-600">
                    Rp{{ number_format($students->count() ? $grandTotal / $students->count() : 0,0,',','.') }}
                </div>
            </div>

        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow border">

            <table class="min-w-full text-sm">

                <thead class="bg-indigo-600 text-white">

                    <tr>

                        <th class="px-3 py-3 border whitespace-nowrap">
                            No
                        </th>

                        <th class="px-3 py-3 border whitespace-nowrap">
                            Nama Siswa
                        </th>

                        @foreach($months as $month)

                            <th class="px-3 py-3 border whitespace-nowrap text-center">
                                {{ $month->translatedFormat('M y') }}
                            </th>

                        @endforeach

                        <th class="px-3 py-3 border bg-green-700 whitespace-nowrap">
                            Total
                        </th>

                    </tr>

                </thead>

                <tbody>
                    @foreach($students as $student)

                    <tr class="hover:bg-gray-50">

                        <td class="border px-3 py-2 text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border px-3 py-2 whitespace-nowrap">

                            <a href="{{ route('students.show',$student->id) }}"
                            class="text-blue-600 hover:underline">

                                {{ $student->nama }}

                            </a>

                        </td>

                        @foreach($months as $month)

                            @php
                                $key = $month->format('Y-m');
                                $amount = $student->monthly_totals[$key];
                            @endphp

                            <td class="border px-3 py-2 text-center">

                                @if($amount > 0)

                                    Rp{{ number_format($amount,0,',','.') }}

                                @else

                                    -

                                @endif

                            </td>

                        @endforeach

                        <td class="border px-3 py-2 text-center bg-green-50 font-bold text-green-700">

                            Rp{{ number_format($student->grand_total,0,',','.') }}

                        </td>

                    </tr>

                    @endforeach
                    
                    <tr class="bg-green-100 font-bold">

                        <td colspan="2"
                            class="border px-3 py-3 text-right">

                            TOTAL

                        </td>

                        @foreach($months as $month)

                            @php
                                $key = $month->format('Y-m');
                            @endphp

                            <td class="border px-3 py-3 text-center">

                                Rp{{ number_format($monthTotals[$key],0,',','.') }}

                            </td>

                        @endforeach

                        <td class="border px-3 py-3 text-center text-green-800">

                            Rp{{ number_format($grandTotal,0,',','.') }}

                        </td>

                    </tr>
                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>
