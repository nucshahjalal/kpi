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
                <div class="col-xxl-3 col-md-3">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <a href="{{ url('inquiry/list')}}" target="_blank" class="">
                                            <i class="fa-solid fa-tractor tractor-spin"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">10</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Inquiry</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Inquiry Process</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-11 text-muted">10%</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-info" role="progressbar" 
                                        style="width: 10%" 
                                        aria-valuenow="10" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <a href="{{ url('inquiry/list')}}" target="_blank" class="">
                                            <i class="fa-solid fa-circle-check"></i> 
                                        </a>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">5</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total HOT</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">HOT Process</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-11 text-muted">5%</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-success" role="progressbar" 
                                        style="width: 5%" 
                                        aria-valuenow="4" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xxl-6 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <a href="{{ url('inquiry/list')}}" target="_blank" class="">
                                             <i class="fa-solid fa-tractor tractor-spin2"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">5</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total WORM</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">WORM Process</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-11 text-muted">15%</span>
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
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <a href="#" target="_blank" class="">
                                             <i class="fa-solid fa-tractor tractor-spin3"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">5</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total COOL</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Total COLL Process</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-11 text-muted">5%</span>
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
            <div class="row">
                <div class="col-xxl-6 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <a href="{{ url('inquiry/list')}}" target="_blank" class="">
                                             <i class="fa-solid fa-tractor tractor-spin2"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">5</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">MITSUBISHI TOTAL INQUIRY</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">WORM Process</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-11 text-muted">15%</span>
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
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <a href="#" target="_blank" class="">
                                             <i class="fa-solid fa-tractor tractor-spin3"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">5</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">YUCHAI TOTAL INQUIRY</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Total COLL Process</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-11 text-muted">5%</span>
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
                <div class="" style="margin-bottom: 25px; text-align: left;">
                    <div class="">
                        <h5 class=""><span style="color:black;">Marine Equipment</span></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-6 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <a href="{{ url('inquiry/list')}}" target="_blank" class="">
                                             <i class="fa-solid fa-tractor tractor-spin2"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">5</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total WORM</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">WORM Process</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-11 text-muted">15%</span>
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
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <a href="#" target="_blank" class="">
                                             <i class="fa-solid fa-tractor tractor-spin3"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">5</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total COOL</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Total COLL Process</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-11 text-muted">5%</span>
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
                <div class="row">
                    <div class="col-xxl-6 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="avatar-text avatar-lg bg-gray-200">
                                            <a href="{{ url('inquiry/list')}}" target="_blank" class="">
                                                <i class="fa-duotone fa-solid fa-truck-pickup tractor-spin2"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="fs-4 fw-bold text-dark"><span class="counter">5</span></div>
                                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Total WORM</h3>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                </div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">WORM Process</a>
                                        <div class="w-100 text-end">
                                            <span class="fs-11 text-muted">5%</span>
                                        </div>
                                    </div>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-warning" role="progressbar" 
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
                    <div class="col-xxl-6 col-md-6">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between mb-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <div class="avatar-text avatar-lg bg-gray-200">
                                            <a href="#" target="_blank" class="">
                                                <i class="fa-duotone fa-solid fa-truck-pickup tractor-spin3"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <div class="fs-4 fw-bold text-dark"><span class="counter">6</span></div>
                                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Total COOL</h3>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                </div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">COOL Process</a>
                                        <div class="w-100 text-end">
                                            <span class="fs-11 text-muted">5%</span>
                                        </div>
                                    </div>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-dark" role="progressbar" 
                                            style="width: 6%" 
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
            </div>

            <div class="row">
                <div class="col-xxl-12 col-md-12">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Inquiry Value</h5>
                        </div>
                        <div class="card-body custom-card-action p-0">
                            <canvas id="inquiryChart" width="400" height="100"></canvas>
                        </div>
                    </div>
                </div>
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

<script>
  window.onload = function() {
    const ctx = document.getElementById('inquiryChart').getContext('2d');
    const inquiryChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Cool', 'Warm', 'Hot'],
        datasets: [{
          label: 'Millions',
          data: [1.7, 15, 12],
          backgroundColor: '#5DADE2',
          borderRadius: 5,
          barThickness: 20,
        }]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Inquiry Value',
            font: {
              size: 18,
              weight: 'bold'
            }
          },
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: (context) => `${context.raw}M`
            }
          },
          datalabels: {
            anchor: 'end',
            align: 'right',
            formatter: (value) => `${value.toFixed(2)}`
          }
        },
        scales: {
          x: {
            title: { display: true, text: 'Millions' },
            min: 0,
            max: 20
          },
          y: { beginAtZero: true }
        }
      },
      plugins: [ChartDataLabels]
    });
  };
</script>

<!-- Include the Data Labels plugin -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<style>
.tractor-spin {
  font-size: 20px;
  color: green;
  display: inline-block;
  animation: moveTractor 3s linear infinite;
}
.tractor-spin2 {
  font-size: 20px;
  color: black;
  display: inline-block;
  animation: moveTractor 3s linear infinite;
}
.tractor-spin3 {
  font-size: 20px;
  color: light-gray;
  display: inline-block;
  animation: moveTractor 3s linear infinite;
}

@keyframes moveTractor {
  0%   { transform: translateX(0); }
  50%  { transform: translateX(20px); }
  100% { transform: translateX(0); }
}
</style>
<!-- <style>
    .card-header {
    margin-bottom: 100px;
}
</style> -->
@endsection
