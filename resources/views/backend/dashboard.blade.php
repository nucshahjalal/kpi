@extends('backend.app')
@section('page_title','ACI Marine')
@section('content')

<main  class="nxl-container">
    <div  class="nxl-content">
        <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Dashboard</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
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
            <div class="dropdown filter-dropdown">
                <div class="page-header-right ms-auto">
                    <form method="get" action="{{ url('/dashboard') }}" id="submitForm" class="d-flex align-items-center gap-2">
                        @csrf
                        <label class="form-label" style="white-space: nowrap;">From Date</label>
                        <input type="text" name="from_date" id="add_from_date" class="form-control form-control-sm" style="max-width: 160px;" value="{{ request('from_date') }}" placeholder="From Date">
                        <label class="form-label" style="white-space: nowrap;">To Date</label>
                        <input type="text" name="to_date" id="add_to_date" class="form-control form-control-sm" style="max-width: 160px;" value="{{ request('to_date') }}" placeholder="To Date">
                        <div class="col-auto">
                            <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>

    <div style="margin-top:0px;" class="main-content">  
        <div class="col-xxl-12">
            <div class="" style="margin-bottom: 25px; text-align: left;">
                <div class="">
                    <h5 class=""><span style="color:black;">Marine Engine</span></h5>
                </div>
            </div>

    <div class="row">
        <!-- Card 1 -->
            <div class="col-xxl-3 col-md-3">
                <div style="background: linear-gradient(to right, #0dbc5c, #b7c3bc);" class="card stretch stretch-full text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-white text-success">
                                    <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                        <i style="">
                                            <img src="{{asset('backend/assets/icon/icon1.jpg')}}" width="30px" height="50%" class="img-fluid">
                                        </i>
                                    </a>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-white"><span class="counter">10</span></div>
                                    <h3 style="font-size: 12px;" class="fs-13 fw-semibold text-white text-truncate-1-line">Total Inquiry</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="text-white">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" style="font-size: 11px;" class="fs-12 fw-medium text-white text-truncate-1-line">Inquiry Process</a>
                                <div class="w-100 text-end">
                                    <span class="fs-11 text-white">10%</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3" style="height: 5px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Card 2 -->
            <div class="col-xxl-3 col-md-3">
                <div style="background: linear-gradient(to right, #d2252b, #da9598);" class="card stretch stretch-full  text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-white text-success">
                                    <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                        <i style="">
                                        <img src="{{asset('backend/assets/icon/icon2.jpg')}}" width="30px" height="100%" class="img-fluid">
                                        </i>
                                    </a>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-white"><span class="counter">5</span></div>
                                    <h3 style="font-size: 12px;" class="fs-13 fw-semibold text-white text-truncate-1-line">Total Hot</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="text-white"><i class="feather-more-vertical"></i></a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" style="font-size: 12px;" class="text-white fs-12 fw-medium text-truncate-1-line">Hot Process</a>
                                <div class="w-100 text-end">
                                    <span class="fs-11 text-white">5%</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Card 3 -->
            <div class="col-xxl-3 col-md-3">
                <div style="background: linear-gradient(to right, #df960d, #c1b295);" class="card stretch stretch-full  text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                              <div class="avatar-text avatar-lg bg-white text-success">
                                    <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                        <i style="" class="">
                                            <img src="{{asset('backend/assets/icon/icon6.jpg')}}" width="30px" height="50%"  class="img-fluid">
                                        </i>
                                    </a>
                                    
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-white"><span class="counter">10</span></div>
                                    <h3 style="font-size: 12px;" class="fs-13 fw-semibold text-white text-truncate-1-line">Total Warm</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="text-white"><i class="feather-more-vertical"></i></a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fs-12 fw-medium text-white text-truncate-1-line">Warm Process</a>
                                <div class="w-100 text-end">
                                    <span class="fs-11 text-white">10%</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-info text-white" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
        <div class="col-xxl-3 col-md-3">
            <div style="background: linear-gradient(to right, #0fbdb2, #a1c9c6);" class="card stretch stretch-full bg-info text-white">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-white text-success">
                                <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                        <i style="" class="">
                                        <img src="{{asset('backend/assets/icon/icon10.jpg')}}" width="30px" height="50%"  class="img-fluid">
                                    </i>
                                    {{-- <i style="background-color: rgb(207, 149, 62);padding:3px;" class="icon-rainbow icon-hover4-color icon-rainbow fa-solid fa-gas-pump engine-spin44"></i> --}}
                                </a>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-white"><span class="counter">5</span></div>
                                <h3 style="font-size: 12px;" class="fs-13 fw-semibold text-white text-truncate-1-line">Total Cool</h3>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="text-white"><i class="feather-more-vertical"></i></a>
                    </div>
                    <div class="pt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="fs-12 fw-medium text-white text-truncate-1-line">Cool Process</a>
                            <div class="w-100 text-end">
                                <span class="fs-11 text-white">5%</span>
                            </div>
                        </div>
                        <div class="progress mt-2 ht-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xxl-6 col-md-6">
            <div style="background: linear-gradient(to right, rgb(32, 149, 192), rgb(198, 213, 219));" class="card stretch stretch-full text-white">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-white text-success">
                                <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                     <i style="" class="">
                                        <img src="{{asset('backend/assets/icon/icon9.jpg')}}" width="30px" height="50%"  class="img-fluid">
                                    </i>
                                        {{-- <i style="background-color: rgb(228, 189, 19);padding:3px;" class="icon-rainbow icon-hover5-color fa-solid fa-gas-pump engine-spin55"></i> --}}
                                </a>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-white"><span class="counter">5</span></div>
                                <h3 class="fs-13 fw-semibold text-truncate-1-line text-white">Mitsubishi Total Inquiry</h3>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="text-white">
                            <i class="feather-more-vertical"></i>
                        </a>
                    </div>
                    <div class="pt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="text-white fs-12 fw-medium text-truncate-1-line">Mitsubishi Process</a>
                            <div class="w-100 text-end">
                                <span class="fs-11 text-white">15%</span>
                            </div>
                        </div>
                        <div class="progress mt-2 ht-3">
                            <div class="progress-bar bg-warning" role="progressbar" 
                                style="width: 15%" 
                                aria-valuenow="15" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div style="background: linear-gradient(to right,#2323c3,#8d8dc0"  class="card stretch stretch-full text-white">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-white text-success">
                                <a href="#" target="_blank" class="text-white">
                                    <i style="" class="">
                                        <img src="{{asset('backend/assets/icon/icon7.jpg')}}" width="30px" height="50%"  class="img-fluid">
                                    </i>
                                </a>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-white"><span class="counter">5</span></div>
                                <h3 class="fs-13 fw-semibold text-truncate-1-line text-white">Yuchai Total Inquery</h3>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="text-white">
                            <i class="feather-more-vertical"></i>
                        </a>
                    </div>
                    <div class="pt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="text-white fs-12 fw-medium text-truncate-1-line">Yuchai Process</a>
                            <div class="w-100 text-end">
                                <span class="fs-11 text-white">5%</span>
                            </div>
                        </div>
                        <div class="progress mt-2 ht-3">
                            <div class="progress-bar bg-dark" role="progressbar" 
                                style="width: 5%" 
                                aria-valuenow="5" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xxl-12">
    <div style="margin-bottom: 25px; text-align: left;">
        <div>
            <h5 class="text-white"><span style="color:black;">Marine Equipment</span></h5>
        </div>
    </div>

    <div class="row">
        <!-- Card 1 -->
        <div class="col-xxl-3 col-md-3">
            <div  style="background: linear-gradient(to right, #286fd1, #859cbc);" class="card stretch stretch-full bg-secondary  text-white">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-white text-success">
                                <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                    <i style="" class="">
                                        <img src="{{asset('backend/assets/icon/icon13.jpg')}}" width="30px" height="50%"  class="img-fluid">
                                    </i>
                                </a>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-white"><span class="counter">10</span></div>
                                <h3 style="font-size: 12px;" class="fs-13 fw-semibold text-white text-truncate-1-line">Total Inquiry</h3>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="text-white">
                            <i class="feather-more-vertical"></i>
                        </a>
                    </div>
                    <div class="pt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" style="font-size: 11px;" class="text-white fs-12 fw-medium text-truncate-1-line">Inquery Process</a>
                            <div class="w-100 text-end">
                                <span class="fs-11 text-white">10%</span>
                            </div>
                        </div>
                        <div class="progress mt-2 ht-3" style="height: 5px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-xxl-3 col-md-3">
            <div style="background: linear-gradient(to right,rgb(232, 93, 93),rgb(227, 186, 186));"  class="card stretch stretch-full  text-white">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-white text-success">
                                <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                    <i style="" class=" ">
                                        <img src="{{asset('backend/assets/icon/icon5.jpg')}}" width="30px" height="50%"  class="img-fluid">
                                    </i>
                                </a>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-white"><span class="counter">5</span></div>
                                <h3 style="font-size: 12px;" class="fs-13 fw-semibold text-white text-truncate-1-line">Total Hot</h3>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="text-white"><i class="feather-more-vertical"></i></a>
                    </div>
                    <div class="pt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="fs-12 fw-medium text-white text-truncate-1-line">Hot Process</a>
                            <div class="w-100 text-end">
                                <span class="fs-11 text-white">5%</span>
                            </div>
                        </div>
                        <div class="progress mt-2 ht-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-xxl-3 col-md-3">
            <div style="background: linear-gradient(to right,rgb(220, 203, 73),rgb(173, 201, 202))" class="card stretch stretch-full text-white">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-4">
                        <div class="d-flex gap-4 align-items-center">
                            <div class="avatar-text avatar-lg bg-white text-success">
                                <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                        <img src="{{asset('backend/assets/icon/icon12.jpg')}}" width="30px" height="50%"  class="img-fluid">
                                    </i>
                                </a>
                            </div>
                            <div>
                                <div class="fs-4 fw-bold text-white"><span class="counter">10</span></div>
                                <h3 style="font-size: 12px;" class="fs-13 fw-semibold text-white text-truncate-1-line">Total Warm</h3>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="text-white"><i class="feather-more-vertical"></i></a>
                    </div>
                    <div class="pt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="fs-12 fw-medium text-white text-truncate-1-line">Warm Process</a>
                            <div class="w-100 text-end">
                                <span class="fs-11 text-white">10%</span>
                            </div>
                        </div>
                        <div class="progress mt-2 ht-3">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
            <div class="col-xxl-3 col-md-3">
                <div style="background: linear-gradient(to right,rgb(203, 36, 125),rgb(187, 142, 166));"  class="card stretch stretch-full text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-white text-success">
                                    <a href="{{ url('inquiry/list')}}" target="_blank" class="text-white">
                                        <i style="" class="">
                                        <img src="{{asset('backend/assets/icon/icon3.jpg')}}" width="30px" height="50%"  class="img-fluid">
                                    </i>
                                    </a>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-white"><span class="counter">6</span></div>
                                    <h3 style="font-size: 12px;" class="fs-13 fw-semibold text-white text-truncate-1-line">Total Cool</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="text-white"><i class="feather-more-vertical"></i></a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="text-white fs-12 fw-medium text-truncate-1-line">Cool Process</a>
                                <div class="w-100 text-end">
                                    <span class="fs-11 text-white">5%</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        <div class="row">
                <!-- Chart 1 -->
            <div class="col-xxl-6 col-md-6">
                <div class="card stretch stretch-full p-3">
                    <div class="card-body">
                        <div class="chart-wrapper">
                            <canvas id="projectInqury"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart 2 -->
            <div class="col-xxl-6 col-md-6">
                <div  class="card stretch stretch-full p-3">
                    <div  class="card-body">
                        <div  class="chart-wrapper">
                            <canvas  id="projectDiscontinuation"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-6 col-md-6 col-12">
                <div class="card stretch stretch-full p-3">
                    <div class="card-body custom-card-action">
                        <div class="chart-wrapper">
                            <canvas id="inquiryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6 col-md-6 col-12">
                <div class="card stretch stretch-full p-3">
                    <div class="card-body custom-card-action">
                        <div class="chart-wrapper">
                            <canvas id="productChart"></canvas>
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
        backgroundColor: ['#c0392b', '#2980b9'],
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
        labels: ['Cool', 'Warm', 'Hot'],
        datasets: [{
          label: 'Millions',
          data: [1.7, 15, 12],
          backgroundColor: ['#8E44AD', '#F39C12', '#E74C3C'],  // Segment colors
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
              label: (context) => `${context.label}: ${context.raw.toFixed(2)}M`
            }
          },
          datalabels: {
            color: '#fff',
            font: {
              weight: 'bold',
              size: 16
            },
            formatter: (value, context) => {
              return `${value.toFixed(2)}M`;
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
          data: [10.2, 8.4],
          backgroundColor: ['#3498DB', '#E67E22'],
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
              label: (context) => `${context.label}: ${context.raw.toFixed(2)}M`
            }
          },
          datalabels: {
            color: '#fff',
            font: { weight: 'bold', size: 10 },
            formatter: (value) => `${value.toFixed(2)}M`
          }
        }
      },
      plugins: [ChartDataLabels]
    });
  };
