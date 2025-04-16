 <div id="kt_aside" class="aside " data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">

     <div class="aside-logo flex-column-auto pt-10 pt-lg-20" id="kt_aside_logo">
         <a href="{{ url('http://licksdata.com/') }}" class="mb-7">
             <img alt="Logo" src="{{ asset('assets/media/auth/logo.png') }}" class="h-40px" />
         </a>
     </div>

     <div class="aside-menu flex-column-fluid pt-0 pb-7 py-lg-10" id="kt_aside_menu">
         <div id="kt_aside_menu_wrapper" class="w-100 hover-scroll-y scroll-lg-ms d-flex" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: trur}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
             data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="0">
             <div id="kt_aside_menu"
                 class="menu menu-column menu-title-secondary-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-500 menu-arrow-gray-500 fw-semibold fs-6 my-auto"
                 data-kt-menu="true">

                 <!-- Dashboard Menu -->
                 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                     class="menu-item py-2 @if (request()->routeIs('dashboard')) show here @endif">
                     <span class="menu-link menu-center">
                         <span class="menu-icon me-0">
                             <i class="fa fa-home"></i>
                         </span>
                     </span>
                     <div class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px mh-75 overflow-auto">
                         <div class="menu-item">
                             <div class="menu-content ">
                                 <span class="menu-section fs-5 fw-bolder ps-1 py-1">Home</span>
                             </div>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link @if (request()->routeIs('dashboard')) active @endif"
                                 href="{{ route('dashboard') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                 data-bs-dismiss="click" data-bs-placement="right">
                                 <span class="menu-title">
                                     Dashboard
                                 </span>
                             </a>
                         </div>
                     </div>
                 </div>

                 <!-- Music Menu -->
                 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                     class="menu-item py-2 @if (request()->routeIs('all_song') || request()->routeIs('song_upload')) show here @endif">
                     <span class="menu-link menu-center">
                         <span class="menu-icon me-0">
                             <i class="fa fa-music"></i>
                         </span>
                     </span>
                     <div class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px mh-75 overflow-auto">
                         <div class="menu-item">
                             <div class="menu-content ">
                                 <span class="menu-section fs-5 fw-bolder ps-1 py-1">Music</span>
                             </div>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link @if (request()->routeIs('all_song')) active @endif"
                                 href="{{ route('all_song') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                 data-bs-dismiss="click" data-bs-placement="right">
                                 <span class="menu-title">
                                     Upload Song
                                 </span>
                             </a>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link @if (request()->routeIs('song_upload')) active @endif"
                                 href="{{ route('song_upload') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                 data-bs-dismiss="click" data-bs-placement="right">
                                 <span class="menu-title">
                                     Track Play Data
                                 </span>
                             </a>
                         </div>
                     </div>
                 </div>

                 <!-- Payment Menu -->
                 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                     class="menu-item py-2 @if (request()->routeIs('payment.index')) show here @endif">
                     <span class="menu-link menu-center">
                         <span class="menu-icon me-0">
                             <i class="fa fa-usd"></i>
                         </span>
                     </span>
                     <div class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px mh-75 overflow-auto">
                         <div class="menu-item">
                             <div class="menu-content ">
                                 <span class="menu-section fs-5 fw-bolder ps-1 py-1">Payment</span>
                             </div>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link @if (request()->routeIs('payment.index')) active @endif"
                                 href="{{ route('payment.index') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                 data-bs-dismiss="click" data-bs-placement="right">
                                 <span class="menu-title">
                                     Withdraw Page
                                 </span>
                             </a>
                         </div>
                     </div>
                 </div>
                 <!-- Complaints -->
                 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                     class="menu-item py-2 @if (request()->routeIs('complaints.show') || request()->routeIs('complaints.compose')) show here @endif">
                     <span class="menu-link menu-center">
                         <span class="menu-icon me-0">
                             <i class="fa fa-comments"></i>
                         </span>
                     </span>
                     <div class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px mh-75 overflow-auto">
                         <div class="menu-item">
                             <div class="menu-content ">
                                 <span class="menu-section fs-5 fw-bolder ps-1 py-1">Complaints</span>
                             </div>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link @if (request()->routeIs('complaints.show')) active @endif"
                                 href="{{ route('complaints.show') }}" data-bs-toggle="tooltip"
                                 data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                 <span class="menu-title">
                                     Your Complaints
                                 </span>
                             </a>
                         </div>
                         <div class="menu-item">
                             <a class="menu-link @if (request()->routeIs('complaints.compose')) active @endif"
                                 href="{{ route('complaints.compose') }}" data-bs-toggle="tooltip"
                                 data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                 <span class="menu-title">
                                     New Complaint
                                 </span>
                             </a>
                         </div>
                     </div>
                 </div>

                 @if (Auth::user()->role_id == 1)
                     <!-- Users Menu -->
                     <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                         class="menu-item py-2 @if (request()->routeIs('admin.show_users')) show here @endif">
                         <span class="menu-link menu-center">
                             <span class="menu-icon me-0">
                                 <i class="fa fa-user"></i>
                             </span>
                         </span>
                         <div class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px mh-75 overflow-auto">
                             <div class="menu-item">
                                 <div class="menu-content ">
                                     <span class="menu-section fs-5 fw-bolder ps-1 py-1">Users</span>
                                 </div>
                             </div>
                             <div class="menu-item">
                                 <a class="menu-link @if (request()->routeIs('admin.show_users')) active @endif"
                                     href="{{ route('admin.show_users') }}" data-bs-toggle="tooltip"
                                     data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                     <span class="menu-title">
                                         Management
                                     </span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 @endif
             </div>
         </div>
     </div>

     <div class="menu menu-column aside-footer flex-column-auto pb-5 pb-lg-10 menu-title-secondary-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-500 menu-arrow-gray-500 fw-semibold fs-6 my-auto" id="kt_aside_footer">
            <div
                data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                data-kt-menu-placement="top-start"
                 class="menu-item py-2 @if(request()->routeIs(['profile.*'])) show here @endif"
            >
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="fa fa-cog"></i>
                    </span>
                </span>
                <div
                    class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px mh-75 overflow-auto"
                    data-kt-menu="true"
                >
                    <div class="menu-item">
                        <div class="menu-content">
                            <span class="menu-section fs-5 fw-bolder ps-1 py-1">Settings</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link @if(request()->routeIs('profile.profile_show')) active @endif"  href="{{route('profile.profile_show')}}">
                            <span class="menu-title">Account</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link @if(request()->routeIs('profile.profile_settings')) active @endif"  href="{{route('profile.profile_settings')}}">
                            <span class="menu-title">Profile Settings</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="menu-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="menu-title">Logout</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
 </div>
