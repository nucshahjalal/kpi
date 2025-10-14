@extends('backend.app')
@section('page_title','Inquiry List')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
        <!-- [ page-header ] start -->
    <div class="page-header d-flex align-items-center justify-content-between">
        <div class="page-header-left d-flex align-items-center gap-2">
        </div>

        <div class="page-header-left d-flex align-items-center gap-2">
            <div class="page-header-right ms-auto">
                <form method="get" action="{{ url('inquiry/list') }}">
                    @csrf
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-control" type="text" name="filter" 
                            value="{{ request('filter') }}" id="filter" placeholder="Search...">
                        <div class="col-auto">
                            <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <a href="{{ url('inquiry/create') }}" class="btn btn-sm  btn-success">
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
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Product Type</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Marine Engine</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Product Model</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Customer Type</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Date</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Builder Details</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Vessel Name</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Vessel Description</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Approx Project Value</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Approx Project PBT</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Approx Project Start Date</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Approx Product purchase Date</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Project Status</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Last Visit Date</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Visit Remarks</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Query Type</th>
                                <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inqries as $obj)
                            <tr>
                                <td>{{ $loop->index + $inqries->firstItem() }}</td>
                                <td>{{ $obj->emp_id }}</td>
                                <td>{{ $obj->name }}</td>
                                <td>{{ $obj->designation }}</td>
                                <td>{{ $obj->phone }}</td>
                                <td>{{ $obj->portfolio }}</td>
                                <td>{{ $obj->status ? 'Active' : 'InActive' }}</td>
                                <td>
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
                    {!! $inqries->withQueryString()->links('pagination::bootstrap-5') !!}
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

<style>
   .btn {
        text-transform: capitalize;
    }
</style>

@endsection
