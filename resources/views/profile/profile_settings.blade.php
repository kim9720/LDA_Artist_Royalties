@extends('layouts.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class=" container-xxl " id="kt_content_container">
            @include('profile.includes.nav_profile')

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Profile Details</h3>
                    </div>
                </div>

                <div id="kt_account_settings_profile_details" class="collapse show">
                    <form
                    id="kt_account_profile_details_form"
                    class="form"
                    action="{{ route('profile.profile_update_basic') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >                        @csrf
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Profile Picture</label>

                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url('{{ $profile->profile_picture ? asset('storage/profile_pictures/' . $profile->profile_picture) : asset('assets/media/avatars/avata1.png') }}')">
                                   </div>

                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change Picture">
                                            <i class="fa fa-edit fs-7"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                            <input type="file" name="profile_picture" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>

                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel Picture">
                                            <i class="fa fa-close fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </span>

                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove Picture">
                                            <i class="fa fa-close fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full
                                    Name</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" name="fname"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="First name" value="{{$profile->name}}" />
                                        </div>
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" name="mname"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Middle name" value="{{$profile->mname}}" />
                                        </div>
                                        <div class="col-lg-4 fv-row">
                                            <input type="text" name="lname"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Last name" value="{{$profile->lname}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label
                                    class="col-lg-4 col-form-label required fw-semibold fs-6">Artist Name</label>

                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="artist"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Company name" value="{{ $profile->artist_name }}" />
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Contact Phone</span>


                                    <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                        <i class="fa fa-phone text-gray-500 fs-6"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span></i></span> </label>
                                <div class="col-lg-8 fv-row">
                                    <input type="tel" name="phone"
                                        class="form-control form-control-lg form-control-solid" placeholder="Phone number"
                                        value="{{$profile->phone}}" />
                                </div>
                            </div>



                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Country</span>


                                    <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                        <i class="fa fa-globe text-gray-500 fs-6"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span></i></span> </label>

                                <div class="col-lg-8 fv-row">
                                    <select name="country" aria-label="Select a Country" data-control="select2"
                                        data-placeholder="Select a country..."
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="{{$profile->country ? $profile->country : ''}}"> {{$profile->country ? $profile->country : 'Select a Country...'}}</option>
                                        <option data-kt-flag="flags/kenya.svg" value="Kenya">Kenya</option>
                                        <option data-kt-flag="flags/tanzania.svg" value="Tanzania">Tanzania</option>
                                        <option data-kt-flag="flags/uganda.svg" value="Uganda">Uganda</option>
                                        <option data-kt-flag="flags/rwanda.svg" value="Rwanda">Rwanda</option>
                                        <option data-kt-flag="flags/burundi.svg" value="Burundi">Burundi</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label  fw-semibold fs-6">Currency</label>

                                <div class="col-lg-8 fv-row">
                                    <select name="currency" aria-label="Select a Currency" data-control="select2"
                                        data-placeholder="Select a currency.."
                                        class="form-select form-select-solid form-select-lg">
                                        <option value="{{$profile->currency ? $profile->currency : ''}}">{{$profile->currency ? $profile->currency : 'Select a currency..'}}</option>
                                        <option  value="USD - USA dollar">
                                            <b>USD</b>&nbsp;-&nbsp;USA dollar
                                        </option>
                                        <option  value="TZS - Tanzania Shiling">
                                            <b>TZS</b>&nbsp;-&nbsp;Tanzania Shiling
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Communication</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="d-flex align-items-center mt-3">
                                        @php
                                            $communications = json_decode($profile->communication_method ?? '[]', true);
                                        @endphp

                                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                            <input class="form-check-input" name="communication[]" type="checkbox"
                                                   value="Email" {{ in_array('Email', $communications) ? 'checked' : '' }} />
                                            <span class="fw-semibold ps-2 fs-6">
                                                Email
                                            </span>
                                        </label>

                                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                                            <input class="form-check-input" name="communication[]" type="checkbox"
                                                   value="Phone" {{ in_array('Phone', $communications) ? 'checked' : '' }} />
                                            <span class="fw-semibold ps-2 fs-6">
                                                Phone
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card  mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_signin_method">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Sign-in Method</h3>
                    </div>
                </div>

                <div id="kt_account_settings_signin_method" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="d-flex flex-wrap align-items-center">
                            <div id="kt_signin_email">
                                <div class="fs-6 fw-bold mb-1">Email Address</div>
                                <div class="fw-semibold text-gray-600">{{$profile->email}}</div>
                            </div>

                            <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                <form id="kt_signin_change_email" class="form" method="post" action="{{ route('profile.update') }}" novalidate="novalidate">
                                    @csrf
                                    @method('patch')

                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0">
                                                <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New
                                                    Email
                                                    Address</label>
                                                <input type="email"
                                                    class="form-control form-control-lg form-control-solid"
                                                    id="emailaddress" placeholder="Email Address" name="email"
                                                    value="{{$profile->email}}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0">
                                                <label for="confirmemailpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Confirm
                                                    Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="confirmemailpassword" id="confirmemailpassword" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button id="kt_signin_submit" type="button"
                                            class="btn btn-primary  me-2 px-6">Update Email</button>
                                        <button id="kt_signin_cancel" type="button"
                                            class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                            </div>

                            <div id="kt_signin_email_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Change Email</button>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-6"></div>

                        <div class="d-flex flex-wrap align-items-center mb-10">
                            <div id="kt_signin_password">
                                <div class="fs-6 fw-bold mb-1">Password</div>
                                <div class="fw-semibold text-gray-600">************</div>
                            </div>

                            <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                <form id="kt_signin_change_password" class="form" novalidate="novalidate" method="post" action="{{ route('profile.reset_password') }}">
                                    @csrf
                                    @method('patch')
                                    <div class="row mb-1">
                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="currentpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Current
                                                    Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid "
                                                    name="currentpassword" id="currentpassword" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New
                                                    Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid "
                                                    name="newpassword" id="newpassword" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="fv-row mb-0">
                                                <label for="confirmpassword"
                                                    class="form-label fs-6 fw-bold mb-3">Confirm New
                                                    Password</label>
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid "
                                                    name="confirmpassword" id="confirmpassword" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-text mb-5">Password must be at least 8 character and
                                        contain symbols</div>

                                    <div class="d-flex">
                                        <button id="kt_password_submit" type="button"
                                            class="btn btn-primary me-2 px-6">Update Password</button>
                                        <button id="kt_password_cancel" type="button"
                                            class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                            </div>

                            <div id="kt_signin_password_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Reset
                                    Password</button>
                            </div>
                        </div>

                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
                            <i class="fa fa-shield fs-2tx text-primary me-4"><span
                                    class="path1"></span><span class="path2"></span></i>

                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Secure Your Account</h4>

                                    <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an
                                        extra layer of security to your account. To log in, in addition
                                        you'll need to provide a 6 digit code</div>
                                </div>

                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">
                                    Enable </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card  mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_notifications" aria-expanded="true"
                    aria-controls="kt_account_notifications">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Notifications</h3>
                    </div>
                </div>

                <div id="kt_account_settings_notifications" class="collapse show">
                    <form class="form">
                        <div class="card-body border-top px-9 pt-3 pb-4">
                            <div class="table-responsive">
                                <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                                    <tbody class="fs-6 fw-semibold">
                                        <tr>
                                            <td class="min-w-250px fs-4 fw-bold">Notifications</td>
                                            <td class="w-125px">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="kt_settings_notification_email" checked data-kt-check="true"
                                                        data-kt-check-target="[data-kt-settings-notification=email]" />
                                                    <label class="form-check-label ps-2"
                                                        for="kt_settings_notification_email">
                                                        Email
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="w-125px">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="kt_settings_notification_phone" checked data-kt-check="true"
                                                        data-kt-check-target="[data-kt-settings-notification=phone]" />
                                                    <label class="form-check-label ps-2"
                                                        for="kt_settings_notification_phone">
                                                        Phone
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Billing Updates</td>
                                            <td>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="billing1" checked data-kt-settings-notification="email" />
                                                    <label class="form-check-label ps-2" for="billing1"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="billing2" checked data-kt-settings-notification="phone" />
                                                    <label class="form-check-label ps-2" for="billing2"></label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Activated Songs</td>
                                            <td>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="project1" data-kt-settings-notification="email" />
                                                    <label class="form-check-label ps-2" for="project1"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="project2" checked data-kt-settings-notification="phone" />
                                                    <label class="form-check-label ps-2" for="project2"></label>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button class="btn btn-primary  px-6">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card  ">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_deactivate" aria-expanded="true"
                    aria-controls="kt_account_deactivate">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Delete Account</h3>
                    </div>
                </div>

                <div id="kt_account_settings_deactivate" class="collapse show">
                    <form id="kt_account_deactivate_form" class="form" method="post" action="{{ route('profile.delete_acount') }}">
                        @csrf
                        @method('DELETE')

                        <div class="card-body border-top p-9">

                            <div
                                class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                <i class="fa fa-info-circle fs-2tx text-warning me-4"><span
                                        class="path1"></span><span class="path2"></span><span
                                        class="path3"></span></i>
                                <div class="d-flex flex-stack flex-grow-1 ">
                                    <div class=" fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">You Are Deleting Your Account
                                        </h4>

                                        <div class="fs-6 text-gray-700 ">For extra security, this requires
                                            you to confirm your email or phone number when you reset
                                            yousignr password. <br /><a class="fw-bold" href="#">Learn
                                                more</a></div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-check form-check-solid fv-row">
                                <input name="deactivate" class="form-check-input" type="checkbox" value=""
                                    id="deactivate" />
                                <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I
                                    confirm my account deletion</label>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button id="kt_account_deactivate_account_submit" type="submit"
                                class="btn btn-danger fw-semibold">Delete Account</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
