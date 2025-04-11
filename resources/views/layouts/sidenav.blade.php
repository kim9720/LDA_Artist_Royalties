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
                     class="menu-item py-2 @if (request()->routeIs('dashboard')) show here @endif">
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
                             <a class="menu-link @if (request()->routeIs('dashboard')) active @endif"
                                 href="{{ route('dashboard') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                 data-bs-dismiss="click" data-bs-placement="right">
                                 <span class="menu-title">
                                     Upload
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
         <!--end::Aside menu-->
     </div>
     <!--end::Nav-->

     <!--begin::Footer-->
     <div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
         <!--begin::Menu-->
         <div class="d-flex flex-center w-100 scroll-px" data-bs-toggle="tooltip" data-bs-placement="right"
             data-bs-dismiss="click" title="Quick actions">
             <button type="button" class="btn btn-custom" data-kt-menu-trigger="click" data-kt-menu-overflow="true"
                 data-kt-menu-placement="top-start">

                 <i class="ki-duotone ki-entrance-left fs-2x"><span class="path1"></span><span
                         class="path2"></span></i> </button>

             <!--begin::Menu 2-->
             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                 data-kt-menu="true">
                 <!--begin::Menu item-->
                 <div class="menu-item px-3">
                     <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                 </div>
                 <!--end::Menu item-->

                 <!--begin::Menu separator-->
                 <div class="separator mb-3 opacity-75"></div>
                 <!--end::Menu separator-->

                 <!--begin::Menu item-->
                 <div class="menu-item px-3">
                     <a href="#" class="menu-link px-3">
                         New Ticket
                     </a>
                 </div>
                 <!--end::Menu item-->

                 <!--begin::Menu item-->
                 <div class="menu-item px-3">
                     <a href="#" class="menu-link px-3">
                         New Customer
                     </a>
                 </div>
                 <!--end::Menu item-->

                 <!--begin::Menu item-->
                 <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                     <!--begin::Menu item-->
                     <a href="#" class="menu-link px-3">
                         <span class="menu-title">New Group</span>
                         <span class="menu-arrow"></span>
                     </a>
                     <!--end::Menu item-->

                     <!--begin::Menu sub-->
                     <div class="menu-sub menu-sub-dropdown w-175px py-4">
                         <!--begin::Menu item-->
                         <div class="menu-item px-3">
                             <a href="#" class="menu-link px-3">
                                 Admin Group
                             </a>
                         </div>
                         <!--end::Menu item-->

                         <!--begin::Menu item-->
                         <div class="menu-item px-3">
                             <a href="#" class="menu-link px-3">
                                 Staff Group
                             </a>
                         </div>
                         <!--end::Menu item-->

                         <!--begin::Menu item-->
                         <div class="menu-item px-3">
                             <a href="#" class="menu-link px-3">
                                 Member Group
                             </a>
                         </div>
                         <!--end::Menu item-->
                     </div>
                     <!--end::Menu sub-->
                 </div>
                 <!--end::Menu item-->

                 <!--begin::Menu item-->
                 <div class="menu-item px-3">
                     <a href="#" class="menu-link px-3">
                         New Contact
                     </a>
                 </div>
                 <!--end::Menu item-->

                 <!--begin::Menu separator-->
                 <div class="separator mt-3 opacity-75"></div>
                 <!--end::Menu separator-->

                 <!--begin::Menu item-->
                 <div class="menu-item px-3">
                     <div class="menu-content px-3 py-3">
                         <a class="btn btn-primary  btn-sm px-4" href="#">
                             Generate Reports
                         </a>
                     </div>
                 </div>
                 <!--end::Menu item-->
             </div>
             <!--end::Menu 2-->
         </div>
         <!--end::Menu-->
     </div>
     <!--end::Footer-->
 </div>
 <!--end::Aside-->
