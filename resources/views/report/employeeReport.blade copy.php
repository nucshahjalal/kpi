<!DOCTYPE html>
<html>
<head>
    <title>KPI Employee Report</title>

    <style>
        @page {
            margin: 8px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px; /* ছোট করলে এক পেজে ফিট হবে */
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin: 5px 0;
        }

        .header {
            text-align: center;
            margin-bottom: 5px;
        }

        .header img {
            height: 50px;
        }

        /* INFO SECTION (float বাদ) */
        .info-table {
            width: 100%;
            margin-bottom: 8px;
            border-bottom: 1px solid #000;
        }

        .info-table td {
            border: none;
            padding: 3px;
            font-size: 9px;
        }

        .type-header {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
            padding: 4px;
            border: 1px solid #ddd;
            margin-top: 3px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        thead {
            display: table-header-group;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 4px;
        }

        th {
            background-color: #fafafa;
            font-size: 9px;
        }

        td {
            font-size: 9px;
        }

        tr {
            page-break-inside: auto;
        }

        .summary-table th,
        .summary-table td {
            padding: 6px;
            font-size: 9px;
        }

        .signature {
            margin-top: 30px;
        }

        .signature td {
            border: none;
            text-align: center;
            font-size: 9px;
        }

        .sign-box {
            border-top: 1px solid #000;
            width: 80%;
            margin: 0 auto;
            padding-top: 3px;
        }

    </style>
</head>

<body>

<div class="header">
    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('backend/assets/images/logo.jpg'))) }}">
    <h2>Monthly Key Performance Indicator</h2>
</div>

<!-- INFO -->
<table class="info-table">
    <tr>
        <td width="60%">
            <strong>Name:</strong> {{ $employee->full_name }} ({{ $employee->staff_id }})<br>
            <strong>Supervisor:</strong> {{ $employee->supervisor_name }} ({{ $employee->supervisor_id }})
        </td>
        <td width="40%" style="text-align:right;">
            <strong>Position:</strong> {{ $employee->designation }}<br>
            <strong>Month:</strong> {{ now()->format('F Y') }}
        </td>
    </tr>
</table>

@php 
$grandTotalScore = 0; 
$grandTotalFScore = 0; 
$grandBaseAmount = 0;
$grandEligible = 0;
$grandObtained = 0;
$grandBonus = 0;
$grandTotalAmount = 0;
@endphp

@foreach ($employees as $type => $group)

<div class="type-header">
    {{ $type == 0 ? 'Quantitative Criteria' : ($type == 1 ? 'Qualitative Criteria' : $type) }}
</div>

<div style="text-align:center; font-weight:bold; border:1px solid #ddd; border-top:none; padding:3px;">
    {{ $group->first()->label_name ?? 'General' }}
</div>

<table>
    <thead>
        <tr>
            <th width="30%" style="text-align:left;">Criteria</th>
            <th>Target</th>
            <th>Actual</th>
            <th>Weight</th>
            <th>Score</th>
            <th>F.Score</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($group as $obj)
        @php 
            $grandTotalScore += $obj->score ?? 0;
            $grandTotalFScore += $obj->score ?? 0; 
        @endphp
        <tr>
            <td style="text-align:left;">{{ $obj->criteria }}</td>
            <td>{{ $obj->target ?? '0' }}</td>
            <td>{{ $obj->actual ?? '0' }}</td>
            <td>{{ $obj->weight ?? '0' }}</td>
            <td>{{ number_format($obj->score, 2) }}</td>
            <td>{{ number_format($obj->score, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@php
$first = $group->first();
$grandBaseAmount += $first->base_amount ?? 0;
$grandEligible += $first->eligible_amount ?? 0;
$grandObtained += $first->obtained_amount ?? 0;
$grandBonus += $first->bonus ?? 0;
$grandTotalAmount += $first->total_amount ?? 0;
@endphp

@endforeach


<!-- SUMMARY -->
<table class="summary-table">
    <thead>
        <tr>
            <th>Total Score</th>
            <th>Total F.Score</th>
            <th>Base</th>
            <th>Eligible</th>
            <th>Obtained</th>
            <th>Bonus</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ number_format($grandTotalScore, 2) }}</td>
            <td>{{ number_format($grandTotalFScore, 2) }}</td>
            <td>{{ number_format($grandBaseAmount, 2) }}</td>
            <td>{{ number_format($grandEligible, 2) }}</td>
            <td>{{ number_format($grandObtained, 2) }}</td>
            <td>{{ number_format($grandBonus, 2) }}</td>
            <td><strong>{{ number_format($grandTotalAmount, 2) }}</strong></td>
        </tr>
    </tbody>
</table>


<!-- SIGNATURE -->
<table class="signature">
    <tr>
        <td><div class="sign-box">Prepared By</div></td>
        <td><div class="sign-box">Checked By</div></td>
        <td><div class="sign-box">Recommended By</div></td>
        <td><div class="sign-box">Approved By</div></td>
    </tr>
</table>

</body>
</html>