@extends('backend.app')
@section('page_title','Key Perfomance Indicator')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
 <!-- [ page-header ] start -->

<div  class="page-header d-flex align-items-center justify-content-between flex-wrap">
    <div  class="page-header-left d-flex align-items-center gap-2 mb-3 mb-md-0">
        <a style="font-size: 12px;" href="#" id="download_excel" class="btn btn-sm btn-success">
            <i class="bi bi-file-earmark-excel"></i> Download Excel
        </a>
        <a style="font-size: 12px;" href="#" id="download_pdf" class="btn btn-sm btn-dark">
            <i class="bi bi-file-earmark-pdf"></i> Download PDF
        </a>
    </div>

    <div  class="page-header-right d-flex align-items-center gap-2 ms-auto flex-wrap justify-content-between">
        <form method="get" action="{{ url('inquiry/list') }}" id="submitForm" class="d-flex flex-wrap align-items-center gap-2 mb-3 mb-md-0">
            @csrf

            <!-- From Date  mobile here) -->
            <div class="d-flex align-items-center gap-0 order-1 order-md-1" style="min-width: 150px; max-width: 300px; justify-content: flex-start;">
                <label class="form-label mb-0" style="white-space: nowrap; width: 72px;">From Date</label>
                <div class="input-group input-group-sm" style="max-width: 150px;">
                    <input type="text" name="from_date" id="from_date"
                        class="date-class add_from_date form-control"
                        value="{{ $defaultFrom }}" placeholder="Date Calendar">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                </div>
                <!-- Search button mobile) -->
                <button type="submit" class="btn btn-sm btn-primary ms-2 d-md-none" style="font-size: 12px;">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>

            <!-- To Date + Add New button  -->
            <div class="d-flex align-items-center gap-0 order-3 order-md-2" style="min-width: 150px; max-width: 300px; justify-content: flex-start;">
                <label class="form-label mb-0" style="white-space: nowrap; width: 50px;">To Date</label>
                <div class="input-group input-group-sm" style="max-width: 140px; margin-left:10px;">
                    <input type="text" name="to_date" id="to_date"
                        class="date-class add_to_date form-control"
                        value="{{ $defaultTo }}" placeholder="Date Calendar">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                </div>
                <!-- Add New button (only for mobile) -->
                <a href="{{ url('inquiry/create') }}" class="btn btn-sm btn-info ms-2 d-md-none" style="font-size: 10px;">
                    <i class="feather-plus me-2"></i> Add New
                </a>
            </div>

            <!-- Desktop buttons -->
            <div class="d-none d-md-flex gap-2 order-2">
                <button type="submit" class="btn btn-sm btn-primary" style="font-size: 12px;">
                    <i class="bi bi-search"></i> Search
                </button>
                <a href="{{ url('inquiry/create') }}" class="btn btn-sm btn-info" style="font-size: 12px;">
                    <i class="feather-plus me-2"></i> Add New
                </a>
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
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Portfolio</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Team Marketing</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col"> Staff ID</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Designation</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Supervisor Name</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Supervisor ID</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Action</th>
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
                                <td>{{ $obj->description }}</td>
                                <td>{{ $obj->price }}</td>
                                <td style="min-width: 350px;">
                                    <!-- First Row (4 Buttons) -->
                                    <div class="d-flex gap-1 mb-1">
                                        <button type="button" class="btn btn-sm btn-success w-25" data-bs-toggle="modal" data-bs-target="#multiRowModal" onclick="visitModal({{ $obj->id }})">
                                            <i class="bi bi-check-circle"></i> Check-In
                                        </button>
                                        <a class="btn btn-sm btn-primary w-25" href="{{ url('inquiry/view', $obj->id) }}">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a class="btn btn-sm btn-info text-white w-25" href="{{ url('inquiry/edit', $obj->id) }}">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a class="btn btn-sm btn-danger w-25" href="{{ url('inquiry/delete', $obj->id) }}" onclick="javascript: return confirm('are you sure delete?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </div>

                                    <!-- Second Row (4 New Buttons with different colors) -->
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-sm btn-warning text-white w-25" href="#">
                                            <i class="bi bi-printer"></i> Print
                                        </a>
                                        <a class="btn btn-sm btn-secondary w-25" href="#">
                                            <i class="bi bi-envelope"></i> Mail
                                        </a>
                                        <a class="btn btn-sm w-25" style="background-color: #6f42c1; color: white;" href="#">
                                            <i class="bi bi-share"></i> Share
                                        </a>
                                        <a class="btn btn-sm w-25" style="background-color: #fd7e14; color: white;" href="#">
                                            <i class="bi bi-download"></i> PDF
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="8" class="text-center">There are no data found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                    {!! $inquiries->withQueryString()->links('pagination::bootstrap-5') !!}
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

