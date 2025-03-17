<x-guest-layout>
<div class="d-flex flex-column flex-column-fluid flex-lg-row">
    <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
        <div class="d-flex flex-center flex-lg-start flex-column">
            <a href="{{ url('http://licksdata.com/') }}" class="mb-7">
                <img alt="Logo" src="{{ asset('assets/media/auth/logo.png') }}" width="200px" height="100px" />
            </a>
            <h2 class="text-white fw-normal m-0">
                Branding tools designed for your business
            </h2>
        </div>
    </div>

    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-800px p-10">
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                <form method="POST" action="{{ route('register') }}" class="form w-100" novalidate>
                    @csrf
                    <div class="text-center mb-11">
                        <h1 class="text-gray-900 fw-bolder mb-3">Sign Up</h1>
                    </div>

                    <div class="separator separator-content my-10">
                        <span class="w-125px text-gray-500 fw-semibold fs-7">Personal Details</span>
                    </div>
                    <div class="row mb-8">
                        <div class="col-md-4"><input type="text" name="fname" class="form-control bg-transparent" placeholder="First Name" required></div>
                        <div class="col-md-4"><input type="text" name="mname" class="form-control bg-transparent" placeholder="Middle Name"></div>
                        <div class="col-md-4"><input type="text" name="lname" class="form-control bg-transparent" placeholder="Last Name" required></div>
                    </div>
                    <div class="fv-row mb-8"><input type="text" name="artistName" class="form-control bg-transparent" placeholder="Artist Name (e.g., Bonge Nyau)"></div>
                    <div class="row mb-8">
                        <div class="col-md-6"><input type="text" name="phone" class="form-control bg-transparent" placeholder="Phone Number" required></div>
                        <div class="col-md-6"><input type="email" name="email" class="form-control bg-transparent" placeholder="Email" required></div>
                    </div>
                    <div class="separator separator-content my-10">
                        <span class="w-100px text-gray-500 fw-semibold fs-7">Bank Details</span>
                    </div>
                    <div class="row mb-8">
                        <div class="col-md-6"><input type="text" name="bank_name" class="form-control bg-transparent" placeholder="Bank Name (e.g., CRDB)"></div>
                        <div class="col-md-6"><input type="text" name="account_number" class="form-control bg-transparent" placeholder="Bank Account Number"></div>
                    </div>
                    <div class="separator separator-content my-14"></div>
                    <div class="fv-row mb-8"><input type="password" name="password" class="form-control bg-transparent" placeholder="Password" required></div>
                    <div class="fv-row mb-8"><input type="password" name="password_confirmation" class="form-control bg-transparent" placeholder="Repeat Password" required></div>
                    <div class="fv-row mb-8">
                        <label class="form-check form-check-inline">
                            <input type="checkbox" name="toc" class="form-check-input" value="1" required>
                            <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the <a href="#" class="ms-1 link-primary">Terms</a></span>
                        </label>
                    </div>
                    <div class="d-grid mb-10"><button type="submit" class="btn btn-primary">Sign up</button></div>
                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Already have an Account? <a href="{{ route('login') }}" class="link-primary fw-semibold">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>
