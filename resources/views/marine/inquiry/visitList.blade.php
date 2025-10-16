@extends('backend.app')
@section('page_title','Check-in List')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
        <!-- [ page-header ] start -->
    <div class="page-header d-flex align-items-center justify-content-between">
        <div class="page-header-left d-flex align-items-center gap-2">
            <h3>Inquiry Check-in List</h3>
        </div>

        <div class="page-header-left d-flex align-items-center gap-2">
            <div class="page-header-right ms-auto">
                <form method="get" action="{{ url('visit/list') }}">
                    @csrf
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-control" type="text" name="filter" 
                            value="{{ request('filter') }}" id="filter" placeholder="Search...">
                        <div class="col-auto">
                            <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                        </div>
                    </div>
                </form>
            </div>
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
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Company Name</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Owner Name</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Visit Details</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Check-In Date</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Last Check-In Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($visits as $obj)
                            <tr>
                                <td>{{ $loop->index + $visits->firstItem() }}</td>
                                <td>{{ $obj->company_name }}</td>
                                <td>{{ $obj->name }}</td>
                                <td>{{ $obj->details }}</td>
                                <td>{{ $obj->created_at->timezone('Asia/Dhaka')->format('d-m-Y h:i A') }}</td>
                                <td>{{ $obj->updated_at->timezone('Asia/Dhaka')->format('d-m-Y h:i A') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">There are no data found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                    {!! $visits->withQueryString()->links('pagination::bootstrap-5') !!}
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
        flatpickr("#add_from_date", {
            dateFormat: "Y-m-d", 
            altInput: true,
            altFormat: "F j, Y",
        });
        flatpickr("#add_to_date", {
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
</style>



<script type="text/javascript">
    document.getElementById('download_pdf').addEventListener('click', function(e) {
        e.preventDefault();
        var empId = document.getElementById('add_from_date').value;
        window.location.href = "{{ url('employee-wise-vehicle/download-pdf') }}" + "?emp_id=" + empId;
    });

    document.getElementById('download_excel').addEventListener('click', function(e) {
        alert('hi');
        e.preventDefault();
        var inquiry_id = document.getElementById('inquiry_id').value;
        window.location.href = "{{ url('inquiry/export') }}" + "?inquiry_id=" + inquiry_id;
    });

</script>

@endsection
