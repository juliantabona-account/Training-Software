<div class="container-fluid p-0 p-sm-0 p-md-0 p-lg-0 p-xl-0">
    <div class = "row">
        <div class = "col-12 col-sm-12 col-md-12 col-lg-12">
            <nav id = "app-main-navbar" class="navbar navbar-expand-lg navbar-light bg-light pb-0">
                <img id = "app-nav-logo" class="navbar-brand d-block d-lg-none" src="/assets/icons/Saleschief-Logo.png">
                <button class="navbar-toggler p-0 p-sm-1" type="button" data-toggle="collapse" data-target="#appMenuDrop" aria-controls="appMenuDrop" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="appMenuDrop">

                    <div class = "container-fluid p-0">
                        <div class = "row">   
                            <div class = "col-12">
                                <img id = "app-nav-logo" class="navbar-brand d-none d-lg-block" src="/assets/icons/Saleschief-Logo.png">
                                <div class = "row res-brs-t" style = "background:#f2f2f2;">     
                                    <div class = "col-12 col-sm-5 col-md-4 col-lg-7 pl-0 pr-0 res-brs-sm-r res-brs-lg-r-n">
                                        <ul class="navbar-nav res-ml-lg-10-7 res-brs-lg-l res-brs-lg-r">
                                            <li class="nav-item pl-4 pt-3 pl-sm-5 p-lg-4 res-brs-b res-brs-sm-b-n">
                                                <a class="nav-link d-lg-table-row primary-link" href="/courses">
                                                    <i class="fa fa-th-large mr-1 res-text-9 res-text-md-8" aria-hidden="true"></i>
                                                    <span class = "res-text-9 res-text-md-8">Home</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <img src="/assets/icons/dot-graph.png" class = "d-none d-sm-block d-lg-none" style="width:100%;position: absolute;bottom: 0;">
                                    </div>
                                    <div class = "col-12 col-sm-7 col-md-8 col-lg-5 pl-0">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item dropdown pl-4 pt-3 pb-sm-1 p-lg-4 res-brs-lg-r">
                                                <a class="nav-link dropdown-toggle d-lg-table-row primary-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-user-circle-o mr-2 res-text-9 res-text-md-8" aria-hidden="true"></i>
                                                    <span class = "res-text-9 res-text-md-8 primary-link">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item res-text-9 res-text-md-8" href="/admins/1">Profile</a>
                                                    <a class="dropdown-item res-text-9 res-text-md-8" href="/admins/1">Settings</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('logout') }}" class="dropdown-item res-text-9 res-text-md-8" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" > 
                                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                        <span>Logout</span> 
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                                </div>
                                            </li>

                                            <li class="nav-item dropdown dropdown-notifications open pl-4 pt-2 pb-sm-1 p-lg-4">
                                                <a href="#notifications-panel" class="nav-link d-lg-table-row dropdown-toggle primary-link" data-toggle="dropdown">
                                                    <?php 

                                                        $totalUnreadMessages = collect($latestMessage)->map(function ($thread, $key) {
                                                            return $thread->userUnreadMessagesCount(Auth::id());
                                                        })->sum(); 
                                                    ?>
                                                    <i {{ $totalUnreadMessages ? 'data-count='.$totalUnreadMessages : '' }} class="fa fa-comments mr-2 mr-lg-0 res-text-7{{ $totalUnreadMessages ? ' notification-icon' : '' }}" aria-label="Nofitication centre"></i>
                                                </a>

                                                <div class="dropdown-container">
                                                    <ul class="dropdown-menu notifications">

                                                        <li>        
                                                            <div class="d-inline-block dropdown-toolbar pb-1 res-brs-b w-100">

                                                                <div class="d-inline dropdown-toolbar-actions float-right mr-4 mt-2 res-text-9">
                                                                    <a href="{{ route('messages') }}" class = "btn btn-sm btn-primary res-text-9 view-all-btn">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                        View All
                                                                    </a>
                                                                </div>
                                                                <div class="d-inline dropdown-toolbar-actions float-right mr-4 mt-2 res-text-9">
                                                                    <i class="fa fa-comments text-info mr-2 mr-lg-0 res-text-7"></i>
                                                                    <span class = "res-text-8">Latest Discussions</span>
                                                                </div>
                                                            </div><!-- /dropdown-toolbar -->
                                                        </li>

                                                        @include('messenger.partials.flash')

                                                        @each('messenger.partials.thread', $latestMessage, 'thread', 'messenger.partials.no-threads')

                                                    </ul>
                                                </div>
                                            </li>

                                            <li class="nav-item dropdown dropdown-notifications open pl-4 pt-2 pb-sm-1 p-lg-4">
                                                <a href="#notifications-panel" class="nav-link d-lg-table-row dropdown-toggle primary-link" data-toggle="dropdown">
                                                    <?php 
                                                        $totalUnreadNotifications = count(Auth::user()->unreadNotifications);
                                                    ?>
                                                    <i {{ $totalUnreadNotifications ? 'data-count='.$totalUnreadNotifications : '' }} class="fa fa-bell mr-2 mr-lg-0 res-text-9 res-text-md-8{{ $totalUnreadNotifications ? ' notification-icon' : '' }}" aria-label="Nofitication centre"></i>
                                                </a>

                                                <div class="dropdown-container">
                                                    <ul class="dropdown-menu notifications">

                                                        <li>        
                                                            <div class="d-inline-block dropdown-toolbar pb-1 res-brs-b w-100">
                                                                <div class="d-inline dropdown-toolbar-actions float-right mr-4 mt-2 res-text-9">
                                                                    <a href="{{ route('messages') }}" class = "btn btn-sm btn-primary res-text-9 view-all-btn">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                        View All
                                                                    </a>
                                                                </div>
                                                                <div class="d-inline dropdown-toolbar-actions float-right mr-4 mt-2 res-text-9">
                                                                    <i class="fa fa-bell text-info mr-2 mr-lg-0 res-text-8"></i>
                                                                    <span class = "res-text-8">Latest Notfications</span>
                                                                </div>
                                                            </div><!-- /dropdown-toolbar -->
                                                        </li>

                                                        @include('layouts.notification.partials.flash')

                                                        @each('layouts.notification.notification', Auth::user()->unreadNotifications, 'notification', 'layouts.notification.partials.no-notifications')

                                                    </ul>
                                                </div>
                                            </li>
                                            
                                            <li class="nav-item pl-4 pt-2 pb-sm-1 p-lg-4 res-brs-t res-brs-md-t-n res-brs-lg-r">
                                                <a class="nav-link d-lg-table-row primary-link" href="#">
                                                    <i class="fa fa-info-circle mr-2 mr-lg-0 res-text-9 res-text-md-7" aria-hidden="true"></i>
                                                    <span class = "d-inline-block d-lg-none res-text-9 res-text-md-8">Help</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class = "col-12 pl-4 res-pl-sm-10-12" style = "background:#e81018;">
                                        <ul class="navbar-nav d-inline">
                                            <li class="nav-item d-inline-block whitened pt-4 pb-1 res-pt-sm-10-2 res-pb-sm-10-1">
                                                <a href="/courses" class="nav-link d-inline-block">
                                                    <span class = "res-text-9 res-text-md-8">Courses</span>
                                                </a>
                                            </li>
                                            @if(Auth::user()->hasRole('admin'))
                                            <li class="nav-item dropdown d-inline-block whitened pt-2 pb-1 res-pt-sm-10-2 res-pb-sm-10-1">
                                                <a class="nav-link dropdown-toggle d-inline-block" href="#" id="CoursesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class = "res-text-9 res-text-md-8">Clients</span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="CoursesDropdown">
                                                  <a class="dropdown-item res-text-9 res-text-md-8" href="/clients/create"><i class="fa fa-plus res-text-9 mr-1" aria-hidden="true"></i> Add Client</a>
                                                  <a class="dropdown-item res-text-9 res-text-md-8" href="{{ route('client-list') }}"><i class="fa fa-users res-text-9 mr-1" aria-hidden="true"></i> View Clients</a>
                                                  <a class="dropdown-item res-text-9 res-text-md-8" href="{{ route('company-list') }}"><i class="fa fa-building res-text-9 mr-1" aria-hidden="true"></i> View Companies</a>
                                                </div>
                                            </li>
                                            <li class="nav-item d-inline-block whitened pt-4 pb-1 res-pt-sm-10-2 res-pb-sm-10-1">
                                                <a href="/courses" class="nav-link d-inline-block">
                                                    <span class = "res-text-9 res-text-md-8">Reports</span>
                                                </a>
                                            </li>
                                            @endif
                                            @if(Auth::user()->hasRole('client'))
                                            <li class="nav-item d-inline-block whitened pt-4 pb-1 res-pt-sm-10-2 res-pb-sm-10-1">
                                                <a href="/courses" class="nav-link d-inline-block">
                                                    <span class = "res-text-9 res-text-md-8">Reports</span>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
    </div>
</div>
