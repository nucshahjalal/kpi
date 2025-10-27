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
        <h2>Inquiry List</h2>
    </div>
    <table >
        <thead>
            <tr>
                <th>SL No</th>
                <th>Company Name</th>
                <th>Owner Name</th>
                <th>Phone</th>
                <th>Price</th>
                <th>Project PBT</th>
                <th>Product Type</th>
                <th>Start Date</th>
                <th>Engine Type</th>
                <th>Product Model</th>
                <th>Purchase Date</th>
                <th>Customer Type</th>
                <th>Project Status</th>
                <th>Inquiry Date</th>
                <th>Inquiry Status</th>
                <th>Vessel Name</th>
                <th>Builder Details</th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $obj)
            <tr>
                <td>{{ $loop->index + $inquiries->firstItem() }}</td>
                <td>{{ $obj->company_name }}</td>
                <td>{{ $obj->name }}</td>
                <td>{{ $obj->phone }}</td>
                <td>{{ $obj->price }}</td>
                <td>{{ $obj->pbt }}</td>
                <td>{{ $obj->product_type == 0 ? 'Marine' : 'Marine Equipment' }}</td>
                <td>{{ date('d-m-Y', strtotime($obj->start)) }}</td>
                <td>{{ $obj->engine_type == 0 ? 'Mitshubishi' : 'Yuchai' }}</td>
                <td>{{ $obj->model }}</td>
                <td>{{ $obj->purchase_date }}</td>
                <td>{{ $obj->customer_type == 0 ? 'Govt' : 'Private' }}</td>
                <td>
                    @if ($obj->project_status == 0)
                        <p>Planning</p>
                    @elseif ($obj->project_status == 1)
                        <p>Ongoing</p>
                    @elseif ($obj->project_status == 2)
                        <p>Vessel Complete</p>
                    @elseif ($obj->project_status == 3)
                        <p>Repowering</p>
                    @elseif ($obj->project_status == 4)
                        <p>New Build</p>
                    @else
                        <p>Halt</p>
                    @endif
                </td>
                <td>{{ date('d-m-Y', strtotime($obj->date)) }}</td>
                <td> {{ $obj->status == 0 ? 'HOT' : ($obj->status == 1 ? 'WARM' : 'COLD') }} </td>
                <td>{{ $obj->vessel_name }}</td>
                <td>{{ $obj->builder_details }}</td>
                <td>{{ $obj->description }}</td>
                <td>{{ date('m-d-Y', strtotime($obj->created_at)) }}</td>
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

