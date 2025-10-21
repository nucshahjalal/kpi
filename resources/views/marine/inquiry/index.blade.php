@extends('backend.app')
@section('page_title','Inquiry List')
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
            <div class="d-flex align-items-center gap-1 order-1 order-md-1" style="min-width: 150px; max-width: 300px; justify-content: flex-start;">
                <label class="form-label mb-0" style="white-space: nowrap; width: 90px;">From Date</label>
                <div class="input-group input-group-sm" style="max-width: 150px;">
                    <input type="text" name="from_date" id="from_date"
                        class="date-class add_from_date form-control"
                        value="{{ request('from_date') }}" placeholder="Date Calendar">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                </div>
                <!-- Search button mobile) -->
                <button type="submit" class="btn btn-sm btn-primary ms-2 d-md-none" style="font-size: 12px;">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>

            <!-- To Date + Add New button  -->
            <div class="d-flex align-items-center gap-1 order-3 order-md-2" style="min-width: 150px; max-width: 300px; justify-content: flex-start;">
                <label class="form-label mb-0" style="white-space: nowrap; width: 90px;">To Date</label>
                <div class="input-group input-group-sm" style="max-width: 150px; margin-left:10px;">
                    <input type="text" name="to_date" id="to_date"
                        class="date-class add_to_date form-control"
                        value="{{ request('to_date') }}" placeholder="Date Calendar">
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
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Company Name</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Owner Name</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col"> Phone</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Price</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Project PBT</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Product Type</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Engine Type</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Product Model</th>
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
                                <td>{{ $obj->pbt }}</td>
                                <td>{{ $obj->product_type == 0 ? 'Marine' : 'Marine Equipment' }}</td>
                                <td>{{ $obj->engine_type == 0 ? 'Mitshubishi' : 'Yuchai'}}</td>
                                <td>{{ $obj->model }}</td>
                                <td>
                                    {{-- <input type="hidden" name="inquiry_id" id="inquiry_id" value="{{$obj->id}}"> --}}
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#myModal" 
                                     onclick="visitModal({{ $obj->id }})"><i class="bi bi-check-circle"></i> Check-In </button>
                                    <a class="btn btn-sm btn-primary" href="{{ url('inquiry/view', $obj->id) }}"> <i class="bi bi-eye"></i> View</a>
                                    <a class="btn btn-sm btn-info" href="{{ url('inquiry/edit', $obj->id) }}"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('inquiry/delete', $obj->id) }}" onclick="javascript: return confirm('are you sure delete?')"><i class="bi bi-trash"></i> Delete</a>
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
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('visit.save') }}">
      @csrf

     <input type="hidden" name="inquiry_id" id="modal_inquiry_id">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Visit Information</h5>
        </div> --}}
        <div class="modal-body">
          <div class="mb-1">
            <label for="inputData" class="form-label">Check-In Details</label>
            <textarea rows="3" type="text" name="details" class="form-control" id="details" placeholder="Check-In Details"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success">Save</button>
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
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

@endsection
