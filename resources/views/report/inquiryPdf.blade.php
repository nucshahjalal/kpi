<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background: #f2f2f2; }
        h2 { text-align: center; margin-bottom: 20px; }
        .header {
            text-align: center;
            margin: 20px 0;
        }
        .header img {
            max-height: 50px;  /* Adjust the image size as needed */
            vertical-align: middle;
        }
        .header h2 {
            display: inline;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    
    <div class="header">
        <div class="text-center">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('backend/assets/images/logo.jpg'))) }}" style="height: 80px;">
        </div>
        <h2>Assign Vehicle List</h2>
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
                <td>{{ $obj->product_type }}</td>
                <td>{{ $obj->start }}</td>
                <td>{{ $obj->engine_type }}</td>
                <td>{{ $obj->model }}</td>
                <td>{{ $obj->purchase_date }}</td>
                <td>{{ $obj->reg_date }}</td>
                <td>{{ $obj->customer_type }}</td>
                <td>{{ $obj->project_status }}</td>
                <td>{{ $obj->status }}</td>
                <td>{{ $obj->vessel_name }}</td>
                <td>{{ $obj->builder_details }}</td>
                <td>{{ $obj->description }}</td>
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
