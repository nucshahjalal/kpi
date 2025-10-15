@extends('backend.app')
@section('page_title','Inquiry List')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
        <!-- [ page-header ] start -->
    <div class="page-header d-flex align-items-center justify-content-between">
        <div class="page-header-left d-flex align-items-center gap-2">
            <a style="font-size: 10px;" href="{{ url('inquiry/export') }}" class="btn btn-sm btn-info">
                <i class="bi bi-file-earmark-excel"></i> Export Excel
            </a>

            {{-- <a style="font-size: 10px;" href="#" id="download_excel" class="btn btn-sm btn-info">
                <i class="bi bi-file-earmark-excel"></i> Export Excel
            </a> --}}

            <a style="font-size: 10px;" href="{{ url('inquiry/download-pdf') }}" class="btn btn-sm btn-dark">
                <i class="bi bi-file-earmark-pdf"></i> Download PDF
            </a>
        </div>

        <div class="page-header-left d-flex align-items-center gap-2">
            <div class="page-header-right ms-auto">
                <form method="get" action="{{ url('inquiry/list') }}" id="submitForm" class="d-flex align-items-center gap-2">
                    @csrf
                    <label class="form-label" style="white-space: nowrap;">From Date</label>
                    <input type="text" name="from_date" id="add_from_date" class="form-control form-control-sm add_from_date" style="max-width: 100px; " value="{{ request('from_date') }}" placeholder="From Date">
                    <label class="form-label" style="white-space: nowrap;">To Date</label>
                    <input type="text" name="to_date" id="add_to_date" class="form-control form-control-sm" style="max-width: 100px;" value="{{ request('to_date') }}" placeholder="To Date">
                    <div class="col-auto">
                        <button style="font-size: 12px;" class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                    </div>
                </form>
            </div>
            <a  style="font-size: 12px;" href="{{ url('inquiry/create') }}" class="btn btn-sm  btn-success">
                <i class="feather-plus me-2"></i>
                <span>Add New</span>
            </a>
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
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Owner Phone</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Price</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Project PBT</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Product Type</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Engine Type</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Model</th>
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
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#myModal" 
                                     onclick="visitModal({{ $obj->id }})"> Check In </button>
                                    {{-- <a class="btn btn-sm btn-primary" href="{{ url('inquiry/view', $obj->id) }}"> <i class="bi bi-eye"></i> View</a> --}}
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

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Visit Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <input type="hidden" name="inquiry_id" id="inquiry_id" value="{{$obj->id}}">
          <div class="mb-3">
            <label for="inputData" class="form-label">Visit Details</label>
            <textarea rows="3" type="text" name="details" class="form-control" id="details" placeholder="Visit Details"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!--open modal and insert data -->
<script>
  function visitModal(id) {
    document.getElementById('inquiry_id').value = id;
    document.getElementById('details').value = ''; 
  }
</script>

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
    document.getElementById('inquiry_id').addEventListener('change', function() {
        document.getElementById('submitForm').submit();
    });
</script>

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

//    document.getElementById('download_excel').addEventListener('click', function(e) {
//         e.preventDefault();

//         var from_date = document.getElementById('add_from_date').value;
//         var to_date = document.getElementById('add_to_date').value;

//         var url = "{{ url('inquiry/export') }}" 
//                 + "?from_date=" + encodeURIComponent(from_date) 
//                 + "&to_date=" + encodeURIComponent(to_date);

//         window.location.href = url;
//     });


</script>

@endsection
