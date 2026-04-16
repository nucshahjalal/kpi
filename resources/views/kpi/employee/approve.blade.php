@extends('backend.app')
@section('page_title','Approved List')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
    <div class="page-header d-flex align-items-center justify-content-between flex-wrap">
        <div class="page-header-left d-flex align-items-center gap-2 mb-3 mb-md-0">
            <a style="font-size: 12px;" href="#" id="download_excel" class="btn btn-sm btn-success">
                <i class="bi bi-file-earmark-excel"></i> Download Excel
            </a>
            <a style="font-size: 12px;" href="#" id="download_pdf" class="btn btn-sm btn-dark">
                <i class="bi bi-file-earmark-pdf"></i> Download PDF
            </a>
        </div>

        <div class="page-header-right d-flex align-items-center gap-2 ms-auto flex-wrap justify-content-between">
            <form method="get" action="{{ url('kpi/approved') }}" id="submitForm" class="d-flex align-items-center gap-2 mb-3 mb-md-0">
                @csrf
                <div class="d-flex align-items-center gap-2 mb-2 mb-md-0">
                    <label class="form-label mb-0" style="white-space: nowrap;">From Date</label>
                    <div class="input-group input-group-sm w-100 w-md-auto" style="max-width: 170px;">
                        <input type="text" name="from_date" id="from_date"
                            class="date-class add_from_date form-control"
                            value="{{ $defaultFrom }}" placeholder="Date Calender">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2 mb-2 mb-md-0">
                    <label class="form-label mb-0" style="white-space: nowrap;">To Date</label>
                    <div class="input-group input-group-sm w-100 w-md-auto" style="max-width: 170px;">
                        <input type="text" name="to_date" id="to_date"
                            class="date-class add_to_date form-control"
                            value="{{ $defaultTo }}" placeholder="Date Calender">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    </div>
                </div>

                <div class="col-auto mb-2 mb-md-0">
                    <button style="font-size: 12px;" class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                </div>
            </form>

        </div>
    </div>


<div class="main-content">   
    <div class="row">
        <div class="col-xl-12">
        <div class="card stretch stretch-full">
            <div class="card-body">
            <div class="card-body custom-card-action p-0">
                <div class="table-responsive">
                    <table  class="table table-hover mb-0">
                        <thead>
                            <tr class="border-b">
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col" >SL No</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Porfolio</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Full Name</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Staff ID</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Designation</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Supervisor Name</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Supervisor ID</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Base Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse ($visits as $obj)
                            <tr>
                                <td>{{ $loop->index + $visits->firstItem() }}</td>
                                <td>{{ $obj->company_name }}</td>
                                <td>{{ $obj->owner_name }}</td>
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
                                <td colspan="8" class="text-center">There are no data found.</td>
                            </tr>
                        @endforelse --}}
                    </tbody>
                </table>
                    {{-- {!! $visits->withQueryString()->links('pagination::bootstrap-5') !!} --}}
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <!-- dashboardMainContent -->
        <!-- [ Main Content ] end -->
</div>
    <!-- [ Footer ] start -->
    <!-- @include('backend.footer') -->
    <!-- [ Footer ] end -->
    
</main>

<!-- Date calender -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
        flatpickr(".add_from_date", {
            dateFormat: "Y-m-d", 
            altInput: true,
            altFormat: "F j, Y",
        });
        flatpickr(".add_to_date", {
            dateFormat: "Y-m-d", 
            altInput: true,
            altFormat: "F j, Y",
        });
        
    });

</script>

<style>
   .btn {
        text-transform: capitalize;
    }

    .date-class{
        background-color: white !important;
        color: #000;  
    }

    .input-group-text {
        background-color: #e9ecef; 
        border-left: none; 
        cursor: pointer; 
    }

  .input-group .form-control {
    border-right: none; 

  .input-group-text i {
    font-size: 1.1rem;
    color: #495057; 
  }
  
</style>

<script type="text/javascript">

    document.getElementById('download_pdf').addEventListener('click', function(e) {
        e.preventDefault();
        var fromDate = document.getElementById('from_date').value;  
        var toDate = document.getElementById('to_date').value;

        var url = "{{ url('visit-checkin/download-pdf') }}" + "?from_date=" + encodeURIComponent(fromDate) + "&to_date=" + encodeURIComponent(toDate);

        window.location.href = url;
    });
    
    document.getElementById('download_excel').addEventListener('click', function(e) {
        e.preventDefault();
        var fromDate = document.getElementById('from_date').value;  
        var toDate = document.getElementById('to_date').value;

        var url = "{{ url('visit-checkin/export') }}" + "?from_date=" + encodeURIComponent(fromDate) + "&to_date=" + encodeURIComponent(toDate);

        window.location.href = url;
    });


</script>

@endsection
