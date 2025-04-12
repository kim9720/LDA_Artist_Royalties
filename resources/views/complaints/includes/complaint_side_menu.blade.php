<div class="d-none d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-275px" data-kt-drawer="true"
    data-kt-drawer-name="inbox-aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_inbox_aside_toggle">

    <div class="card card-flush mb-0" data-kt-sticky="false" data-kt-sticky-name="inbox-aside-sticky"
        data-kt-sticky-offset="{default: false, xl: '100px'}" data-kt-sticky-width="{lg: '275px'}"
        data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false"
        data-kt-sticky-zindex="95">
        <div class="card-body">
            @if (Auth::user()->role_id == 2)
                <a href="{{ route('complaints.compose') }}" class="btn btn-primary fw-bold w-100 mb-8">New Message</a>
            @endif
            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary mb-10">
                <a href="{{ route('complaints.show') }}" class="menu-item mb-3 ">
                    <span class="menu-link {{ request()->routeIs('complaints.show') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa fa-inbox fs-2 me-3 {{ request()->routeIs('complaints.show') ? 'text-primary' : ' text-black'}}">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold{{ request()->routeIs('complaints.show') ? 'text-primary' : ' text-black'}}">Inbox</span>
                        <span class="badge badge-light-success">{{$complaints_inbox_count}}</span>
                    </span>
                </a>

                <a href="{{ route('complaints.marked_show') }}" class="menu-item mb-3">
                    <span class="menu-link {{ request()->routeIs('complaints.marked_show') ? 'active' : '' }}">
                        <span class="menu-icon">
                            <i class="fa fa-envelope-open fs-2 me-3 {{ request()->routeIs('complaints.marked_show') ? 'text-primary' : ' text-black'}}">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title fw-bold{{ request()->routeIs('complaints.marked_show') ? 'text-primary' : ' text-black'}}">Marked</span>
                    </span>
                </a>
            </div>


        </div>
    </div>
</div>
