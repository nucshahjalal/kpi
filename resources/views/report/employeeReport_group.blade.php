<!DOCTYPE html>
<html>
<head>
    <title>KPI Employee Report</title>
    <style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 9px; 
        margin: 0;
        padding: 0;
        line-height: 1.1; 
    }

    
    .header {
        text-align: center;
        margin-bottom: 5px; /* 🔴 reduced */
    }

    .header img {
        max-height: 50px; 
    }

    h2 {
        margin: 3px 0;
        font-size: 12px;
    }

    .info-section {
        width: 100%;
        border-bottom: 1px solid #000;
        padding-bottom: 3px;
        margin-bottom: 5px; 
    }

    .left-info {
        float: left;
        width: 60%;
    }

    .right-info {
        float: right;
        width: 40%;
        text-align: right;
    }

    .clear {
        clear: both;
    }

    .type-header {
        background-color: #f2f2f2;
        padding: 3px; /* 🔴 smaller */
        font-size: 10px;
        text-align: center;
        font-weight: bold;
        border: 1px solid #ddd;
        margin: 0;

        page-break-after: avoid;
        page-break-inside: avoid;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 3px; /* 🔴 tighter gap */
        page-break-inside: avoid;
    }

    thead {
        display: table-header-group;
    }

    tr {
        page-break-inside: avoid;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 2px 3px;   /* 🔴 VERY IMPORTANT (tight rows) */
        font-size: 8.5px;   /* 🔴 compact text */
        line-height: 1.05;  /* 🔴 tightest spacing */
        vertical-align: middle;
        text-align: center;
    }

    th {
        background-color: #fafafa;
        padding: 2px;
        font-size: 8.5px;
    }

    td:first-child {
        text-align: left;
    }

    .summary-table {
        margin-top: 5px;
        page-break-inside: avoid;
    }

    .signature {
        margin-top: 25px; /* 🔴 reduced */
        page-break-inside: avoid;
    }

    table, tr, td, th {
        page-break-inside: avoid !important;
    }

    @page {
    size: A4;
    margin: 20px; /* tighter page margins */
}
</style>
</head>

<body>
    <div class="header" style="margin: 0; padding: 0;">
        <img 
            src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('backend/assets/images/logo.jpg'))) }}" 
            style="height: 45px; margin: 0; display: block;"
        >
        <h2 style="margin: 2px 0 3px 0; font-size: 12px;">
            Monthly Key Performance Indicator
        </h2>
    </div>

    <div class="info-section" style="margin: 0 0 5px 0; padding-bottom: 3px;">
        <div style="font-size:10px; line-height:1.2;" class="left-info">
            <strong>Name:</strong> {{ $employee->full_name }} ({{ $employee->staff_id }})<br>
            <strong>Supervisor:</strong> {{ $employee->supervisor_name }} ({{ $employee->supervisor_id }})
        </div>
        <div style="font-size:10px; line-height:1.2;" class="right-info">
            <strong>Position:</strong> {{ $employee->designation }}<br>
            <strong>Month:</strong> {{ now()->format('F Y') }}
        </div>
        <div class="clear"></div>
    </div>
    <br>
    @php 
    // গ্র্যান্ড টোটাল হিসাবের জন্য ভ্যারিয়েবল ইনিশিয়ালাইজেশন
    $grandTotalScore = 0; 
    $grandTotalFScore = 0; 
    $grandBaseAmount = 0;
    $grandEligible = 0;
    $grandObtained = 0;
    $grandBonus = 0;
    $grandTotalAmount = 0;
@endphp

    @foreach ($employees as $type => $labels)
    <div class="type-header">{{ $type == 0 ? 'Quantitative' : 'Qualitative' }}</div>

    @foreach ($labels as $labelName => $groups)
        <div class="label-header">{{ $labelName }}</div>

        @foreach ($groups as $group) {{-- এখানে প্রতিটি $group এ একটি 'all_items' অ্যারে আছে --}}
            <table>
                @foreach ($group['all_items'] as $item)
                    <tr>
                        <td>{{ $item['criteria'] }}</td>
                        <td>{{ $item['weight'] }}</td>
                        <td>{{ $item['score'] }}</td>
                    </tr>
                @endforeach
            </table>
        @endforeach
    @endforeach
@endforeach



<!-- পেজের একদম নিচে গ্র্যান্ড সামারি টেবিল -->
@if($employees->count() > 0)
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 10px; table-layout: fixed;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 5px;">Total Score</th>
                <th style="border: 1px solid #ddd; padding: 5px;">Total F.Score</th>
                <th style="border: 1px solid #ddd; padding: 5px;">Base Amount</th>
                <th style="border: 1px solid #ddd; padding: 5px;">Eligible</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Obtained</th>
                <th style="border: 1px solid #ddd; padding: 5px;">Obtained Bonus</th>
                <th style="border: 1px solid #ddd; padding: 5px; background-color: #e9e9e9;">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ number_format($grandTotalScore, 2) }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ number_format($grandTotalFScore, 2) }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ number_format($grandBaseAmount, 2) }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ number_format($grandEligible, 2) }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ number_format($grandObtained, 2) }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ number_format($grandBonus, 2) }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center; font-weight: bold; background-color: #fafafa;">
                    {{ number_format($grandTotalAmount, 2) }}
                </td>
            </tr>
        </tbody>
    </table>
@endif

<div style="position: fixed; bottom: 0; left: 0; width: 100%; background-color: white; padding-bottom: 20px;">
    <table style="width: 100%; border: none; text-align: center; table-layout: fixed;">
        <tr>
            <td style="border: none;">
                <div style="width: 80%; margin: 0 auto; border-top: 1px solid #000; padding-top: 5px;">
                    <strong>Prepared By</strong><br>
                    (Signature)
                </div>
            </td>
            
            <td style="border: none;">
                <div style="width: 80%; margin: 0 auto; border-top: 1px solid #000; padding-top: 5px;">
                    <strong>Checked By</strong><br>
                    (Signature)
                </div>
            </td>
            
            <td style="border: none;">
                <div style="width: 80%; margin: 0 auto; border-top: 1px solid #000; padding-top: 5px;">
                    <strong>Recommended By</strong><br>
                    (Signature)
                </div>
            </td>
            
            <td style="border: none;">
                <div style="width: 80%; margin: 0 auto; border-top: 1px solid #000; padding-top: 5px;">
                    <strong>Approved By</strong><br>
                    (Signature)
                </div>
            </td>
        </tr>
    </table>
</div>

    
</body>

</html>

