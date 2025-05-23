@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            @if (Auth::user()->role_id == 2)
                <div class="row gx-5 gx-xl-10">
                    <!-- Total Streams Card -->
                    <div class="col-xxl-4 mb-5 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header py-7">
                                <div class="m-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <span
                                            class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $userAudioCount }}</span>

                                        <span class="badge badge-light-success fs-base">
                                            {{ $percentage }} %
                                        </span>
                                    </div>

                                    <span class="fs-6 fw-semibold text-gray-500">Media Listenigs</span>
                                </div>

                                <div class="card-toolbar">
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <i class="fa fa-ellipsis-h fs-1 text-gray-500 me-n1"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span></i>
                                    </button>


                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                Quick Actions</div>
                                        </div>

                                        <div class="separator mb-3 opacity-75"></div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Ticket
                                            </a>
                                        </div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Customer
                                            </a>
                                        </div>
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                            data-kt-menu-placement="right-start">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">New Group</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Admin Group
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Staff Group
                                                    </a>
                                                </div>

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Member Group
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                New Contact
                                            </a>
                                        </div>

                                        <div class="separator mt-3 opacity-75"></div>

                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary  btn-sm px-4" href="#">
                                                    Generate Reports
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- chart one  --}}
                            <div class="card-body pt-0 pb-1">
                                <div id="kt_charts_widget_27" class="min-h-auto"></div>
                            </div>
                        </div>


                    </div>

                    <!-- Platform Distribution Card -->
                    <div class="col-xxl-4 mb-5 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header py-7">
                                <div class="m-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">8</span>
                                        <span class="badge badge-light-success fs-base">
                                            <i class="fas fa-arrow-up fs-5 text-success ms-n1"></i>
                                            2 new
                                        </span>
                                    </div>
                                    <span class="fs-6 fw-semibold text-gray-500">Platforms Tracking Your Music</span>
                                </div>
                                <div class="card-toolbar">
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <i class="fa fa-ellipsis-h fs-1 text-gray-500 me-n1"></i>
                                    </button>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                Platform Actions</div>
                                        </div>
                                        <div class="separator mb-3 opacity-75"></div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Add New Platform
                                            </a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Manage Platforms
                                            </a>
                                        </div>
                                        <div class="separator mt-3 opacity-75"></div>
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#">
                                                    Platform Analytics
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Platform Distribution Chart -->
                            <div class="card-body d-flex align-items-end ps-4 pe-0 pb-4">
                                <div id="kt_charts_platform_distribution" class="h-300px w-100 min-h-auto"
                                    style="height: 200px;">
                                    <!-- Placeholder for chart -->
                                    <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                        Platform distribution chart
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Performing Tracks Card -->
                    <div class="col-xxl-4 mb-5 mb-xl-10">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header py-7">
                                <div class="m-0">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">24</span>
                                        <span class="badge badge-light-success fs-base">
                                            <i class="fas fa-arrow-up fs-5 text-success ms-n1"></i>
                                            3 new
                                        </span>
                                    </div>
                                    <span class="fs-6 fw-semibold text-gray-500">Tracks Being Tracked</span>
                                </div>
                                <div class="card-toolbar">
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true">
                                        <i class="fa fa-ellipsis-h fs-1 text-gray-500 me-n1"></i>
                                    </button>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                Track Actions</div>
                                        </div>
                                        <div class="separator mb-3 opacity-75"></div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Add New Track
                                            </a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Manage Tracks
                                            </a>
                                        </div>
                                        <div class="separator mt-3 opacity-75"></div>
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#">
                                                    Track Analytics
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Top Tracks List -->
                            <!-- Top Tracks List -->
                            <div class="card-body d-flex flex-column pt-3" style="max-height: 300px; overflow-y: auto;">
                                <!-- Track 1 -->
                                <div class="d-flex flex-stack">
                                    <img src="https://via.placeholder.com/40" class="me-4 w-30px"
                                        style="border-radius: 4px" alt="Track cover" />
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <div class="me-5">
                                            <a href="#"
                                                class="text-gray-800 fw-bold text-hover-primary fs-6">Midnight Dreams</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">The Sound
                                                Waves</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">48,752</span>
                                            <span class="badge badge-light-success fs-base">
                                                <i class="fas fa-arrow-up fs-5 text-success ms-n1"></i>
                                                15.2%
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-3"></div>

                                <!-- Track 2 -->
                                <div class="d-flex flex-stack">
                                    <img src="https://via.placeholder.com/40" class="me-4 w-30px"
                                        style="border-radius: 4px" alt="Track cover" />
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <div class="me-5">
                                            <a href="#"
                                                class="text-gray-800 fw-bold text-hover-primary fs-6">Electric Feel</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Neon
                                                Lights</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">32,419</span>
                                            <span class="badge badge-light-success fs-base">
                                                <i class="fas fa-arrow-up fs-5 text-success ms-n1"></i>
                                                8.7%
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-3"></div>

                                <!-- Track 3 -->
                                <div class="d-flex flex-stack">
                                    <img src="https://via.placeholder.com/40" class="me-4 w-30px"
                                        style="border-radius: 4px" alt="Track cover" />
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <div class="me-5">
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Summer
                                                Breeze</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">Coastal
                                                Vibes</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">28,156</span>
                                            <span class="badge badge-light-danger fs-base">
                                                <i class="fas fa-arrow-down fs-5 text-danger ms-n1"></i>
                                                2.1%
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-3"></div>

                                <!-- Track 4 -->
                                <div class="d-flex flex-stack">
                                    <img src="https://via.placeholder.com/40" class="me-4 w-30px"
                                        style="border-radius: 4px" alt="Track cover" />
                                    <div
                                        class="d-flex align-items-center flex-stack flex-wrap flex-row-fluid d-grid gap-2">
                                        <div class="me-5">
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Urban
                                                Nights</a>
                                            <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">City
                                                Beats</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">18,943</span>
                                            <span class="badge badge-light-success fs-base">
                                                <i class="fas fa-arrow-up fs-5 text-success ms-n1"></i>
                                                22.5%
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="#" class="btn btn-sm btn-light-primary">
                                        View All Tracks
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id == 1)
                <div class="row gx-5 gx-xl-10 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10"
                            style="background-color: #080655">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">100</span>

                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Uploaded Songs</span>
                                </div>
                            </div>

                            <div class="card-body d-flex align-items-end pt-0">
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div
                                        class="d-flex justify-content-between fw-bold fs-6 text-white opacity-50 w-100 mt-auto mb-2">
                                        <span>{{ $notAprovedSong }} Pending for Approval</span>
                                        <span>{{ $percentage_not_approved_song }}%</span>
                                    </div>

                                    <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                        <div class="bg-danger rounded h-8px" role="progressbar"
                                            style="width: {{ $percentage_not_approved_song }}%;" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <span
                                        class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">{{ $total_artist->count() }}</span>
                                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Artists</span>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column justify-content-end pe-0">
                                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Active Artists</span>

                                <div class="symbol-group symbol-hover flex-nowrap">
                                    @foreach ($total_artist->take(6) as $artist)
                                        <a href="{{ route('admin.user_profile_show', $artist->id) }}">
                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                title="{{ $artist->artist_name }}">
                                                @if ($artist->profile_picture)
                                                    <img alt="{{ $artist->artist_name }}"
                                                        src="{{ asset('storage/profile_pictures/' . $artist->profile_picture) }}" />
                                                @else
                                                    <span
                                                        class="symbol-label bg-{{ collect(['primary', 'warning', 'danger', 'success', 'info'])->random() }}
                                                  text-inverse-{{ collect(['primary', 'warning', 'danger', 'success', 'info'])->random() }} fw-bold">
                                                        {{ substr($artist->artist_name, 0, 1) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </a>
                                    @endforeach

                                    @if ($total_artist->count() > 6)
                                        <a href="{{ route('admin.show_users') }}"
                                            class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">
                                                +{{ $total_artist->count() - 6 }}
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">TZS</span>

                                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">69,700</span>

                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                                    class="path1"></span><span class="path2"></span></i>
                                            2.2%
                                        </span>
                                    </div>

                                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Artists Earnings in
                                        April</span>
                                </div>
                            </div>

                            <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                                <div class="d-flex flex-center me-5 pt-2">
                                    <div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px"
                                        data-kt-size="70" data-kt-line="11">
                                    </div>
                                </div>

                                <div class="d-flex flex-column content-justify-center flex-row-fluid">
                                    <div class="d-flex fw-semibold align-items-center">
                                        <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>

                                        <div class="text-gray-500 flex-grow-1 me-4">Radio</div>

                                        <div class="fw-bolder text-gray-700 text-xxl-end">Tzs 7,660</div>
                                    </div>

                                    <div class="d-flex fw-semibold align-items-center my-3">
                                        <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>

                                        <div class="text-gray-500 flex-grow-1 me-4">TV</div>

                                        <div class="fw-bolder text-gray-700 text-xxl-end">Tzs 2,820</div>
                                    </div>

                                    <div class="d-flex fw-semibold align-items-center">
                                        <div class="bullet w-8px h-3px rounded-2 me-3" style="background-color: #E4E6EF">
                                        </div>

                                        <div class="text-gray-500 flex-grow-1 me-4">Others</div>

                                        <div class=" fw-bolder text-gray-700 text-xxl-end">Tzs 45,257</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush h-lg-50">
                            <div class="card-header pt-5">
                                <h3 class="card-title text-gray-800">Last five Complaints</h3>
                                <div class="card-toolbar d-none">
                                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                        class="btn btn-sm btn-light d-flex align-items-center px-4">
                                        <div class="text-gray-600 fw-bold">
                                            Loading date range...
                                        </div>
                                        <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                            <span class="path4"></span><span class="path5"></span><span class="path6"></span>
                                        </i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-5" style="overflow-y: auto; max-height: 170px;">
                                @if($complaints->count() > 0)
                                    @foreach($complaints->take(5) as $complaint)
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">
                                                {{ $complaint->user->name ?? 'Anonymous' }} - {{ $complaint->subject }}
                                            </div>
                                            <div class="badge badge-light-{{ $complaint->resolved ? 'success' : 'warning' }}">
                                                {{ $complaint->resolved ? 'Resolved' : 'Pending' }}
                                            </div>
                                        </div>

                                        <div class="text-gray-600 fs-6 mb-3">
                                            {{ Str::limit($complaint->message, 100) }}
                                        </div>

                                        <div class="d-flex justify-content-between text-gray-500 fs-7 mb-4">
                                            <span>{{ $complaint->created_at->format('M d, Y h:i A') }}</span>
                                            <a href="{{route('complaints.get',$complaint->id)}}" class="text-primary">View Details</a>
                                        </div>

                                        @if(!$loop->last)
                                            <div class="separator separator-dashed my-3"></div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="text-gray-600 fs-6 text-center py-5">
                                        No complaints found
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-10 mb-xl-0">
                        <div class="card h-md-100">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">User Activities</span>
                                    <span class="text-muted mt-1 fw-semibold fs-7">Track all user actions, especially Songs
                                        uploads</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">Export Report</a>
                                </div>
                            </div>

                            <div class="card-body pt-7 px-0" style="height: 500px; overflow-y: auto;">
                                <div class="mb-8" style="overflow-x: auto; white-space: nowrap;">
                                    <ul class="nav nav-pills nav-pills-custom nav-pills-active-custom d-inline-flex px-5"
                                        style="display: inline-block; white-space: nowrap;" id="daysTab"
                                        role="tablist">
                                        @foreach ($days as $day)
                                            <li class="nav-item p-0 ms-0 d-inline-block" role="presentation">
                                                <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 {{ $day['is_active'] ? 'btn-active-danger active' : '' }}"
                                                    id="tab-{{ $day['date']->format('Y_m_d') }}" data-bs-toggle="pill"
                                                    href="#day_{{ $day['date']->format('Y_m_d') }}" role="tab"
                                                    aria-controls="day_{{ $day['date']->format('Y_m_d') }}"
                                                    aria-selected="{{ $day['is_active'] ? 'true' : 'false' }}">
                                                    <span class="fs-7 fw-semibold">{{ $day['date']->format('D') }}</span>
                                                    <span class="fs-6 fw-bold">{{ $day['date']->format('d') }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="tab-content mb-2 px-9">
                                    @foreach ($days as $day)
                                        <div class="tab-pane fade {{ $day['is_active'] ? 'show active' : '' }}"
                                            id="day_{{ $day['date']->format('Y_m_d') }}">
                                            @forelse($activities->where('date', $day['date']->format('Y-m-d')) as $activity)
                                                <div class="d-flex align-items-center mb-6">
                                                    <span
                                                        class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4
                                                      bg-{{ $activity['type_color'] }}"></span>

                                                    <div class="flex-grow-1 me-5">
                                                        <div class="text-gray-800 fw-semibold fs-2">
                                                            {{ $activity['time'] }}
                                                            <span
                                                                class="text-gray-500 fw-semibold fs-7">{{ $activity['ampm'] }}</span>
                                                        </div>

                                                        <div class="text-gray-700 fw-semibold fs-6">
                                                            {{ $activity['description'] }}
                                                        </div>

                                                        <div class="text-gray-500 fw-semibold fs-7">
                                                            @if ($activity['action'] === 'audio_upload')
                                                                Audio: <a href="#"
                                                                    class="text-primary opacity-75-hover fw-semibold">{{ $activity['audio_title'] }}</a>
                                                            @else
                                                                Action by <a href="#"
                                                                    class="text-primary opacity-75-hover fw-semibold">{{ $activity['user_name'] }}</a>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_activity_details"
                                                        onclick="loadActivityDetails({{ $activity['id'] }})">
                                                        Details
                                                    </a>
                                                </div>
                                            @empty
                                                <div class="text-center py-10">
                                                    <i class="fas fa-calendar-times fs-2x text-gray-400 mb-4"></i>
                                                    <div class="text-gray-600 fw-semibold fs-5">No activities recorded
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="kt_modal_activity_details" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title">Activity Details</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body" id="activityDetailsContent">
                                    <div class="text-center py-10">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @push('scripts')
                        <script>
                            function loadActivityDetails(activityId) {
                                fetch(`/activities/${activityId}/details`)
                                    .then(response => response.text())
                                    .then(html => {
                                        document.getElementById('activityDetailsContent').innerHTML = html;
                                    });
                            }

                            $(document).ready(function() {
                                $('[data-bs-toggle="tooltip"]').tooltip();
                            });
                        </script>
                    @endpush
                </div>
            @endif
        </div>
    </div>
@endsection
