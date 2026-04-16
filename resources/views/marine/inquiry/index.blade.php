@extends('backend.app')
@section('page_title','Employee List')
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
                        <tbody>
                            @forelse ($inquiries as $obj)
                            <div class="card mb-3 shadow-sm" style="border: 1px solid #e0e0e0; border-radius: 8px;">
                                <div class="card-body">

                                <div class="row align-items-center mb-3 pb-2 border-bottom g-0" style="background: #fdfdfd; padding: 10px 15px; border-radius: 8px;">
    
                                    <div class="col-md-1 text-start">
                                        <div class="rounded border d-flex align-items-center justify-content-center bg-light" style="width: 50px; height: 50px;">
                                            <i class="bi bi-image text-muted" style="font-size: 1.5rem;"></i>
                                            <!-- <img src="{{ asset('path/to/img.png') }}" class="rounded" style="width: 100%; height: 100%; object-fit: cover;"> -->
                                        </div>
                                    </div>

                                   
                                    <div class="col-md-6 ps-3">
                                        <h5 class="text-primary font-weight-bold mb-1">
                                            {{ $obj->name }} <span class="text-muted fw-normal" style="font-size: 0.8rem;">({{ $obj->model }})</span>
                                        </h5>
                                        <p class="text-muted mb-1 small text-truncate">{{ $obj->description }}</p>
                                        <p class="text-muted mb-0 fw-bold small">
                                            Supervisor: {{ $obj->company_name }} ({{ $obj->phone }})
                                        </p>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="d-flex justify-content-end text-center gap-3">
                                            <div>
                                                <div class="mini-progress-circle bg-secondary text-white">1</div>
                                                <div class="x-small-text">Target Set</div>
                                            </div>
                                            <div>
                                                <div class="mini-progress-circle bg-secondary text-white">2</div>
                                                <div class="x-small-text">Target Approved</div>
                                            </div>
                                            <div>
                                                <div class="mini-progress-circle bg-secondary text-white">3</div>
                                                <div class="x-small-text">Actual Set</div>
                                            </div>
                                            <div>
                                                <div class="mini-progress-circle bg-secondary text-white">4</div>
                                                <div class="x-small-text">Actual Approved</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <!-- Action Buttons Block -->
                                <div class="action-block bg-white border p-3 rounded shadow-sm">
                                   
                                    <div class="row g-2 mb-2">
                                        <div class="col-3">
                                            <button type="button" class="btn btn-sm btn-outline-success w-100 d-inline-flex align-items-center justify-content-center px-1" data-bs-toggle="modal" data-bs-target="#multiRowModal" onclick="visitModal({{ $obj->id }})">
                                                <i class="bi bi-check-circle me-1"></i> <span class="fw-bold" style="font-size: 12px;">Monthly Target</span>
                                            </button>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-sm btn-outline-primary w-100 d-inline-flex align-items-center justify-content-center px-1" href="{{ url('inquiry/view', $obj->id) }}">
                                                <i class="bi bi-eye me-1"></i> <span class="fw-bold" style="font-size: 12px;">Monthly Actual</span>
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-sm btn-outline-danger w-100 d-inline-flex align-items-center justify-content-center px-1" href="{{ url('inquiry/edit', $obj->id) }}">
                                                <i class="bi bi-pencil-square me-1"></i> <span class="fw-bold" style="font-size: 12px;">Update File</span>
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-sm btn-outline-info w-100 d-inline-flex align-items-center justify-content-center px-1" href="{{ url('inquiry/delete', $obj->id) }}" onclick="javascript: return confirm('are you sure delete?')">
                                                <i class="bi bi-check-circle me-1"></i> <span class="fw-bold" style="font-size: 12px;">View Result</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-2">
                                        <div class="col-3">
                                            <a class="btn btn-sm btn-outline-warning w-100 d-inline-flex align-items-center justify-content-center px-1" href="#">
                                                <i class="bi bi-pencil-square me-1"></i> <span class="fw-bold" style="font-size: 12px;">Edit Profile</span>
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-sm btn-outline-secondary w-100 d-inline-flex align-items-center justify-content-center px-1" href="#">
                                                <i class="bi bi-pencil-square me-1"></i> <span class="fw-bold" style="font-size: 12px;">Update Target</span>
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-sm btn-outline-dark w-100 d-inline-flex align-items-center justify-content-center px-1" style="border-color: #6f42c1; color: #6f42c1;" href="#">
                                                <i class="bi bi-pencil-square me-1"></i> <span class="fw-bold" style="font-size: 12px;">Update Actual</span>
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-sm btn-outline-dark w-100 d-inline-flex align-items-center justify-content-center px-1" style="border-color: #fd7e14; color: #fd7e14;" href="#">
                                                <i class="bi bi-pencil-square me-1"></i> <span class="fw-bold" style="font-size: 12px;">Update Result</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-6">
                                            <a class="btn btn-sm btn-outline-success w-100 d-inline-flex align-items-center justify-content-center px-1 rounded-pill" href="{{ url('inquiry/approve', $obj->id) }}">
                                                <i class="bi bi-check-circle-fill me-1"></i> <span class="fw-bold" style="font-size: 11px; text-transform: uppercase;">Approve</span>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-sm btn-outline-danger w-100 d-inline-flex align-items-center justify-content-center px-1 rounded-pill" href="{{ url('inquiry/reject', $obj->id) }}">
                                                <i class="bi bi-slash-circle-fill me-1"></i> <span class="fw-bold" style="font-size: 11px; text-transform: uppercase;">Reject</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>



                                </div>
                            </div>

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
    .mini-progress-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: bold;
        color: white;
        margin: 0 auto;
        border: 2px solid #ddd; /* গ্রে ডিফল্ট বর্ডার */
    }
    /* ছোট টেক্সটের জন্য */
    .x-small-text {
        font-size: 9px;
        font-weight: bold;
        color: #666;
        margin-top: 4px;
        white-space: nowrap;
    }
    /* সাইজ বাড়িয়ে ১৫০px করা হয়েছে এবং পূর্ণ গোলাকার করা হয়েছে */
.progress-circle {
    width: 50px;
    height: 50px;
    background: #e9ecef; /* ডিফল্ট গ্রে ব্যাকগ্রাউন্ড (Bootstrap light gray) */
    border-radius: 50% !important;
    position: relative;
    margin: 0 auto;
    padding: 0;
}


/* প্রগ্রেস বার পজিশন */
.progress-circle .progress-left, 
.progress-circle .progress-right {
    width: 10%;
    height: 30%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}

.progress-circle .progress-left { left: 0; }
.progress-circle .progress-right { right: 0; }

.progress-circle .progress-bar {
    width: 100%;
    height: 100%;
    background: none;
    border-width: 10px; /* প্রগ্রেস বারের পুরুত্ব বাড়ানো হয়েছে */
    border-style: solid;
    position: absolute;
    top: 0;
    border-radius: 0; /* ক্লিপিং ঠিক রাখার জন্য */
}

/* ডান পাশের অংশ (০-৫০%) */
.progress-circle .progress-right .progress-bar {
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    transform-origin: center right;
    border-color: #28a745; /* ডিফল্ট সবুজ রঙ */
}

/* বাম পাশের অংশ (৫১-১০০%) */
.progress-circle .progress-left .progress-bar {
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    transform-origin: center left;
    border-color: #28a745;
}

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
