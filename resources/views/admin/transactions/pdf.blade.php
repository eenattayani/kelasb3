<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>
Laporan Pengeluaran Komite
</title>

<style>

body{
    font-family: DejaVu Sans;
    font-size:12px;
}

h2{
    text-align:center;
    margin-bottom:5px;
}

.subtitle{
    text-align:center;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#f2f2f2;
}

table th,
table td{
    border:1px solid #000;
    padding:6px;
}

.total{
    font-weight:bold;
    background:#f9f9f9;
}

.footer{
    margin-top:40px;
    text-align:right;
}

</style>
</head>

<body>

<h2>
LAPORAN PENGELUARAN
</h2>

<div class="subtitle">
Kelas B3 TK Al-Adaby
<br>
Dicetak:
{{ now()->format('d-m-Y H:i') }}
</div>

<table>

<thead>

<tr>
    <th width="10%">No</th>
    <th width="15%">Tanggal</th>
    <th width="45%">Keterangan</th>
    <th width="30%">Jumlah</th>
</tr>

</thead>

<tbody>

@foreach($transactions->where('type','expense') as $transaction)

<tr>

    <td align="center">
        {{ $loop->iteration }}
    </td>

    <td align="center">
        {{ \Carbon\Carbon::parse($transaction->date)->format('d-m-Y') }}
    </td>

    <td>
        {{ $transaction->description }}
    </td>

    <td align="right">
        Rp{{ number_format($transaction->amount,0,',','.') }}
    </td>

</tr>

@endforeach

<tr class="total">

    <td colspan="3" align="right">
        TOTAL PENGELUARAN
    </td>

    <td align="right">
        Rp{{ number_format($totalExpense,0,',','.') }}
    </td>

</tr>

</tbody>

</table>

<div class="footer">

Pontianak,
{{ now()->translatedFormat('d F Y') }}

<br>

Bendahara Kelas B3

<br><br><br>

______________________

</div>

</body>
</html>