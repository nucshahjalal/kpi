@extends('backend.app')
@section('page_title','Create Inquiry')
@section('content')

<main class="nxl-container">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
       <div class="page-header">
            <div class="page-header-left d-flex align-items-center">                    
                <ul class="breadcrumb">
                        <h3 style="text-align: center !important;"> Manage Add Inquiry</h3>
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
                                    <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="company_name"  value="{{ old('company_name') }}" id="company_name" placeholder="Company Name">
                                    @error('company_name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Owner Name </label>
                                    <input class="form-control" type="text" name="name"  value="{{ old('name') }}" id="name" placeholder="Owner Name">
                                    @error('name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Phone </label>
                                    <input class="form-control" type="number" name="phone"  value="{{ old('phone') }}" id="phone" placeholder="Phone">
                                    @error('phone')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Price </label>
                                    <input class="form-control" type="text" name="price"  value="{{ old('price') }}" id="price" placeholder="Price">
                                    @error('price')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label"> Project PBT </label>
                                    <input class="form-control" type="text" name="pbt"  value="{{ old('pbt') }}" id="pbt" placeholder="Project PBT">
                                    @error('pbt')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Product Type <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                        <select class="form-control" name="product_type" id="product_type" data-select2-selector="icon">
                                            <option value="0">Marine Engine</option> 
                                            <option value="1">Marine Equipment</option> 
                                        </select>
                                        <!-- Dropdown Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-caret-down"></i> 
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Start Date </label>
                                    <div class="input-group">
                                        <input class="form-control date-class" type="text" name="start" value="{{ old('start') }}" id="add_start_date" placeholder="Date Calender">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('start')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Engine Type <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-control" name="engine_type" id="engine_type" data-select2-selector="icon">
                                            <option value="0">Mitshubishi</option> 
                                            <option value="1">Yuchai</option> 
                                        </select>

                                        <!-- Dropdown Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-caret-down"></i> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Product Model </label>
                                    <input class="form-control" type="text" name="model"  value="{{ old('model') }}" id="model" placeholder="Product Model">
                                    @error('model')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">   
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Purchase Date </label>
                                    <div class="input-group">
                                        <input class="form-control date-class" type="text" name="purchase_date" value="{{ old('purchase_date') }}" id="add_purchase_date" placeholder="Date Calender">
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
                                
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Customer Type <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <select class="form-control" name="customer_type" id="customer_type" data-select2-selector="icon">
                                        <option value="0">Govt</option> 
                                        <option value="1">Private</option> 
                                    </select>

                                    <!-- Dropdown Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-caret-down"></i> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Project Status <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <select class="form-control" name="project_status" id="project_status" data-select2-selector="icon">
                                        @php $status = get_project_status(); @endphp
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
                            </div>

                            <div class="row"> 

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Inquiry Status <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <select class="form-control" name="status" id="status" data-select2-selector="icon">
                                        <option value="0">HOT</option> 
                                        <option value="1">WARM</option> 
                                        <option value="2">COLD</option> 
                                    </select>

                                    <!-- Dropdown Icon -->
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-caret-down"></i> 
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Vessel Name </label>
                                    <input class="form-control" type="text" name="vessel_name"  value="{{ old('vessel_name') }}" id="vessel_name" placeholder="Vessel Name">
                                    @error('vessel_name')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="form-group">
                                        <label for="InvoiceNote" class="form-label">Builder Details </label>
                                        <textarea rows="2" type="text" name="builder_details" class="form-control" id="builder_details" placeholder="Builder Details">{{ old('builder_details') }}</textarea>
                                    </div>
                                    @error('builder_details')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            
                            <div class="row"> 

                                <div class="col-lg-4 mb-3">
                                    <div class="form-group">
                                        <label for="InvoiceNote" class="form-label">Description </label>
                                        <textarea rows="2" type="text" name="description" class="form-control" id="description" placeholder="Description">{{ old('description') }}</textarea>
                                    </div>
                                    @error('description')
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

@endsection

