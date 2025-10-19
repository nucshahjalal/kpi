@extends('backend.app')
@section('page_title', 'Inquiry List')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">

        <!-- Page Header -->
        <div class="page-header d-flex align-items-center justify-content-between">
            <div class="page-header-left d-flex align-items-center gap-2">
                <button class="btn btn-sm btn-info printBTN"><i class="feather feather-printer"></i> Print</button>
            </div>

            <div class="page-header-left d-flex align-items-center gap-2">
                <a href="{{ url('inquiry/list') }}" class="btn btn-sm btn-lg btn-primary w-100 text-white fw-bold">
                    ← Back
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content p-4">
            <div class="row">
                <div class="col-xl-12" id="printableArea">
                    <div class="card invoice-container">
                        <div class="card-body p-0" >
                            <div class="px-4 pt-4">
                                <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;" class="d-sm-flex">
                                    
                                    <div>
                                        <address class="text-muted" style="margin-left: 0px; font-style: normal;">
                                            <span class="fs-4 fw-bold text-primary">Inquiry History </span><br>
                                        </address>
                                    </div>
                                    
                                    <div class="text-center">
                                       <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('backend/assets/images/logo.jpg'))) }}" style="height: 80px;">
                                    </div>

                                    <div class="lh-lg pt-3 pt-sm-0 text-end" style="margin-right: 10px;">
                                        <h2 class="fs-4 fw-bold text-primary"></h2>
                                        <div>
                                            <span class="fw-bold text-dark">ID No:</span>
                                            <span class="fw-bold text-primary">#{{ $inquiry->id }}</span>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark">Date:</span>
                                            <span class="fw-bold text-primary">{{ date('d-m-Y', strtotime(now())) }}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <!-- Vehicle Table -->
                             <br>
                            <!-- <hr class="border-dashed mb-0"> -->
                            <div class="table-responsive">
                                <div style="margin: 1rem; padding: 1rem; border: 1px solid #ccc;"> 
                                    <div style=" display: flex; flex-wrap: wrap; gap: 10px; width: 90rem; padding: 1rem;"> 
                                        <div style="flex: 1 1 45%;"><strong>Company Name:</strong> {{ $inquiry->company_name }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Owner Name:</strong> {{ $inquiry->name }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Phone:</strong> {{ $inquiry->phone }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Price:</strong> {{ $inquiry->price }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Project PBT:</strong> {{ $inquiry->pbt }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Product Type:</strong> {{ $inquiry->product_type == 0 ? 'Marine' : 'Marine Equipment' }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Start Date:</strong> {{ date('d-m-Y', strtotime($inquiry->start)) }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Engine Type:</strong> {{ $inquiry->engine_type == 0 ? 'Mitshubishi' : 'Yuchai' }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Product Model:</strong> {{ $inquiry->model }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Purchase Date:</strong> {{ date('d-m-Y', strtotime($inquiry->purchase_date)) }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Customer Type:</strong> {{ $inquiry->customer_type == 0 ? 'Govt' : 'Private' }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Inquiry Date:</strong> {{ date('d-m-Y', strtotime($inquiry->date)) }}</div> 
                                        <div style="flex: 1 1 45%;"><strong>Project Status:</strong> 
                                            @if ($inquiry->project_status == 0)
                                                Planning
                                            @elseif ($inquiry->project_status == 1)
                                                Ongoing
                                            @elseif ($inquiry->project_status == 2)
                                                Vessel Complete
                                            @elseif ($inquiry->project_status == 3)
                                                Repowering
                                            @elseif ($inquiry->project_status == 4)
                                                New Build
                                            @else
                                                Halt
                                            @endif 
                                        </div>
                                        <div style="flex: 1 1 45%;"><strong>Inquiry Status:</strong> {{ $inquiry->status == 0 ? 'HOT' : ($inquiry->status == 1 ? 'WARM' : 'COLD') }}</div>
                                        <div style="flex: 1 1 45%;"><strong>Vessel Name:</strong> {{ $inquiry->vessel_name }}</div>
                                        <div style="flex: 1 1 45%;"><strong>Builder Details:</strong> {{ $inquiry->builder_details }}</div>
                                        <div style="flex: 1 1 45%;"><strong>Description:</strong> {{ $inquiry->description }}</div>
                                    </div> 
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</main>

<!-- Style -->
<style>
    .btn {
        text-transform: capitalize;
    }

    @media print {
        .page-header-right, .printBTN {
            display: none !important;
        }
    }
</style>

<script type="text/javascript">
    document.querySelector('.printBTN').addEventListener('click', function () {
        var printContents = document.getElementById('printableArea').innerHTML;
        var printWindow = window.open('', '', 'height=800,width=1200');

        printWindow.document.write('<html><head><title>Inquiry History</title>');
        printWindow.document.write('<style>');
        printWindow.document.write(`
            body { font-family: Arial, sans-serif; padding: 20px; }
            table { border-collapse: collapse; width: 100%; }
            table, th, td { border: 1px solid #ddd; padding: 8px; }
            th { background-color: #f2f2f2; text-align: left; }
            h2 { margin-top: 0; }
        `);
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');

        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    });
</script>

<!-- Script: PDF Download -->
 <!-- <script type="text/javascript">
    document.getElementById('download_pdf').addEventListener('click', function(e) {
        e.preventDefault();
        const empId = document.getElementById('emp_id').value;
        const downloadUrl = "{{ url('vehicle/employee-history/download-pdf') }}/" + empId;
        window.location.href = downloadUrl;
    });
</script>  -->

@endsection
