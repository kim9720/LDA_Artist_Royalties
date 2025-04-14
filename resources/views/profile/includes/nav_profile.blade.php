<style>
    .letter-avatar {
        width: 150px;
        height: 150px;
        border-radius: 5%;
        background-color: #1e3a8a;
        /* Dark blue */
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 80px;
        text-transform: uppercase;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }
</style>
<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    @if ($profile->profile_picture)
                        <img src="{{ asset('storage/profile_pictures/' . $profile->profile_picture) }}" alt="image"
                            class="" width="40" height="40" />
                    @else
                        <div class="letter-avatar">
                            {{ strtoupper(substr($profile->name, 0, 1)) }}
                        </div>
                    @endif
                    <div
                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                    </div>
                </div>
            </div>

            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <a href="#"
                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $profile->name. ' ' . $profile->lname }}</a>

                        </div>

                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                            <a href="#"
                                class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                <i class="fa fa-user-circle"> <span class="path1"> </span><span
                                        class="path2"></span><span class="path3"> </span></i> Artist
                            </a>

                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                <i class="fa fa-envelope fs-4"> <span class="path1"> </span><span class="path2">
                                    </span></i>
                                {{ $profile->email }}
                            </a>
                        </div>
                    </div>


                </div>

                <div class="d-flex flex-wrap flex-stack">
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <div class="d-flex flex-wrap">
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="4500"
                                        data-kt-countup-prefix="$">
                                        0</div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Earnings</div>
                            </div>

                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="80">0</div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Projects</div>
                            </div>

                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60"
                                        data-kt-countup-prefix="%">0
                                    </div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Success Rate</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                            <span class="fw-semibold fs-6 text-gray-500">Profile
                                Compleation</span>
                            <span class="fw-bold fs-6">50%</span>
                        </div>

                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                            <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('profile.profile_show') ? 'active' : '' }}"
                    href="{{ route('profile.profile_show') }}">
                    Overview
                </a>
            </li>
            @if(Auth::user()->role_id == 1)
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('admin.user_song_page') ? 'active' : '' }}"
                   href="{{ route('admin.user_song_page', $profile->id) }}">
                    Songs
                </a>
            </li>
            @endif
            @if(Auth::user()->role_id == 2)
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('profile.profile_settings') ? 'active' : '' }}"
                   href="{{ route('profile.profile_settings') }}">
                    Settings
                </a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('profile.profile_bill') ? 'active' : '' }}"
                   href="{{ route('profile.profile_bill') }}">
                    Billing
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
