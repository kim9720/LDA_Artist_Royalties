@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <!-- Header Card -->
            <div class="card card-flush pb-0 mb-10" >
                <div class="card-header pt-10">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-circle me-5">
                            <div class="symbol-label bg-white text-primary border border-secondary border-dashed">
                                <i class="fas fa-mobile-alt fs-2x text-primary"></i>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <h2 class="mb-1 text-gray-800">Withdraw Funds</h2>
                            <div class="text-muted fw-bold">
                                <a href="{{ route('dashboard') }}" class="text-hover-primary">Dashboard</a>
                                <span class="mx-3 text-gray-300">|</span>
                                <a href="{{ route('payment.index') }}" class="text-hover-primary">Withdraw Funds</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
                    <div class="d-flex overflow-auto h-55px">
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary active" href="#bank_tab" data-bs-toggle="tab">Bank Transfer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" href="#mobile_tab" data-bs-toggle="tab">Mobile Money</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary" href="#paypal_tab" data-bs-toggle="tab">PayPal</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Withdraw Content -->
            <div class="tab-content">
                <!-- Bank Transfer Tab -->
                <div class="tab-pane fade show active" id="bank_tab">
                    <div class="card card-flush shadow-sm">
                        <div class="card-body">
                            <form id="kt_bank_withdraw_form">
                                @csrf

                                <!-- Balance Summary -->
                                <div class="d-flex flex-column flex-center rounded bg-light-primary p-10 mb-10">
                                    <span class="fs-4 text-gray-600 fw-semibold">Available Balance</span>
                                    <span class="fs-2x fw-bolder text-primary mb-2">TZS5,430.00</span>
                                    <span class="text-muted">Minimum withdrawal: TZS10.00</span>
                                </div>

                                <!-- Amount Input -->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold text-gray-700 required">Amount</label>
                                    <div class="input-group input-group-lg input-group-solid">
                                        <span class="input-group-text">TZS</span>
                                        <input type="number" class="form-control" name="amount"
                                            placeholder="0.00" step="0.01" min="10" required>
                                    </div>
                                </div>

                                <!-- Bank Details -->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold text-gray-700 required">Bank Name</label>
                                    <input type="text" class="form-control form-control-lg" name="bank_name"
                                        placeholder="e.g. Equity Bank" required>
                                </div>

                                <div class="row mb-10">
                                    <div class="col-md-6">
                                        <label class="form-label fs-6 fw-bold text-gray-700 required">Account Number</label>
                                        <input type="text" class="form-control form-control-lg" name="account_number" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fs-6 fw-bold text-gray-700 required">Branch Code</label>
                                        <input type="text" class="form-control form-control-lg" name="branch_code" required>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-lg px-6">
                                        <span class="indicator-label">Request Withdrawal</span>
                                        <span class="indicator-progress">Processing...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Mobile Money Tab -->
                <div class="tab-pane fade" id="mobile_tab">
                    <div class="card card-flush shadow-sm">
                        <div class="card-body">
                            <form id="kt_mobile_withdraw_form">
                                @csrf

                                <!-- Balance Summary -->
                                <div class="d-flex flex-column flex-center rounded bg-light-info p-10 mb-10">
                                    <span class="fs-4 text-gray-600 fw-semibold">Available Balance</span>
                                    <span class="fs-2x fw-bolder text-info mb-2">TZS5,430.00</span>
                                    <span class="text-muted">Minimum withdrawal: TZS5.00</span>
                                </div>

                                <!-- Amount Input -->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold text-gray-700 required">Amount</label>
                                    <div class="input-group input-group-lg input-group-solid">
                                        <span class="input-group-text">TZS</span>
                                        <input type="number" class="form-control" name="amount"
                                            placeholder="0.00" step="0.01" min="5" required>
                                    </div>
                                </div>

                                <!-- Mobile Money Provider -->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold text-gray-700 required">Mobile Network</label>
                                    <select class="form-select form-select-lg" name="mobile_provider" required>
                                        <option value="">Select network</option>
                                        <option value="mpesa">M-Pesa</option>
                                        <option value="yas">Mix by Yass</option>
                                        <option value="airtel">Airtel Money</option>
                                        <option value="halotel">Halo Pesa</option>
                                    </select>
                                </div>

                                <!-- Phone Number -->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold text-gray-700 required">Phone Number</label>
                                    <div class="input-group input-group-lg input-group-solid">
                                        <span class="input-group-text">+255</span>
                                        <input type="tel" class="form-control" name="phone_number"
                                            placeholder="712 345 678" required>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info btn-lg px-6">
                                        <span class="indicator-label">Withdraw to Mobile</span>
                                        <span class="indicator-progress">Processing...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PayPal Tab -->
                <div class="tab-pane fade" id="paypal_tab">
                    <div class="card card-flush shadow-sm">
                        <div class="card-body">
                            <form id="kt_paypal_withdraw_form">
                                @csrf

                                <!-- Balance Summary -->
                                <div class="d-flex flex-column flex-center rounded bg-light-warning p-10 mb-10">
                                    <span class="fs-4 text-gray-600 fw-semibold">Available Balance</span>
                                    <span class="fs-2x fw-bolder text-warning mb-2">TZS5,430.00</span>
                                    <span class="text-muted">Minimum withdrawal: TZS20.00</span>
                                </div>

                                <!-- Amount Input -->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold text-gray-700 required">Amount</label>
                                    <div class="input-group input-group-lg input-group-solid">
                                        <span class="input-group-text">TZS</span>
                                        <input type="number" class="form-control" name="amount"
                                            placeholder="0.00" step="0.01" min="20" required>
                                    </div>
                                </div>

                                <!-- PayPal Email -->
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold text-gray-700 required">PayPal Email</label>
                                    <input type="email" class="form-control form-control-lg" name="paypal_email"
                                        placeholder="your@email.com" required>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-warning btn-lg px-6">
                                        <span class="indicator-label">Withdraw to PayPal</span>
                                        <span class="indicator-progress">Processing...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Withdrawals -->
            <div class="card card-flush mt-6">
                <div class="card-header border-0 pt-6">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Recent Withdrawals</span>
                        <span class="text-muted fw-bold fs-7">Your last 5 transactions</span>
                    </h3>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">Date</th>
                                    <th class="min-w-100px">Amount</th>
                                    <th class="min-w-100px">Method</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-100px">Reference</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-700">
                                <tr>
                                    <td>May 15, 2023</td>
                                    <td>TZS500.00</td>
                                    <td><span class="badge badge-light-primary">Bank Transfer</span></td>
                                    <td><span class="badge badge-light-success">Completed</span></td>
                                    <td>WTX-78945612</td>
                                </tr>
                                <tr>
                                    <td>May 12, 2023</td>
                                    <td>TZS120.00</td>
                                    <td><span class="badge badge-light-info">M-Pesa</span></td>
                                    <td><span class="badge badge-light-success">Completed</span></td>
                                    <td>WTX-32165498</td>
                                </tr>
                                <tr>
                                    <td>May 10, 2023</td>
                                    <td>TZS75.50</td>
                                    <td><span class="badge badge-light-info">Airtel Money</span></td>
                                    <td><span class="badge badge-light-success">Completed</span></td>
                                    <td>WTX-98712365</td>
                                </tr>
                                <tr>
                                    <td>May 5, 2023</td>
                                    <td>TZS1,200.00</td>
                                    <td><span class="badge badge-light-primary">Bank Transfer</span></td>
                                    <td><span class="badge badge-light-warning">Processing</span></td>
                                    <td>WTX-45678932</td>
                                </tr>
                                <tr>
                                    <td>May 1, 2023</td>
                                    <td>TZS250.00</td>
                                    <td><span class="badge badge-light-warning">PayPal</span></td>
                                    <td><span class="badge badge-light-success">Completed</span></td>
                                    <td>WTX-65498732</td>
                                </tr>
                                <tr>
                                    <td>May 1, 2023</td>
                                    <td>TZS250.00</td>
                                    <td><span class="badge badge-light-warning">PayPal</span></td>
                                    <td><span class="badge badge-light-danger">Failed</span></td>
                                    <td>WTX-65498732</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tab functionality
        const tabElms = document.querySelectorAll('a[data-bs-toggle="tab"]');
        tabElms.forEach(tabElm => {
            tabElm.addEventListener('shown.bs.tab', function (event) {
                // You can add specific tab change logic here if needed
            });
        });

        // Form submission handling for all forms
        const forms = [
            document.getElementById('kt_bank_withdraw_form'),
            document.getElementById('kt_mobile_withdraw_form'),
            document.getElementById('kt_paypal_withdraw_form')
        ];

        forms.forEach(form => {
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const submitButton = form.querySelector('[type="submit"]');

                    // Show loading state
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;

                    // Simulate form submission (replace with actual AJAX call)
                    setTimeout(function() {
                        // Hide loading state
                        submitButton.removeAttribute('data-kt-indicator');
                        submitButton.disabled = false;

                        // Show success message
                        Swal.fire({
                            text: "Withdrawal request submitted successfully!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        // Reset form
                        form.reset();
                    }, 2000);
                });
            }
        });
    });
</script>
@endpush
