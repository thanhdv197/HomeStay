<div class="col-md-2 col-sm-3 col-xs-6">
    <!-- Dropdown Trigger -->
    <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="{{ Auth::check()?Auth::user()->avatar:null }}" alt="" />My
        Account <i class="fa fa-angle-down" aria-hidden="true"></i>
    </a>

    <!-- Dropdown Structure -->
    <ul id='top-menu' class='dropdown-content top-menu-sty'>
        <li><a href="{{ route('admin-user-list') }}" class="waves-effect"><i class="fa fa-list-ul" aria-hidden="true"></i>
                User Manager</a>
        </li>
        <li><a href="{{ route('admin-accommodationtype-list') }}" class="waves-effect"><i class="fa fa-building-o" aria-hidden="true"></i> Accommodation Type Manager</a>
        </li>
        <li><a href="{{ route('admin-city-list') }}" class="waves-effect"><i class="fa fa-umbrella" aria-hidden="true"></i> City Manager</a>
        </li>
        <li><a href="{{ route('admin-feedback-list') }}" class="waves-effect"><i class="fa fa-flag-checkered" aria-hidden="true"></i>Feedback Manager</a>
        </li>
        <li><a href="{{ route('admin-post-list') }}" class="waves-effect"><i class="fa fa-tags" aria-hidden="true"></i> Post Manager</a>
        </li>
        <li><a href="{{ route('admin-roomtype-list') }}" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i>Room Type Manager</a>
        </li>
        <li><a href="{{ route('admin-service-list') }}" class="waves-effect"><i class="fa fa-undo" aria-hidden="true"></i>Service Manager</a>
        </li>
        <li class="divider"></li>
        <li><a href="{{ route('logout') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
        </li>
    </ul>
</div>