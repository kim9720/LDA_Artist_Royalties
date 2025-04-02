<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <a href="{{ url('http://licksdata.com/') }}" class="mb-7">
                        <img alt="Logo" src="{{ asset('assets/media/auth/logo.png') }}" width="200px"
                            height="100px" />
                    </a>
                    <h2 class="text-white fw-normal m-0">
                        Branding tools designed for your business
                    </h2>
                </div>
            </div>
            <div
                class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form"
                            data-kt-redirect-url="{{route('login')}}"
                            method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    Forgot Password ?
                                </h1>

                                <div class="text-gray-500 fw-semibold fs-6">
                                    Enter your email to reset your password.
                                </div>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Email" name="email" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                                    <span class="indicator-label">
                                        Submit</span>

                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>

                                <a href="{{ route('login') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
