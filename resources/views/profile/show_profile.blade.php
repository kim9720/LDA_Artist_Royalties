@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            @include('profile.includes.nav_profile')
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <div class="card-header cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Profile Details</h3>
                    </div>
                    @if (Auth::user()->role_id == 2)
                        <a href="{{ route('profile.profile_settings') }}"
                            class="btn btn-sm btn-primary align-self-center">Edit
                            Profile</a>
                    @endif
                </div>

                <div class="card-body p-9">
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                        <div class="col-lg-8">
                            <span
                                class="fw-bold fs-6 text-gray-800">{{ $profile->name . ' ' . $profile->mname . ' ' . $profile->lname }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Artist Name</label>
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $profile->artist_name }}</span>
                        </div>
                    </div>

                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">
                            Contact Phone

                            <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                <i class="fa fa-phone fs-7"><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span></i> </span>
                        </label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bold fs-6 text-gray-800 me-2">{{ $profile->phone }}</span>
                            <span class="badge badge-danger">Not Verified</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">
                            Country

                            <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                <i class="fa fa-globe fs-7"><span class="path1"></span><span class="path2"></span><span
                                        class="path3"></span></i> </span>
                        </label>

                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">Tanzania</span>
                        </div>
                    </div>

                    <div class="row mb-7">
                        <label class="col-lg-4 fw-semibold text-muted">Email</label>

                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-gray-800">{{ $profile->email }}</span>
                        </div>
                    </div>

                    <div class="row mb-10">
                        <label class="col-lg-4 fw-semibold text-muted">Bank Name</label>

                        <div class="col-lg-8">
                            <span class="fw-semibold fs-6 text-gray-800">{{ $profile->bank_name }}</span>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <label class="col-lg-4 fw-semibold text-muted">Account Number</label>

                        <div class="col-lg-8">
                            <span class="fw-semibold fs-6 text-gray-800">{{ $profile->account_number }}</span>
                        </div>
                    </div>
                    @if (Auth::user()->role_id == 2)
                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed  p-6">
                        <i class="fa fa-info-circle fs-2tx text-warning me-4"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span></i>
                            <div class="d-flex flex-stack flex-grow-1 ">
                                <div class=" fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">We need your attention!</h4>

                                    <div class="fs-6 text-gray-700 ">Your payment was declined. To start using
                                        tools, please <a class="fw-bold" href="{{ route('profile.profile_bill') }}">Add
                                            Payment
                                            Method</a>.</div>
                                </div>

                            </div>
                        </div>
                        @endif
                </div>
            </div>



        </div>
    </div>
@endsection
