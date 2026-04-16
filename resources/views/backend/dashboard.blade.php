@extends('backend.app')
@section('page_title','KPI')
@section('content')

<main  class="nxl-container">
    <div  class="nxl-content">
        <!-- [ page-header ] start -->
   <div class="page-header d-flex align-items-center justify-content-between gap-2 flex-wrap p-3 rounded-3 shadow-sm" style="">
    
        <div class="d-flex align-items-center gap-2">
            <form method="get" action="" class="d-flex align-items-center gap-2 m-0">
                <div class="d-flex gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="month" class="mb-0">Month</label>
                        <select name="month" class="form-select"> 
                            @php $months = get_months(); @endphp
                            @foreach ($months as $key => $value)
                                <option value="{{ $value }}" {{ request('month', date('F')) == $value ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

            .        <div class="d-flex align-items-center gap-2">
                        <label for="year" class="mb-0">Year</label>
                        <select name="year" class="form-select"> 
                            @php $years = get_years(); @endphp
                            @foreach ($years as $key => $value)
                                <option value="{{ $key }}" {{ request('year', date('Y')) == $value ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-sm btn-secondary d-flex align-items-center">
                   <i class="bi bi-check-circle me-1"></i> Set Data
                </button>
            </form>
        </div>

        <div class="d-flex align-items-center gap-2 flex-wrap">
            
            <button type="button" class="btn btn-sm btn-success d-flex align-items-center">
                <i class="bi bi-key me-1"></i> Update Password
            </button>
            <a href="{{ url('inquiry/create') }}" class="btn btn-sm btn-info d-flex align-items-center">
                <i class="feather-plus me-2"></i> Add New
            </a>
               
        </div>

        
    </div>

    <div style="margin-top:0px;" class="main-content">  
        <div class="col-xxl-12">
            <div class="" style="margin-bottom: 25px; text-align: left;">
                <div class="">
                    <h5 style="font-size:12px;" class=""><span style="color:black;">KPI PERFORMANCE</span></h5>
                </div>
            </div>

    <div class="row">
        <!-- Card 1 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #17a2b8;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                                A
                            </div>

                            <div class="text-center w-100">
                                <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 9px; letter-spacing: 0.3px;">
                                    Agri Machineries
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Card 2 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #3fcd5d;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                                H
                            </div>

                            <div class="text-center w-100">
                                <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 10px; letter-spacing: 0.3px;">
                                   Hamaha
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
       <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #820e8b;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px; ">
                                F
                            </div>

                            <div class="text-center w-100">
                                 <h6 class="text-muted fw-bold text-uppercase mb-1" 
                                    style="font-size: 9px; letter-spacing: 0.3px; width: 100%; display: block; text-align: center;">
                                    Foton
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <!-- KPI Indicator Section: Tightened margins -->
                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <!-- Ultra Slim Progress Bar -->
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #cd4848;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px; ">
                                P
                            </div>

                            <div class="text-center w-100">
                                <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 9px; letter-spacing: 0.3px;">
                                   PTDE,Traning,WP,ME
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                      
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            

    <div class="col-xxl-12">

        {{-- second card --}}
        <div class="row">
            <!-- Card 1 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #f47348;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                                S
                            </div>

                            <div class="text-center w-100">
                                <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 9px; letter-spacing: 0.3px;">
                                  SCM
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Card 2 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #3fcd5d;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                                C
                            </div>

                            <div class="text-center w-100">
                               <h6 class="text-muted fw-bold text-uppercase mb-1" 
                                    style="font-size: 9px; letter-spacing: 0.3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; text-align: center; display: block; width: 100%;">
                                    Construction Equipment
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
       <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #eb9c57;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                                N
                            </div>

                            <div class="text-center w-100">
                                <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 9px; letter-spacing: 0.3px;">
                                   New Machineries
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #c59ce7;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                                P
                            </div>

                            <div class="text-center w-100">
                                <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 9px; letter-spacing: 0.3px;">
                                  Power Solution
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

            {{-- Third row card --}}
        <div class="row">

            <!-- Card 1 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #2370ae;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                                A
                            </div>

                            <div class="text-center w-100">
                               <h6 class="text-muted fw-bold text-uppercase mb-1" 
                                    style="font-size: 9px; letter-spacing: 0.3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; text-align: center; display: block; width: 100%;">
                                   ACI Marine
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #a5db2e;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                               T
                            </div>

                            <div class="text-center w-100">
                               <h6 class="text-muted fw-bold text-uppercase mb-1" 
                                    style="font-size: 9px; letter-spacing: 0.3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; text-align: center; display: block; width: 100%;">
                                  Tire
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #714389;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                               C
                            </div>

                            <div class="text-center w-100">
                               <h6 class="text-muted fw-bold text-uppercase mb-1" 
                                    style="font-size: 9px; letter-spacing: 0.3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; text-align: center; display: block; width: 100%;">
                                  Call Center
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-xxl-3 col-md-3">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 8px; background: #ffffff;">
                <div class="card-body p-3" style="border-left: 3px solid #340404;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="avatar-text rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                style="width: 38px; height: 38px;">
                                Y
                            </div>

                            <div class="text-center w-100">
                               <h6 class="text-muted fw-bold text-uppercase mb-1" 
                                    style="font-size: 9px; letter-spacing: 0.3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; text-align: center; display: block; width: 100%;">
                                  Yamaha Factory
                                </h6>
                                <div class="fs-5 fw-bolder text-dark leading-tight">
                                    <span class="counter">{{ $total_inquries }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Action Menu -->
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical" style="font-size: 14px;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-muted" style="font-size: 10px;">Submission</span>
                            <span class="fw-bold text-info" style="font-size: 10px;">{{ $total_inquries }}%</span>
                        </div>
                        <div class="progress" style="height: 4px; background-color: #f1f5f9; border-radius: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" 
                                style="width: {{ $total_inquries }}%; border-radius: 10px;" 
                                aria-valuenow="{{ $total_inquries }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="mt-1 d-flex align-items-center gap-1">
                            <span class="text-success fw-bold" style="font-size: 9px;"><i class="bi bi-arrow-up-short"></i> 12%</span>
                            <span class="text-muted" style="font-size: 9px;">vs last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </div>

        <div class="row">

        </div>

    </div>
        
    </div>
</div>

</div>

</div>
</div>
</div>
    <!-- [ Footer ] start -->
    <!-- @include('backend.footer') -->
    <!-- [ Footer ] end -->
</main>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<!-- Include the Data Labels plugin -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
  const ctx = document.getElementById('projectInqury').getContext('2d');

  const projectChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Successful', 'Total Project'],
      datasets: [{
        label: 'Project Stats',
        data: [20, 10],
        backgroundColor: ['#61f2cf', '#3d99e0'],
        borderWidth: 2,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        title: {
          display: true,
          text: 'Achievement Ratio',  // ✅ Chart Title Here
          font: {
            size: 20,
            weight: 'bold'
          },
          color: '#333'
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              const total = 30;
              const value = context.raw;
              const percentage = ((value / total) * 100).toFixed(0);
              return `${context.label}: ${percentage}%`;
            }
          }
        },
        legend: {
          position: 'top',
          labels: {
            font: {
              size: 14,
              weight: 'bold'
            }
          }
        },
        datalabels: {
          formatter: (value, ctx) => {
            const total = ctx.dataset.data.reduce((acc, val) => acc + val, 0);
            const percentage = ((value / total) * 100).toFixed(0);
            return `${percentage}%`;
          },
          color: '#fff',
          font: {
            size: 14,
            weight: 'bold'
          }
        }
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    },
    plugins: [ChartDataLabels]
  });
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('projectDiscontinuation').getContext('2d');

    const totalProjects = 50;
    const discontinuation = 20;
    const ongoingProjects = totalProjects - discontinuation;

    const projectChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Total Project', 'Discontinuation'],
        datasets: [{
          label: 'Project Status',
          data: [ongoingProjects, discontinuation],
          backgroundColor: ['#3b72b3', '#b7aed8'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false, 
        aspectRatio: 1, 
        plugins: {
          title: {
            display: true,
            text: 'Discontinuation Ratio', // Chart title here
            font: {
              size: 20,
              weight: 'bold'
            },
            color: '#333',
            padding: {
              top: 3,
              bottom: 5
            }
          },
          legend: {
            position: 'top',
            labels: {
              boxWidth: 15,
              padding: 20,
              font: {
                size: 14,
                weight: 'bold'
              }
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                const value = context.raw;
                const percentage = ((value / totalProjects) * 100).toFixed(0);
                return `${context.label}: ${percentage}%`; // Show percentage in the tooltip
              }
            }
          }
        }
      }
    });
  });
