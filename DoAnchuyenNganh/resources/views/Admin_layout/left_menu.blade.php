<div class="sb2-13">
    <ul class="collapsible" data-collapsible="accordion">
        <li><a href="{{ route('admin-user-list') }}" class="menu-active"><i class="fa fa-bar-chart" aria-hidden="true"></i>
                Dashboard</a>
        </li>

        {{-- users --}}
        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user" aria-hidden="true"></i>
                Users</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin-user-list') }}">All Users</a>
                    </li>
                    <li><a href="{{ route('admin-user-add') }}">Add New user</a>
                    </li>
                </ul>
            </div>
        </li>
        
        {{-- accommodation type --}}
        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-h-square" aria-hidden="true"></i>
                Accommodation Types</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin-accommodationtype-list') }}">All Accommodation Type</a>
                    </li>
                    <li><a href="{{ route('admin-accommodationtype-add') }}">Add Accommodation Type</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- cities --}}
        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-picture-o" aria-hidden="true"></i>
                Cities</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin-city-list') }}">All City</a>
                    </li>
                    <li><a href="{{ route('admin-city-add') }}">Add New City</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- feedback --}}
        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                Feedback</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin-feedback-list') }}">All Feedback</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- posts --}}
        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-usd" aria-hidden="true"></i>
                Posts</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin-post-list') }}">All Post</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- room type --}}
        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-tags" aria-hidden="true"></i>
                Room Types</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin-roomtype-list') }}">All Room Types</a>
                    </li>
                    <li><a href="{{ route('admin-roomtype-add') }}">Add New Room Type</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- service --}}
        <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-ticket" aria-hidden="true"></i>
                Service</a>
            <div class="collapsible-body left-sub-menu">
                <ul>
                    <li><a href="{{ route('admin-service-list') }}">All Service</a>
                    </li>
                    <li><a href="{{ route('admin-service-add') }}">Add New Service</a>
                    </li>
                </ul>
            </div>
        </li>

        <li><a href="{{ route('logout') }}" target="_blank"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
        </li>
    </ul>
</div>