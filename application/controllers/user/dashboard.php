<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Dashboard</title>

        <meta name="description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="noname">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Dashmix">
        <meta property="og:description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="src/assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="src/assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="src/assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="src/assets/css/dashmix.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header


        Footer

            ''                                          Static Footer if no class is added
            'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-dark'                          Dark themed Header
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header - Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="content-header bg-body-light justify-content-center text-danger" data-toggle="layout" data-action="side_overlay_close" href="javascript:void(0)">
                    <i class="fa fa-2x fa-times-circle"></i>
                </a>
                <!-- END Side Header - Close Side Overlay -->

                <!-- Side Content -->
                <form action="db_modern.html" method="POST" onsubmit="return false;">
                    <div class="content-side">
                        <div class="block pull-x">
                            <!-- Personal -->
                            <div class="block-content block-content-sm block-content-full bg-body-dark">
                                <span class="text-uppercase font-size-sm font-w700">Personal</span>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="form-group">
                                    <label for="so-profile-name">Name</label>
                                    <input type="text" class="form-control form-control-alt" id="so-profile-name" name="so-profile-name" value="George Taylor">
                                </div>
                                <div class="form-group">
                                    <label for="so-profile-email">Email</label>
                                    <input type="email" class="form-control form-control-alt" id="so-profile-email" name="so-profile-email" value="g.taylor@example.com">
                                </div>
                            </div>
                            <!-- END Personal -->

                            <!-- Password Update -->
                            <div class="block-content block-content-sm block-content-full bg-body-dark">
                                <span class="text-uppercase font-size-sm font-w700">Password Update</span>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="form-group">
                                    <label for="so-profile-password">Current Password</label>
                                    <input type="password" class="form-control form-control-alt" id="so-profile-password" name="so-profile-password">
                                </div>
                                <div class="form-group">
                                    <label for="so-profile-new-password">New Password</label>
                                    <input type="password" class="form-control form-control-alt" id="so-profile-new-password" name="so-profile-new-password">
                                </div>
                                <div class="form-group">
                                    <label for="so-profile-new-password-confirm">Confirm New Password</label>
                                    <input type="password" class="form-control form-control-alt" id="so-profile-new-password-confirm" name="so-profile-new-password-confirm">
                                </div>
                            </div>
                            <!-- END Password Update -->

                            <!-- Submit -->
                            <div class="block-content border-top">
                                <button type="submit" class="btn btn-block btn-primary">
                                    <i class="fa fa-fw fa-save mr-1"></i> Save
                                </button>
                            </div>
                            <!-- END Submit -->
                        </div>
                    </div>
                </form>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header (mini Sidebar mode) -->
                <div class="smini-visible-block">
                    <div class="content-header">
                        <!-- Logo -->
                        <a class="font-w600 text-white tracking-wide" href="index.html">
                            D<span class="opacity-75">x</span>
                        </a>
                        <!-- END Logo -->
                    </div>
                </div>
                <!-- END Side Header (mini Sidebar mode) -->

                <!-- Side Header (normal Sidebar mode) -->
                <div class="smini-hidden">
                    <div class="content-header justify-content-lg-center">
                        <!-- Logo -->
                        <a class="font-w600 text-white tracking-wide" href="index.html">
                            Dash<span class="opacity-75">mix</span>
                            <span class="font-w400">Modern</span>
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div class="d-lg-none">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header (normal Sidebar mode) -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side Actions -->
                    <div class="content-side content-side-full bg-black-10 text-center">
                        <div class="smini-hide">
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-user-circle"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-file-alt"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-envelope"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-secondary">
                                <i class="fa fa-fw fa-cog"></i>
                            </button>
                        </div>
                    </div>
                    <!-- END Side Actions -->

                    <!-- Side Navigation -->
                    <div class="content-side">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="db_modern.html">
                                    <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                    <span class="nav-main-link-badge badge badge-pill badge-primary">3</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Manage</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                                    <span class="nav-main-link-name">Projects</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-plus"></i>
                                            <span class="nav-main-link-name">New</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-star"></i>
                                            <span class="nav-main-link-name">Active</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Manage</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-user"></i>
                                    <span class="nav-main-link-name">Customers</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-plus"></i>
                                            <span class="nav-main-link-name">New</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Manage</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-file-alt"></i>
                                    <span class="nav-main-link-name">Invoices</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-plus"></i>
                                            <span class="nav-main-link-name">New</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-hourglass"></i>
                                            <span class="nav-main-link-name">Pending</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Manage</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-check"></i>
                                    <span class="nav-main-link-name">Payments</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-hourglass"></i>
                                            <span class="nav-main-link-name">Pending</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Manage</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-glasses"></i>
                                    <span class="nav-main-link-name">Marketing</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-book-open"></i>
                                            <span class="nav-main-link-name">Articles</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-globe"></i>
                                            <span class="nav-main-link-name">SEO</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-directions"></i>
                                            <span class="nav-main-link-name">Feedback</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-chart-area"></i>
                                            <span class="nav-main-link-name">Analytics</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-life-ring"></i>
                                    <span class="nav-main-link-name">Support</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-fire"></i>
                                            <span class="nav-main-link-name">Open Tickets</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="">
                                            <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                            <span class="nav-main-link-name">Manage</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-heading">Settings</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-house-user"></i>
                                    <span class="nav-main-link-name">Profile</span>
                                    <span class="nav-main-link-badge badge badge-pill badge-primary">4</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-envelope-open"></i>
                                    <span class="nav-main-link-name">Messages</span>
                                    <span class="nav-main-link-badge badge badge-pill badge-success">9</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-user"></i>
                                    <span class="nav-main-link-name">Account</span>
                                    <span class="nav-main-link-badge badge badge-pill badge-warning">3</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-lock"></i>
                                    <span class="nav-main-link-name">Security</span>
                                    <span class="nav-main-link-badge badge badge-pill badge-danger">1</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Dashboards</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="be_pages_dashboard_all.html">
                                    <i class="nav-main-link-icon fa fa-arrow-left"></i>
                                    <span class="nav-main-link-name">Go Back</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-dual d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search..</span>
                        </button>
                        <!-- END Open Search Section -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-fw fa-flag"></i>
                                <span class="badge badge-primary badge-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                                    Notifications
                                </div>
                                <ul class="nav-items my-2">
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mx-3">
                                                <i class="fa fa-fw fa-check-circle text-success"></i>
                                            </div>
                                            <div class="media-body font-size-sm pr-2">
                                                <div class="font-w600">App was updated to v5.6!</div>
                                                <div class="text-muted font-italic">3 min ago</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mx-3">
                                                <i class="fa fa-fw fa-user-plus text-info"></i>
                                            </div>
                                            <div class="media-body font-size-sm pr-2">
                                                <div class="font-w600">New Subscriber was added! You now have 2580!</div>
                                                <div class="text-muted font-italic">10 min ago</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark media py-2" href="javascript:void(0)">
                                            <div class="mx-3">
                                                <i class="fa fa-times-circle text-danger"></i>
                                            </div>
                                            <div class="media-body font-size-sm pr-2">
                                                <div class="font-w600">Server backup failed to complete!</div>
                                                <div class="text-muted font-italic">30 min ago</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="p-2 border-top">
                                    <a class="btn btn-light btn-block text-center" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-eye mr-1"></i> View All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Notifications Dropdown -->

                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-fw fa-user-circle"></i>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
                                    <div class="pt-2">
                                        <a class="text-white font-w600" href="be_pages_generic_profile.html">George Taylor</a>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item" href="be_pages_generic_profile.html">
                                        <i class="far fa-fw fa-user mr-1"></i> Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                        <span class="badge badge-primary">3</span>
                                    </a>
                                    <a class="dropdown-item" href="be_pages_generic_invoice.html">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>

                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="far fa-fw fa-building mr-1"></i> Settings
                                    </a>
                                    <!-- END Side Overlay -->

                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="op_auth_signin.html">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="far fa-fw fa-bookmark"></i>
                        </button>
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-sidebar-dark">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-dark" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search Application.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-darker">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Quick Menu -->
                <div class="bg-body-dark">
                    <div class="content">
                        <div class="row gutters-tiny push invisible" data-toggle="appear">
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo15.jpg');" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-gd-fruit-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-home text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Home</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo16.jpg');" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-gd-sublime-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="far fa-2x fa-chart-bar text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Statistics</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo17.jpg');" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-gd-aqua-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-user-circle text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Accounts</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo18.jpg');" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-gd-sea-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-briefcase text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Projects</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo19.jpg');" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-gd-dusk-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-file-alt text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Invoices</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4 col-xl-2">
                                <a class="block block-rounded text-center bg-image" style="background-image: url('assets/media/photos/photo20.jpg');" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-gd-sun-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-sign-out-alt text-white"></i>
                                            <div class="font-w600 mt-3 text-uppercase text-white">Logout</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Quick Menu -->

                <!-- Page Content -->
                <div class="content">
                    <div class="row invisible" data-toggle="appear">
                        <!-- Statistics -->
                        <div class="col-md-6">
                            <div class="block block-rounded" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-white-90 overflow-hidden">
                                    <div class="py-3">
                                        <!-- Sparkline Container -->
                                        <span class="js-sparkline" data-type="line"
                                              data-points="[930,860,1100,680,1300,1782,820,960]"
                                              data-width="100%"
                                              data-height="200px"
                                              data-line-color="#6a82fb"
                                              data-fill-color="transparent"
                                              data-spot-color="transparent"
                                              data-min-spot-color="transparent"
                                              data-max-spot-color="transparent"
                                              data-highlight-spot-color="#6a82fb"
                                              data-highlight-line-color="#6a82fb"
                                              data-tooltip-suffix="Lines"></span>
                                    </div>
                                </div>
                                <div class="block-content block-content-full d-flex align-items-end justify-content-between bg-body-light">
                                    <div class="mr-3">
                                        <p class="font-w600 text-uppercase mb-0">
                                            Code Lines per day
                                        </p>
                                        <p class="font-size-lg font-w300 text-muted mb-0">
                                            ~930
                                        </p>
                                    </div>
                                    <div>
                                        <i class="fa fa-2x fa-code text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full bg-white-90 overflow-hidden">
                                    <div class="py-3">
                                        <!-- Sparkline Container -->
                                        <span class="js-sparkline" data-type="line"
                                              data-points="[13,12,16,17,12,18,10]"
                                              data-width="100%"
                                              data-height="200px"
                                              data-line-color="#e65c00"
                                              data-fill-color="transparent"
                                              data-spot-color="transparent"
                                              data-min-spot-color="transparent"
                                              data-max-spot-color="transparent"
                                              data-highlight-spot-color="#e65c00"
                                              data-highlight-line-color="#e65c00"
                                              data-tooltip-suffix="Tickets"></span>
                                    </div>
                                </div>
                                <div class="block-content block-content-full d-flex align-items-end justify-content-between bg-body-light">
                                    <div class="mr-3">
                                        <p class="font-w600 text-uppercase mb-0">
                                            Tickets per day
                                        </p>
                                        <p class="font-size-lg font-w300 text-muted mb-0">
                                            ~15
                                        </p>
                                    </div>
                                    <div>
                                        <i class="fa fa-2x fa-life-ring text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Statistics -->
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <!-- Best Media -->
                        <div class="col-md-6 col-xl-4">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <p class="text-uppercase font-w600 text-center mt-2 mb-4">
                                        Games Collection
                                    </p>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    480
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Steam
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fab fa-2x fa-steam text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    42
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in PS4
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fab fa-2x fa-playstation text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    35
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Xbox One
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fab fa-2x fa-xbox text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-0" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    12
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Nintendo Switch
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-gamepad text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <p class="text-uppercase font-w600 text-center mt-2 mb-4">
                                        Movies Collection
                                    </p>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    936
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Adventure
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-film text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    260
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Horror
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-film text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    763
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Sci-fi
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-film text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-0" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    150
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Social
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-film text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <p class="text-uppercase font-w600 text-center mt-2 mb-4">
                                        Books Collection
                                    </p>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    260
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Philosophy
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-book text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    430
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Fiction
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-book text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-2" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    368
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Business
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-book text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="block block-rounded block-link-rotate bg-body-light mb-0" href="javascript:void(0)">
                                        <div class="block-content block-content-sm block-content-full d-flex align-items-center justify-content-between">
                                            <div class="mr-3">
                                                <p class="font-size-lg mb-0">
                                                    580
                                                </p>
                                                <p class="text-muted font-size-sm mb-0">
                                                    in Science
                                                </p>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-2x fa-book text-muted"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Best Media -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-white">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Dashmix 3.1</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!--
            Dashmix JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_js/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="src/assets/js/dashmix.core.min.js"></script>

        <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_js/main/app.js
        -->
        <script src="src/assets/js/dashmix.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="src/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Page JS Helpers (jQuery Sparkline plugin) -->
        <script>jQuery(function () {
                        Dashmix.helpers('sparkline');
                    });</script>
    </body>
</html>