</script>

{{-- <script>
    const ctx = document.getElementById('projectChart').getContext('2d');

    const projectChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Successful', 'Unsuccessful'],
            datasets: [{
                label: 'Project Stats',
                data: [{{ $successful }}, {{ $total - $successful }}],
                backgroundColor: [
                    '#c0392b',  // Red for successful (based on your image)
                    '#2980b9'   // Blue for total (remaining unsuccessful projects)
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = {{ $total }};
                            const value = context.parsed;
                            const percentage = ((value / total) * 100).toFixed(0);
                            return `${context.label}: ${percentage}%`;
                        }
                    }
                }
            }
        }
    });
</script> --}}

{{-- <script>
    const ctx = document.getElementById('projectChart').getContext('2d');

    const totalProjects = {{ $total }};
    const discontinuation = {{ $discontinuation }};
    const ongoingProjects = totalProjects - discontinuation;

    const projectChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Total Project', 'Discontinuation'],
            datasets: [{
                label: 'Project Status',
                data: [ongoingProjects, discontinuation],
                backgroundColor: [
                    '#3b72b3',   // Blue color similar to your image
                    '#b7aed8'    // Light purple color similar to your image
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 15,
                        padding: 20
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.parsed;
                            const percentage = ((value / totalProjects) * 100).toFixed(0);
                            return `${context.label}: ${percentage}%`;
                        }
                    }
                }
            }
        }
    });
</script> --}}
<style>
 
 .chart-wrapper {
  width: 100%;
  max-width: 400px;      /* max width on desktop */
  margin: 0 auto;        /* center horizontally */
  aspect-ratio: 1 / 1;   /* keep square */
  padding: 10px;         /* optional padding */
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
    height: 300px; /* Adjust height for mobile */
    margin: 0 auto; /* Ensure the chart is centered horizontally */
  }
}
    
.chart-container,
.chart-container2 {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;        /* Equal padding on all sides */
  height: 400px;       
  box-sizing: border-box;
}

#projectDiscontinuation {
  width: 100%; /* Full width by default */
  height: 400px; /* Default height */
  margin: 0 auto; /* Center the chart horizontally */
}



</style>

@endsection
