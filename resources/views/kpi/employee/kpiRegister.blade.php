<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Registration</title>

    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">

    <style>
        body {
            background: linear-gradient(135deg, #eef2f7, #ffffff);
            font-family: 'Segoe UI', sans-serif;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        }

        .kpi-box {
            border: 2px dashed #4e73df;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
        }

        .kpi-list {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="col-md-8">
                
        <div class="card position-relative mt-5 shadow-sm border-0">
        
            <div class="position-absolute translate-middle top-0 start-50 shadow-lg bg-white rounded-circle d-flex align-items-center justify-content-center" 
                style="width: 70px; height: 70px; border: 4px solid #fff; z-index: 10;">
                <img src="{{asset('backend/assets/images/logo.jpg')}}"  alt="Logo"
                style="width: 90%; height: 90%; object-fit: contain; border-radius: 50%;">
            </div>

            <div class="card-body pt-2"> 
                <h3 class="text-center fw-bold mt-3 mb-4">Employee Registration</h3>

                <form id="employeeForm" action="{{ route('criteria.store') }}" method="POST" class="p-4 border shadow-sm bg-white" style="border: 1px solid #dee2e6 !important; border-radius: 8px; mt-4: 30px; position: relative;">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Portfolio</label>
                            <select class="form-select" name="portfolio_status">
                                @foreach(get_portfolio_status() as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Team</label>
                            <select class="form-select" name="team">
                                @foreach(get_team_status() as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Staff ID <span class="text-danger">*</span></label>
                            <input type="text" name="staff_id" class="form-control" placeholder="Staff ID" required>
                            @error('staff_id')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Full Name">
                        </div>
                    </div>

                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Designation</label>
                            <input type="text" name="designation" class="form-control" placeholder="Designation">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Supervisor Name</label>
                            <input type="text" name="supervisor_name" class="form-control" placeholder="Supervisor Name">
                        </div>
                    </div>

                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Supervisor ID</label>
                            <input type="text" name="supervisor_id" class="form-control" placeholder="Supervisor ID">
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" id="registerBtn" class="btn fw-bold text-white px-5 py-2 shadow" 
                            style="background: linear-gradient(45deg, #4facfe 0%, #00f2fe 100%); 
                                border: none; 
                                border-radius: 30px; 
                                transition: 0.3s ease-in-out;">
                            <i class="fas fa-save me-2"></i> Register Employee
                        </button>
                    </div>

                    </div>
                {{-- </form> --}}

                <br>

                <div class="text-center mb-4">
                    <h2 style="background: #70add3; display: inline-block; padding: 5px 20px; border-radius: 5px;" 
                        class="fw-bold text-white">
                        KPI Criteria Information
                    </h2>
                </div> 

                <!-- Quantitative and Qualitative Button -->
                <div class="d-flex flex-column align-items-center gap-2 mb-4">
                    <button type="button" id="quantitativeInput" class="btn btn-outline-primary btn-lg px-4 rounded-pill shadow-sm" 
                            onclick="setKpiType(0)" data-bs-toggle="modal" data-bs-target="#multiRowModal">
                        <i class="fas fa-plus-circle me-2"></i> Add Quantitative Criteria
                    </button>

                    <button type="button" id="qualitativeInput" class="btn btn-outline-success btn-lg px-4 rounded-pill shadow-sm" 
                            onclick="setKpiType(1)" data-bs-toggle="modal" data-bs-target="#multiRowModal">
                        <i class="fas fa-plus-circle me-2"></i> Add Qualitative Criteria
                    </button>
                </div>


                <div class="row">
                    <!-- Quantitative and Qualitative Section -->
                    <div class="col-md-6 border-end">
                        <h4 class="text-primary border-bottom pb-2">📊 Quantitative Criteria</h4>
                        <div id="quantitative-display">
                            <!-- Quantitative tables will appear here -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="text-success border-bottom pb-2">📋 Qualitative Criteria</h4>
                        <div id="qualitative-display">
                            <!-- Qualitative tables will appear here -->
                        </div>
                    </div>
                </div>
                <!-- Hidden Input for Database -->
                <input type="hidden" name="kpi_data" id="kpi_data">
                
            </div>
        </div>
    </div>

    </form>
    <!-- Modal -->
    <div class="modal fade" id="multiRowModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">

                <h5>Enter Label & Criteria</h5>
                {{-- criteria data insert --}}

                <input type="text" id="label_name" class="form-control mb-2" placeholder="Label Name">

                <div id="criteria-wrapper">
                    <div class="row mb-2 criteria-row">
                        <div class="col-6">
                            <input type="text" class="form-control criteria" placeholder="Criteria">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control weight" placeholder="Weight">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-danger remove-row">X</button>
                        </div>
                    </div>
                </div>

                <button id="add-more-row" class="btn btn-sm btn-outline-primary">+ Add More</button>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="save-kpi" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </div>

<script src="{{asset('backend/assets/vendors/js/vendors.min.js')}}"></script>

<script>

    // Add Row
    document.getElementById('add-more-row').onclick = function () {
        let row = `
        <div class="row mb-2 criteria-row">
            <div class="col-6">
                <input type="text" class="form-control criteria" placeholder="Criteria">
            </div>
            <div class="col-4">
                <input type="text" class="form-control weight" placeholder="Weight">
            </div>
            <div class="col-2">
                <button class="btn btn-danger remove-row">X</button>
            </div>
        </div>`;
        document.getElementById('criteria-wrapper').insertAdjacentHTML('beforeend', row);
    };

    // Remove Row
    document.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-row')){
            e.target.closest('.criteria-row').remove();
        }
    });

    let allKpiData = [];
    let currentType = 0;

    function setKpiType(type) {
        currentType = type;
    }

    document.getElementById('save-kpi').onclick = function () {
        let label = document.getElementById('label_name').value;
        let rows = document.querySelectorAll('.criteria-row');

        if(!label) { alert("Label is required"); return; }

        let html = `
            <div class="kpi-group mb-4 p-2 border rounded bg-white shadow-sm">
                <div class="text-center mb-2">
                    <h6 class="fw-bold text-uppercase border-bottom d-inline-block pb-1">${label}</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered align-middle">
                        <thead class="table-dark small">
                            <tr>
                                <th>Criteria</th>
                                <th style="width: 60px;">Weight</th>
                                <th style="width: 60px;">Target</th>
                                <th style="width: 60px;">Actual</th>
                                <th style="width: 60px;">Score</th>
                            </tr>
                        </thead>
                <tbody class="small">`;

        let rowAdded = false;
        rows.forEach((row) => {
            let criteria = row.querySelector('.criteria').value;
            let weight = row.querySelector('.weight').value;

            if(criteria && weight){
                rowAdded = true;
                allKpiData.push({
                    type: currentType,
                    label: label,
                    criteria: criteria,
                    weight: '',
                    target: 0,
                    actual: 0,
                    score: 0
                });

                html += `<tr><td>${criteria}</td><td class="text-center">${weight}</td><td class="text-center">0</td><td class="text-center">0</td><td class="text-center">0</td></tr>`;
            }
        });

        if(!rowAdded) { alert("Criteria and Weight are required"); return; }

        html += `</tbody></table></div></div>`;
        
        if(currentType === 0) {
            document.getElementById('quantitative-display').insertAdjacentHTML('beforeend', html);
        } else {
            document.getElementById('qualitative-display').insertAdjacentHTML('beforeend', html);
        }

        document.getElementById('kpi_data').value = JSON.stringify(allKpiData);
        bootstrap.Modal.getInstance(document.getElementById('multiRowModal')).hide();
        resetModal();
    };

    document.getElementById('registerBtn').addEventListener('click', function(event) {
        const hasQuantitative = allKpiData.some(item => item.type === 0);
        
        const hasQualitative = allKpiData.some(item => item.type === 1);

        if (hasQuantitative && hasQualitative) {
            console.log("data is found for both types.form will submit");
        } else {
            event.preventDefault(); 
            //alert("Please add at least one Quantitative and one Qualitative KPI criteria");
        }
    });

    function resetModal() {
        document.getElementById('label_name').value = '';
        document.getElementById('criteria-wrapper').innerHTML = `
            <div class="row mb-2 criteria-row">
                <div class="col-6">
                    <input type="text" class="form-control criteria" placeholder="Criteria">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control weight" placeholder="Weight">
                </div>
                <div class="col-2">
                    <button class="btn btn-danger remove-row">X</button>
                </div>
            </div>`;
    }

</script>

<script>
    document.getElementById('registerBtn').addEventListener('click', function(event) {
    const hasQuantitative = allKpiData.some(item => item.type === 0);
    const hasQualitative = allKpiData.some(item => item.type === 1);

    if (hasQuantitative && hasQualitative) {
        Swal.fire({
            title: "Success!",
            text: "Employee Registered with Quantitative & Qualitative Data.",
            //icon: "success",
            confirmButtonColor: "#198754"
            }).then((result) => {
                if (result.isConfirmed) {
                    // document.getElementById('employeeForm').submit(); 
                }
            });
        } else {
            event.preventDefault(); 
            Swal.fire({
                title: "KPI Information Empty!",
                text: "Please add at least one Quantitative and one Qualitative KPI criteria.",
                confirmButtonColor: "#D3B270"
            });
        }
    });

</script>

</body>
</html>