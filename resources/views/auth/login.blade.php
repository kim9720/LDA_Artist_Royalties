<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="d-flex flex-column flex-root">
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
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-10 p-lg-20">
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-500px p-20">
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-8 pb-15 pb-lg-20">

                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    Sign In
                                </h1>
                            </div>
                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" required />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <a href="{{ route('password.request') }}" class="link-primary">
                                    Forgot Password ?
                                </a>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <span class="indicator-label">
                                        Sign In
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>

                            <div class="text-gray-500 text-center fw-semibold fs-6">
                                Not a Member yet?
                                <a href="{{ route('register') }}" class="link-primary">
                                    Sign up
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
