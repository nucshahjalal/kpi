@extends('backend.app')
@section('page_title','Create Inquiry')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
       <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                        <h3 style="text-align: center !important;"> Manage Inquiry Information</h3>
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
                        <a href="{{ url('inquiry.save') }}" class="btn btn-sm btn-lg btn-primary w-100 text-white fw-bold" >
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
                                    <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="com_name"  value="{{ old('com_name') }}" id="com_name" placeholder="Company Name">
                                    @error('com_name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Owner Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="owner_name"  value="{{ old('owner_name') }}" id="owner_name" placeholder="Owner Name">
                                    @error('owner_name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Owner Phone <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="owner_phone"  value="{{ old('owner_phone') }}" id="owner_phone" placeholder="Owner Phone">
                                    @error('owner_phone')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="row">   
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Product Type <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <!-- Dropdown field -->
                                    <select class="form-control" name="product_type" id="product_type" data-select2-selector="icon">
                                        <option value="">--Select--</option> 
                                        <option value="Marine Engine">Marine Engine</option> 
                                        <option value="Marine Equipment">Marine Equipment</option> 
                                    </select>

                                    <!-- Dropdown Icon -->
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-caret-down"></i> <!-- FontAwesome Dropdown Icon -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-lg-4 mb-3">
                                <label class="form-label">Marine Engine <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <!-- Dropdown field -->
                                <select class="form-control" name="marine_engine" id="marine_engine" data-select2-selector="icon">
                                        <option value="">--Select--</option> 
                                        <option value="Mitshubishi">Mitshubishi</option> 
                                        <option value="Yuchai">Yuchai</option> 
                                    </select>

                                <!-- Dropdown Icon -->
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-caret-down"></i> <!-- FontAwesome Dropdown Icon -->
                                    </span>
                                </div>
                                </div>
                            </div>
                                
                            <div class="col-lg-4 mb-3">
                                <label class="form-label">Product Model & Specification <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="product_model"  value="{{ old('product_model') }}" id="product_model" placeholder="Product Model & Specification">
                                @error('product_model')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="row"> 
                                
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Customer Type <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <!-- Dropdown field -->
                                    <select class="form-control" name="customer_type" id="customer_type" data-select2-selector="icon">
                                        <option value="">--Select--</option> 
                                        <option value="Govt">Govt</option> 
                                        <option value="Private">Private</option> 
                                    </select>

                                    <!-- Dropdown Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-caret-down"></i> <!-- FontAwesome Dropdown Icon -->
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Inquiry Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="inqiry_date" value="{{ old('inqiry_date') }}" id="add_inqiry_date" placeholder="Inquiry Date">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('project_pbt')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Inquery Type <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <select class="form-control" name="query_type" id="query_type" data-select2-selector="icon">
                                        <option value="">--Select--</option> 
                                        <option value="HOT">HOT</option> 
                                        <option value="WARM">WARM</option> 
                                        <option value="COLD">COLD</option> 
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-caret-down"></i> <!-- FontAwesome Dropdown Icon -->
                                        </span>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">      
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Approx Project PBT <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="project_pbt"  value="{{ old('project_pbt') }}" id="project_pbt" placeholder="Approx Project PBT">
                                    @error('project_pbt')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Approx Project Start Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="project_start_date" value="{{ old('project_start_date') }}" id="add_project_start_date" placeholder="Project Start Date">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('project_start_date')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Approx Product purchase Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="purchase_date" value="{{ old('purchase_date') }}" id="add_purchase_date" placeholder="Approx Product purchase Date">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('purchase_date')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row"> 
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Project Status <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <!-- Dropdown field -->
                                    <select class="form-control" name="project_status" id="project_status" data-select2-selector="icon">
                                        @php $status = get_project_status(); @endphp
                                        <option value=""> --Select-- </option>
                                        @foreach($status as $key => $value)
                                            <option value="{{ $key }}"> {{ $value }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Dropdown Icon -->
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-caret-down"></i> <!-- FontAwesome Dropdown Icon -->
                                        </span>
                                    </div>
                                </div>

                                @error('inquiry_status')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>     
                                

                                 <div class="col-lg-4 mb-3">
                                    <label class="form-label">Approx Project Start Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="project_start_date" value="{{ old('project_start_date') }}" id="add_project_start_date" placeholder="Project Start Date">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('project_start_date')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Approx Project Value <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="project_value"  value="{{ old('project_value') }}" id="project_value" placeholder="Approx Project Value">
                                    @error('project_value')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row"> 

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Visited BY <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <!-- Dropdown field -->
                                   <select class="form-control" name="visited_by" id="visited_by" data-select2-selector="icon">
                                        @php $status = get_visited_status(); @endphp
                                        <option value=""> --Select-- </option>
                                        @foreach($status as $key => $value)
                                            <option value="{{ $key }}"> {{ $value }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Dropdown Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-caret-down"></i> <!-- FontAwesome Dropdown Icon -->
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Vessel Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="vessel_name"  value="{{ old('vessel_name') }}" id="vessel_name" placeholder="Vessel Name">
                                    @error('vessel_name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="form-group">
                                        <label for="InvoiceNote" class="form-label">Vessel Description <span class="text-danger">*</span></label>
                                        <textarea rows="2" type="text" name="vessel_description" class="form-control" id="vessel_description" placeholder="">{{ old('vessel_description') }}</textarea>
                                    </div>
                                    @error('vessel_description')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="row">      
                                
                                
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label for="InvoiceNote" class="form-label">Builder Details <span class="text-danger">*</span></label>
                                        <textarea rows="2" type="text" name="builder_detail" class="form-control" id="vessel_description" placeholder="">{{ old('builder_detail') }}</textarea>
                                    </div>
                                    @error('builder_detail')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label for="InvoiceNote" class="form-label">Visit Remarks <span class="text-danger">*</span></label>
                                        <textarea rows="2" type="text" name="remark" class="form-control" id="remark" placeholder="">{{ old('remark') }}</textarea>
                                    </div>
                                    @error('remark')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
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

<style>
   .btn {
        text-transform: capitalize;
    }
</style>

<!-- Date calender -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#add_inqiry_date", {
            dateFormat: "Y-m-d", 
            altInput: true,
            altFormat: "F j, Y",
        });
        flatpickr("#add_visit_date", {
            dateFormat: "Y-m-d", 
            altInput: true,
            altFormat: "F j, Y",
        });
        flatpickr("#add_project_start_date", {
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

    // $(document).ready(function() {
    //     $('#add_inqiry_date').datepicker({
    //         dateFormat: 'yy-mm-dd', 
    //         showAnim: "slideDown" 
    //     });
    // });
</script>

<style>
    
.input-group {
    position: relative;
}

/* Style the input field */
.input-group .form-control {
    padding-right: 35px; /* Add space for the icon */
}

/* Style the icon and position it inside the input group */
.input-group-append {
    position: absolute;
    right: 10px; 
    top: 50%;
    transform: translateY(-50%); 
}

/* Optional: Add some padding and border to the icon */
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

/* Align the icon inside the input */
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

</style>
@endsection