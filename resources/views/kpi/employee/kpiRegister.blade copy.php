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
                        <label class="form-label fw-bold">Staff ID</label>
                        <input type="text" name="staff_id" class="form-control" placeholder="Staff ID">
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
                    <button type="submit" id="registerBtn" class="btn btn-success py-2 px-4 fw-bold shadow-sm text-white" 
                        style="display: inline-block; width: auto;  border: none;">
                    Register Employee
                </button>

                </div>
            {{-- </form> --}}

            <br>

            <div class="text-center mb-4">
                <h2 style="background: #D3B270; display: inline-block; padding: 5px 20px; border-radius: 5px;" 
                    class="fw-bold text-white">
                    KPI Criteria Information
                </h2>
            </div> 

            <!-- Quantitative and Qualitative Button -->
            <div class="d-flex flex-column align-items-center gap-2 mb-4">
                <button type="button" id="quantitativeInput" class="btn btn-outline-primary btn-lg px-4 rounded-pill shadow-sm" 
                        onclick="setKpiType('quantitative')" data-bs-toggle="modal" data-bs-target="#multiRowModal">
                    <i class="fas fa-plus-circle me-2"></i> Add Quantitative Criteria
                </button>

                <button type="button" id="qualitativeInput" class="btn btn-outline-success btn-lg px-4 rounded-pill shadow-sm" 
                        onclick="setKpiType('qualitative')" data-bs-toggle="modal" data-bs-target="#multiRowModal">
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

// popup modal data save
// Save KPI
// document.getElementById('save-kpi').onclick = function (e) {
//     e.preventDefault(); 

//     let labelInput = document.getElementById('label_name');
//     let label = labelInput.value.trim();
//     let rows = document.querySelectorAll('.criteria-row');
//     let data = [];

//     rows.forEach(row => {
//         let criteriaInput = row.querySelector('.criteria');
//         let weightInput = row.querySelector('.weight');

//         if (criteriaInput && weightInput) {
//             let criteria = criteriaInput.value.trim();
//             let weight = weightInput.value.trim();

//             if (criteria !== "" && weight !== "") {
//                 data.push({
//                     criteria: criteria,
//                     weight: parseFloat(weight),
//                     target: 0,
//                     actual: 0,
//                     score: 0
//                 });
//             }
//         }
//     });

//     if (!label || data.length === 0) {
//         alert("Please enter a label and at least one criteria with weight.");
//         return;
//     }

//     const saveBtn = e.target;
//     saveBtn.disabled = true;
//     saveBtn.innerText = "Saving...";

//     fetch("{{ route('criteria.store') }}", {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//             "Accept": "application/json",
//             "X-CSRF-TOKEN": "{{ csrf_token() }}" 
//         },
//         body: JSON.stringify({
//             label: label,
//             items: data
//         })
//     })
//     .then(async response => {
//         const isJson = response.headers.get('content-type')?.includes('application/json');
//         const res = isJson ? await response.json() : null;

//         if (!response.ok) {
//             if (response.status === 422) {
//                 throw new Error("Validation failed. Check your inputs.");
//             }
//             throw new Error(res?.message || 'Server error: ' + response.status);
//         }

//         if (!res) throw new Error("Empty or invalid response from server.");
//         return res;
//     })
//     .then(res => {
//         if (res.success) {
//             // টেবিল রেন্ডার করা (আগের ডাটা মুছবে না)
//             renderKpiTable(label, data);
            
//             // মোডাল ক্লোজ করা
//             let modalEl = document.getElementById('multiRowModal');
//             let modal = bootstrap.Modal.getInstance(modalEl);
//             if (modal) modal.hide();

//             // ইনপুট ক্লিয়ার করা
//             labelInput.value = '';
//             rows.forEach(row => {
//                 row.querySelector('.criteria').value = '';
//                 row.querySelector('.weight').value = '';
//             });

//             alert("Data saved successfully!");
//         } else {
//             alert("Error: " + (res.message || "Failed to save data"));
//         }
//     })
//     .catch(error => {
//         console.error('Fetch Error:', error);
//         alert(error.message); 
//     })
//     .finally(() => {
//         saveBtn.disabled = false;
//         saveBtn.innerText = "Save";
//     });
// };