<!-- Modal -->
<div class="modal fade" id="multiRowModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Multiple Criteria</h5>
            </div>
            <form action="{{ route('visit.save') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Single Label Field -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Label Name</label>
                        <input type="text" name="label_name" class="form-control" placeholder="Enter Label" required>
                    </div>

                    {{-- <hr> --}}

                    <!-- Dynamic Rows Container -->
                    <div id="criteria-wrapper">
                        <div class="row mb-2 align-items-end criteria-row">
                            <div class="col-md-5">
                                <label class="form-label">Criteria Name</label>
                                <input type="text" name="criteria[]" class="form-control" placeholder="Criteria Name">
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Weight</label>
                                <input type="text" name="value[]" class="form-control" placeholder="Weight" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger w-100 remove-row">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-info mt-2" id="add-more-row">
                        <i class="bi bi-plus-circle"></i> Add More Criteria
                    </button>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--open modal and insert data -->
<script>
  function visitModal(id) {
    document.getElementById('modal_inquiry_id').value = id;
    document.getElementById('details').value = ''; 
  }
</script>

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

.custom-width-date {
    width: 150px; /* BAD for responsiveness */
}

@media (max-width: 576px) {
    .custom-width-date {
        width: 10% !important;
    }
}

@media (min-width: 577px) {
    .custom-width-date {
        width: auto; /* or your preferred width */
    }
}
</style>

<script type="text/javascript">
    document.getElementById('inquiry_id').addEventListener('change', function() {
        document.getElementById('submitForm').submit();
    });
</script>

<script type="text/javascript">

    document.getElementById('download_pdf').addEventListener('click', function(e) {
        e.preventDefault();
        var fromDate = document.getElementById('from_date').value;  
        var toDate = document.getElementById('to_date').value;

        var url = "{{ url('inquiry/download-pdf') }}" + "?from_date=" + encodeURIComponent(fromDate) + "&to_date=" + encodeURIComponent(toDate);

        window.location.href = url;
    });
    
    document.getElementById('download_excel').addEventListener('click', function(e) {
        e.preventDefault();
        var fromDate = document.getElementById('from_date').value;  
        var toDate = document.getElementById('to_date').value;

        var url = "{{ url('inquiry/export') }}" + "?from_date=" + encodeURIComponent(fromDate) + "&to_date=" + encodeURIComponent(toDate);

        window.location.href = url;
    });


</script>


<script src="https://jquery.com"></script>
<script>
    $(document).ready(function() {
        
        $("#add-more-row").click(function() {
            let newRow = `
                <div class="row mb-2 align-items-end criteria-row">
                    <div class="col-md-5">
                        <input type="text" name="criteria[]" class="form-control" placeholder="Criteria Name">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="value[]" class="form-control" placeholder="Weight" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger w-100 remove-row">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>`;
            $("#criteria-wrapper").append(newRow);
        });

        //last row not delete
        $(document).on('click', '.remove-row', function() {
            if($(".criteria-row").length > 1) {
                $(this).closest('.criteria-row').remove();
            } else {
                alert("You must keep at least one row.");
            }
        });
    });
</script>


@endsection
