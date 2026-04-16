<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KPI - Employee Registration</title>

    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/theme.min.css')}}">

    <style>
        /* Standred Design Customization */
        body {
            background-color: #f8f9fa; /* হালকা গ্রে ব্যাকগ্রাউন্ড */
        }
        .auth-minimal-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); /* সফট শ্যাডো */
        }
        .form-label {
            font-weight: 600;
            font-size: 13px;
            color: #495057;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 6px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.1);
        }
        .wd-50 {
            width: 70px;
            height: 70px;
            border: 4px solid #fff;
        }
        h3 {
            color: #334155;
            letter-spacing: -0.5px;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
        }
        .btn-outline-primary {
            border-style: dashed; /* KPI বাটনটি আলাদা করতে ড্যাশড বর্ডার */
            padding: 10px;
        }
        .modal-content {
            border: none;
            border-radius: 15px;
        }
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
            border-radius: 15px 15px 0 0;
        }
    </style>
</head>

<body>

<main class="auth-minimal-wrapper">
    <div class="auth-minimal-inner">
        <div class="minimal-card-wrapper" style="max-width: 800px; width: 100%;">

            <div class="card mt-5 position-relative">

                <!-- Logo -->
                <div class="wd-50 bg-white p-2 rounded-circle shadow-md position-absolute translate-middle top-0 start-50 d-flex align-items-center justify-content-center" style="width: 0px; height: 50px;">
                    <img src="{{asset('backend/assets/images/logo.jpg')}}" alt="" class="img-fluid rounded-circle" style="object-fit: cover;">
                </div>

                <div class="card-body p-4 p-sm-5">

                    <h3 class="text-center fw-bold mb-5 mt-3">Employee Registration</h3>

                    <form method="POST" action="">
                        @csrf

                        <!-- Portfolio + Team -->
                        <div class="row g-3"> 
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Portfolio *</label>
                                <select class="form-select" name="portfolio_status">
                                    @foreach(get_portfolio_status() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Team Marketing *</label>
                                <select class="form-select" name="team_status">
                                    @foreach(get_team_status() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Staff Info -->
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Staff ID</label>
                                <input type="text" name="staff_id" class="form-control" placeholder="Staff ID">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Full Name">
                            </div>
                        </div>

                        <!-- Job Info -->
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" placeholder="Designation">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supervisor Name</label>
                                <input type="text" name="supervisor_name" class="form-control" placeholder="Supervisor Name">
                            </div>
                        </div>

                        <!-- Salary -->
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Supervisor ID</label>
                                <input type="text" name="supervisor_id" class="form-control" placeholder="Supervisor ID">
                            </div>

                        </div>

                        <!-- KPI Section -->
                        <div class="mb-4">
                            <button type="button" class="btn btn-sm btn-outline-info w-100 py-3"
                                    data-bs-toggle="modal" data-bs-target="#multiRowModal">
                                Add Quantitative Criteria
                            </button>
                        </div>

                        <!-- Submit -->
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary w-100 shadow-sm">
                                Register Employee Account
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</main>

!-- Modal -->
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
                                    -
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

<script src="{{asset('backend/assets/vendors/js/vendors.min.js')}}"></script>


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
                            -
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

</body>
</html>
