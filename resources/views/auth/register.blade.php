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

        <div
            class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-800px p-10">
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                    <form method="POST" action="{{ route('register.store') }}" class="form w-100"
                        novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="{{ route('login') }}">
                        @csrf
                        <div class="text-center mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3">Sign Up</h1>
                        </div>

                        <div class="separator separator-content my-10">
                            <span class="w-125px text-gray-500 fw-semibold fs-7">Personal Details</span>
                        </div>

                        <div class="row mb-8">
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control bg-transparent"
                                    placeholder="First Name" autocomplete="off">
                                {{-- <div class="text-danger error-message" data-error-for="name"></div> --}}
                                <x-input-error :messages="$errors->get('name')" class="text-danger error-message"/>

                            </div>
                            <div class="col-md-4">
                                <input type="text" name="mname" class="form-control bg-transparent"
                                    placeholder="Middle Name" autocomplete="off">
                                    <x-input-error :messages="$errors->get('mname')" class="text-danger error-message" data-error-for="mname"/>
                                    </div>
                            <div class="col-md-4">
                                <input type="text" name="lname" class="form-control bg-transparent"
                                    placeholder="Last Name" autocomplete="off">
                                    <x-input-error :messages="$errors->get('lname')" class="text-danger error-message" data-error-for="lname"/>
                                    </div>
                        </div>

                        <div class="fv-row mb-8">
                            <input type="text" name="artistName" class="form-control bg-transparent"
                                placeholder="Artist Name (e.g., Bonge la Nyau)" autocomplete="off">
                                <x-input-error :messages="$errors->get('artistName')" class="text-danger error-message" data-error-for="artistName"/>
                                </div>

                        <div class="row mb-8">
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control bg-transparent"
                                    placeholder="Phone Number" autocomplete="off">
                                <div class="text-danger error-message" data-error-for="phone"></div>
                                <x-input-error :messages="$errors->get('phone')" class="text-danger error-message" data-error-for="phone"/>

                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control bg-transparent"
                                    placeholder="Email" autocomplete="off">
                                    <x-input-error :messages="$errors->get('email')" class="text-danger error-message" data-error-for="email"/>
                                    </div>
                        </div>

                        <div class="separator separator-content my-10">
                            <span class="w-100px text-gray-500 fw-semibold fs-7">Bank Details</span>
                        </div>

                        <div class="row mb-8">
                            <div class="col-md-6">
                                <input type="text" name="bank_name" class="form-control bg-transparent"
                                    placeholder="Bank Name (e.g., CRDB)" autocomplete="off">
                                    <x-input-error :messages="$errors->get('bank_name')" class="text-danger error-message"/>
                                    </div>
                            <div class="col-md-6">
                                <input type="text" name="account_number" class="form-control bg-transparent"
                                    placeholder="Bank Account Number" autocomplete="off">
                                    <x-input-error :messages="$errors->get('account_number')" class="text-danger error-message" data-error-for="account_number"/>
                                    </div>
                        </div>

                        <div class="separator separator-content my-14"></div>

                        <div class="fv-row mb-8" data-kt-password-meter="true">
                            <div class="mb-1">
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="Password"
                                        name="password" autocomplete="off">
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="ki-duotone ki-eye-slash fs-2"></i>
                                        <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center mb-3"
                                    data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &
                                    symbols.</div>
                                <div class="text-danger error-message" data-error-for="password"></div>
                            </div>
                        </div>

                        <div class="fv-row mb-8">
                            <input type="password" name="password_confirmation" class="form-control bg-transparent"
                                placeholder="Repeat Password" autocomplete="off">
                            <div class="text-danger error-message" data-error-for="password_confirmation"></div>
                        </div>

                        <div class="fv-row mb-8">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                <span class="form-check-label fw-semibold text-gray-700 fs-6">I Agree to the
                                    <a href="#" class="ms-1 link-primary">terms and conditions</a>.
                                </span>
                            </label>
                            <!-- Add this for the TOC field if missing -->
                            <x-input-error :messages="$errors->get('toc')" class="text-danger error-message" data-error-for="toc"/>
                            </div>

                        <div class="d-grid mb-10">
                            <button id="kt_sign_up_submit" type="submit" class="btn btn-primary">
                                <span class="indicator-label">Sign up</span>
                                <span class="indicator-progress">Please wait...<span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            Already have an Account? <a href="{{ route('login') }}"
                                class="link-primary fw-semibold">Sign in</a>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
