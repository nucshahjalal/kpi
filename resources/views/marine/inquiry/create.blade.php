@extends('backend.app')
@section('page_title','Create Employee')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
        <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">                    
            <ul class="breadcrumb">
                    <h3 style="text-align: center !important;"> Manage Add Employee</h3>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="{{ url('inquiry/list') }}" class="btn btn-sm btn-lg btn-primary w-100 text-white fw-bold" >
                        ← Back
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <form action="{{ route('inquiry.save') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Portfolio <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <select class="form-control" name="portfolio_status" id="portfolio_status" data-select2-selector="icon">
                                        @php $status = get_portfolio_status(); @endphp
                                        @foreach($status as $key => $value)
                                            <option value="{{ $key }}"> {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <!-- Dropdown Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-caret-down"></i>
                                            </span>
                                        </div>
                                    </div>

                                    @error('project_status')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Team Marketing <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <select class="form-control" name="team_status" id="team_status" data-select2-selector="icon">
                                        @php $team_status = get_team_status(); @endphp
                                        @foreach($team_status as $key => $value)
                                            <option value="{{ $key }}"> {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <!-- Dropdown Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-caret-down"></i>
                                            </span>
                                        </div>
                                    </div>

                                    @error('team_status')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Staff ID </label>
                                    <input class="form-control" type="number" name="staff_id"  value="{{ old('staff_id') }}" id="staff_id" placeholder="Staff ID">
                                    @error('staff_id')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Full Name </label>
                                    <input class="form-control" type="text" name="full_name"  value="{{ old('full_name') }}" id="full_name" placeholder="Full Name">
                                    @error('full_name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Designation </label>
                                    <input class="form-control" type="text" name="designation"  value="{{ old('designation') }}" id="designation" placeholder="Designation">
                                    @error('designation')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label"> Supervisor Name </label>
                                    <input class="form-control" type="text" name="supervisor_name"  value="{{ old('supervisor_name') }}" id="supervisor_name" placeholder="Supervisor Name ">
                                    @error('supervisor_name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                            
                            
                            <div class="row"> 

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label"> Supervisor ID </label>
                                    <input class="form-control" type="text" name="pbt"  value="{{ old('pbt') }}" id="pbt" placeholder="Supervisor ID">
                                    @error('pbt')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label"> Base Amount </label>
                                    <input class="form-control" type="text" name="pbt"  value="{{ old('pbt') }}" id="pbt" placeholder="Base Amount">
                                    @error('pbt')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row"> 
                                <div class="col-lg-12 mb-3"> 
                                    <h3 style="background: #D3B270; display: inline-block; padding: 8px 20px; color: white; border-radius: 4px; font-size: 1.2rem; font-weight: 600;"> 
                                        KPI Kriteria Information 
                                    </h3>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-sm btn-info w-25" data-bs-toggle="modal" data-bs-target="#multiRowModal" onclick="visitModal()" 
                                            style="background-color: #bc9b5d; border: 1px solid #a3854d; color: white; padding: 8px;">
                                        <i class="bi bi-plus-circle-fill"></i> Add Quantitative Criteria
                                    </button>
                                </div>
                            </div>

                            <div style="text-align:center;" class="row">      
                                <div class="col-lg-12 mb-7 ">
                                    <button  type="submit" class="btn btn-success">Submit</button>
                                </div> 
                            </div>
                        </form>
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

<style>
   .btn {
        text-transform: capitalize;
    }
</style>

<!-- Date calender -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Dropdown and Date calender icon -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
      
        flatpickr("#add_start_date", {
            dateFormat: "Y-m-d", 
            altInput: true,
            altFormat: "F j, Y",
        });
        flatpickr("#add_purchase_date", {
            dateFormat: "Y-m-d", 
            altInput: true,
            altFormat: "F j, Y",
        });
    });

</script>

<style>
    
/* date field bacground color white */
.date-class{
     background-color: white !important;
    color: #000;  
}
.input-group {
    position: relative;
}
.input-group .form-control {
    padding-right: 35px; 
}
.input-group-append {
    position: absolute;
    right: 10px; 
    top: 50%;
    transform: translateY(-50%); 
}
.input-group .input-group-text {
    background-color: white;
    border-left: none; 
}
.input-group {
    position: relative;
}
.input-group .form-control {
    padding-right: 35px; 
}

.input-group-append {
    position: absolute;
    right: 0px;  
    top: 49%;
    transform: translateY(-50%); 
}

/* Optional: Make the dropdown icon background white */
.input-group .input-group-text {
    background-color: white;
    border-left: none; 
}

</style>

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

