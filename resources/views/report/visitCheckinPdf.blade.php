<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: auto;
        }
        thead {
            display: table-header-group; /* ensures headers repeat on each page */
        }
        tfoot {
            display: table-footer-group;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            vertical-align: middle;
            word-break: break-word;
        }

        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .header {
            text-align: center;
            margin: 10px 0;
        }
        .header img {
            max-height: 60px;
            vertical-align: middle;
        }
        .header h2 {
            display: inline-block;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    
    <div class="header">
        <div class="text-center">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('backend/assets/images/logo.jpg'))) }}" style="height: 80px;">
        </div>
        <h2>Visit Check-In List</h2>
    </div>
    <table >
        <thead>
            <tr>
                <th>SL No</th>
                <th>Company Name</th>
                <th>Owner Name</th>
                <th>Phone</th>
                <th>Engine Type</th>
                <th>Vessel Name</th>
                <th>Visit Details</th>
                <th>User Name</th>
                <th>Visit Count</th>
                <th>Check-In Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $obj)
            <tr>
                <td>{{ $loop->index + $inquiries->firstItem() }}</td>
                <td>{{ $obj->company_name }}</td>
                <td>{{ $obj->name }}</td>
                <td>{{ $obj->phone }}</td>
                <td>{{ $obj->engine_type == 0 ? 'Mitshubishi' : 'Yuchai' }}</td>
                <td>{{ $obj->vessel_name }}</td>
                <td>{{ $obj->details }}</td>
                <td>{{ $obj->user_name }}</td>
                <td>{{ $obj->visit_count }}</td>
                <td>{{ date('d-m-Y', strtotime($obj->created_at)) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="20">There are no data found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