</script>

<script>
  window.onload = function () {
    // --- Inquiry Chart ---
    const ctx = document.getElementById('inquiryChart').getContext('2d');
    const inquiryChart = new Chart(ctx, {
      type: 'doughnut',  
      data: {
        labels: ['Cold', 'Warm', 'Hot'],
        datasets: [{
          label: 'Millions',
          data: [ {{ $total_cold }}, {{ $total_warm }}, {{ $total_hot }} ],
          backgroundColor: ['#bfeaf8', '#ffc994','#ffb4a8'],  
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        animation: {
          duration: 1000,
          easing: 'easeOutBounce'
        },
        plugins: {
          title: {
            display: true,
            text: 'Inquiry Value',
            font: {
              size: 20,
              weight: 'bold'
            },
            color: '#333'
          },
          legend: {
            position: 'bottom',  
            labels: {
              font: {
                size: 14
              }
            }
          },
          tooltip: {
            callbacks: {
              label: (context) => `${context.label}: ${context.raw.toFixed(2)}` //m
            }
          },
          datalabels: {
            color: '#fff',
            font: {
              weight: 'bold',
              size: 16
            },
            formatter: (value, context) => {
              return `${value.toFixed(2)}`; //m
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });

    // --- Product Value Chart (Equipment & Engine Combined) ---
    const ctx2 = document.getElementById('productChart').getContext('2d');
    const productValueChart = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: ['Equipment', 'Egnine'],
        datasets: [{
          label: 'Product Value (Millions)',
          data: [ {{ $total_engine }}, {{ $total_equipment }} ],
          backgroundColor: ['#87dfe1', '#f0a8e4'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Product Value',
            font: { size: 18, weight: 'bold' },
            color: '#333'
          },
          legend: {
            position: 'bottom',
            labels: { font: { size: 14 } }
          },
          tooltip: {
            callbacks: {
              label: (context) => `${context.label}: ${context.raw.toFixed(2)}`//m
            }
          },
          datalabels: {
            color: '#fff',
            font: { weight: 'bold', size: 10 },
            formatter: (value) => `${value.toFixed(2)}`//m
          }
        }
      },
      plugins: [ChartDataLabels]
    });
  };
</script>

<style>

.btn {
    text-transform: capitalize;
}

 .chart-wrapper {
  width: 100%;
  max-width: 400px;     
  margin: 0 auto;      
  aspect-ratio: 1 / 1;  
  padding: 10px;         
  box-sizing: border-box;
}

.chart-wrapper canvas {
  width: 100% !important;
  height: auto !important;
  display: block;
}

@media (max-width: 768px) {
  #projectDiscontinuation {
    width: 100%; /* Adjust width for mobile */
    height: 300px; 
    margin: 0 auto; 
  }
}
    
.chart-container,
.chart-container2 {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;        
  height: 400px;       
  box-sizing: border-box;
}

#projectDiscontinuation {
  width: 100%; 
  height: 400px; 
  margin: 0 auto; 
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
}
.input-group-text i {
font-size: 1.1rem;
color: #495057; 
}

</style>

@endsection
