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
                class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-10 p-lg-20">
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-500px p-20">
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-8 pb-15 pb-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_new_password_form"
                            data-kt-redirect-url="{{ route('login') }}" method="POST"
                            action="{{ route('password.store') }}">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    Setup New Password
                                </h1>

                                <div class="text-gray-500 fw-semibold fs-6">
                                    Have you already reset the password ?

                                    <a href="{{ route('login') }}" class="link-primary fw-bold">
                                        Sign in
                                    </a>
                                </div>
                            </div>
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">

                            <input type="hidden" name="email" value="{{$request->email}}" />
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">

                                        <input class="form-control bg-transparent" type="password"
                                            placeholder="Password" name="password" autocomplete="off" />

                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-duotone ki-eye-slash fs-2"></i> <i
                                                class="ki-duotone ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>

                                    <div class="d-flex align-items-center mb-3"
                                        data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>

                                <div class="text-muted">
                                    Use 8 or more characters with a mix of letters, numbers & symbols.
                                </div>
                            </div>

                            <div class="fv-row mb-8">
                                <input type="password" placeholder="Repeat Password" name="password_confirmation"
                                    autocomplete="off" class="form-control bg-transparent" />
                            </div>

                            <div class="d-grid mb-10">
                                <button type="button" id="kt_new_password_submit" class="btn btn-primary">

                                    <span class="indicator-label">
                                        Submit</span>

                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