// function renderKpiTable(label, items) {
//     // একটি নতুন সেকশন হিসেবে ডাটা যোগ করার জন্য wrap করা হলো
//     let html = `
//         <div class="kpi-group mb-5">
//             <div class="text-center mb-3">
//                 <h5 class="fw-bold text-uppercase border-bottom d-inline-block pb-1">${label}</h5>
//             </div>
//             <div class="table-responsive">
//                 <table class="table table-hover table-bordered align-middle shadow-sm">
//                     <thead class="table-dark text-center">
//                         <tr>
//                             <th class="text-start ps-3">Criteria</th>
//                             <th style="width: 15%">Weight</th>
//                             <th style="width: 15%">Target</th>
//                             <th style="width: 15%">Actual</th>
//                             <th style="width: 15%">Score</th>
//                         </tr>
//                     </thead>
//                     <tbody>`;

//     items.forEach(item => {
//         html += `
//             <tr>
//                 <td class="ps-3">${item.criteria}</td>
//                 <td class="text-center fw-bold">${item.weight}</td>
//                 <td class="text-center">0</td>
//                 <td class="text-center">0</td>
//                 <td class="text-center">0</td>
//             </tr>`;
//     });

//     html += `</tbody></table></div></div>`;

//     // .innerHTML = html এর পরিবর্তে insertAdjacentHTML ব্যবহার করলে আগের ডাটা মুছবে না
//     document.getElementById('kpi-display').insertAdjacentHTML('beforeend', html);
// }


let allKpiData = [];
let currentType = 'quantitative';

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
    
    if(currentType === 'quantitative') {
        document.getElementById('quantitative-display').insertAdjacentHTML('beforeend', html);
    } else {
        document.getElementById('qualitative-display').insertAdjacentHTML('beforeend', html);
    }

    document.getElementById('kpi_data').value = JSON.stringify(allKpiData);
    bootstrap.Modal.getInstance(document.getElementById('multiRowModal')).hide();
    resetModal();
};

document.getElementById('registerBtn').addEventListener('click', function(event) {
    const hasQuantitative = allKpiData.some(item => item.type === 'quantitative');
    
    const hasQualitative = allKpiData.some(item => item.type === 'qualitative');

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
 
// document.getElementById('registerBtn').addEventListener('click', function(event) {
//     // চেক করা হচ্ছে উভয় টাইপের ডেটা আছে কি না
//     const hasQuantitative = allKpiData.some(item => item.type === 'quantitative');
//     const hasQualitative = allKpiData.some(item => item.type === 'qualitative');

//     if (hasQuantitative && hasQualitative) {
//         // সফলতার মেসেজ
//         alert("সফল! Qualitative এবং Quantitative উভয় ডেটা পাওয়া গেছে। এখন ফর্মটি সাবমিট হচ্ছে।");
        
//         // ফর্ম সাবমিট করার আসল কমান্ড (আপনার ফর্ম আইডি অনুযায়ী নিচের লাইনটি আনকমেন্ট করুন)
//         // document.getElementById('yourFormId').submit(); 
//     } else {
//         // ডেটা না থাকলে এরর মেসেজ
//         event.preventDefault(); 
//         alert("ভুল! আপনাকে অবশ্যই কমপক্ষে একটি Quantitative এবং একটি Qualitative ক্রাইটেরিয়া যোগ করতে হবে।");
//     }
// });
  
//    let isDataAdded = false;

//     function markDataAdded() {
//         isDataAdded = true;
//     }

</script>

<script>
    document.getElementById('registerBtn').addEventListener('click', function(event) {
    const hasQuantitative = allKpiData.some(item => item.type === 'quantitative');
    const hasQualitative = allKpiData.some(item => item.type === 'qualitative');

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
            text: "Please add at least one Quantitative and one Qualitative KPI criteria",
            confirmButtonColor: "#d33"
        });
    }
});

</script>
</body>
</html>