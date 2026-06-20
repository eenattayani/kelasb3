<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>
        Laporan Iuran Komite Kelas B3
    </title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:11px;
            color:#333;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .header h1{
            margin:0;
            font-size:20px;
        }

        .header h2{
            margin:5px 0;
            font-size:16px;
        }

        .header p{
            margin:2px 0;
        }

        .summary{
            width:100%;
            margin-bottom:15px;
        }

        .summary td{
            padding:4px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#4f46e5;
            color:white;
            border:1px solid #000;
            padding:5px;
            text-align:center;
        }

        table td{
            border:1px solid #000;
            padding:4px;
            text-align:center;
        }

        .total-row{
            background:#dcfce7;
            font-weight:bold;
        }

        .grand-total{
            background:#bbf7d0;
            font-weight:bold;
        }

        .footer{
            margin-top:40px;
            text-align:right;
        }

    </style>
</head>

<body>

<div class="header">

    <h1>TK AL-ADABY</h1>

    <h2>LAPORAN IURAN KAS KELAS B3</h2>

    <p>
        Periode Juli 2025 - Juni 2026
    </p>

    <p>
        Dicetak:
        {{ now()->format('d-m-Y H:i') }}
    </p>

</div>

<table class="summary">

    <tr>
        <td width="180">
            Jumlah Siswa
        </td>

        <td width="10">
            :
        </td>

        <td>
            {{ $students->count() }}
        </td>
    </tr>

    <tr>
        <td>
            Total Iuran Terkumpul
        </td>

        <td>
            :
        </td>

        <td>
            Rp{{ number_format($grandTotal,0,',','.') }}
        </td>
    </tr>

</table>

<table>

    <thead>

    <tr>

        <th>No</th>

        <th>Nama Siswa</th>

        @foreach($months as $month)

            <th>
                {{ $month->translatedFormat('M y') }}
            </th>

        @endforeach

        <th>Total</th>

    </tr>

    </thead>

    <tbody>

    @foreach($students as $student)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td style="text-align:left">
                {{ $student->nama }}
            </td>

            @foreach($months as $month)

                @php
                    $key = $month->format('Y-m');
                @endphp

                <td>

                    @if(($student->monthly_totals[$key] ?? 0) > 0)

                        {{-- {{ number_format($student->monthly_totals[$key],0,',','.') }} --}}
                        {{ number_format($student->monthly_totals[$key] ?? 0,0,',','.') }}

                    @else

                        -

                    @endif

                </td>

            @endforeach

            <td class="grand-total">

                {{ number_format($student->grand_total,0,',','.') }}

            </td>

        </tr>

    @endforeach

    <tr class="total-row">

        <td colspan="2">
            TOTAL
        </td>

        @foreach($months as $month)

            @php
                $key = $month->format('Y-m');
            @endphp

            <td>

                {{ number_format($monthTotals[$key],0,',','.') }}

            </td>

        @endforeach

        <td>

            {{ number_format($grandTotal,0,',','.') }}

        </td>

    </tr>

    </tbody>

</table>

<div class="footer">

    <p>
        Pontianak,
        {{ now()->translatedFormat('d F Y') }}
    </p>

    {{-- <br><br><br> --}}

    <p>
        Bendahara Kelas
    </p>

    <br><br><br>

    <p>
        Mama Aim
    </p>

</div>

</body>
</html>