<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/css/theme.min.css">

    <title>后台管理</title>
</head>
<body>

<!-- SIDEBAR
================================================== -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('org/images/user.jpg')}}" class="navbar-brand-img
          mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="{{route('home')}}" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{asset('org/images/user.jpg')}}" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="{{route('logout')}}" class="dropdown-item">注销登录</a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin.index')}}">
                        <i class="fe fe-home"></i> 学习
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarPages" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="fe fe-file"></i> 文章系统
                    </a>
                    <div class="collapse show" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.category.index')}}" class="nav-link" >
                                    栏目管理
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarAuth" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="fe fe-user"></i> Authentication
                    </a>
                    <div class="collapse show" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" >
                                    Sign in
                                </a>

                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarLayouts" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="fe fe-layout"></i> Layouts
                    </a>
                    <div class="collapse show" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="index.html" class="nav-link">
                                    Sidenav
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                        <span class="fe fe-bell"></span> Notifications
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="my-3">

            <!-- Heading -->
            <h6 class="navbar-heading text-muted">
                Documentation
            </h6>

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link " href="getting-started.html">
                        <i class="fe fe-clipboard"></i> Getting started
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                        <i class="fe fe-book-open"></i> Components
                    </a>
                    <div class="collapse " id="sidebarComponents">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="components.html#alerts" class="nav-link">
                                    Alerts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#avatars" class="nav-link">
                                    Avatars
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#badges" class="nav-link">
                                    Badges
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#breadcrumb" class="nav-link">
                                    Breadcrumb
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#buttons" class="nav-link">
                                    Buttons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#button-group" class="nav-link">
                                    Button group
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#cards" class="nav-link">
                                    Cards
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#charts" class="nav-link">
                                    Charts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#dropdowns" class="nav-link">
                                    Dropdowns
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#forms" class="nav-link">
                                    Forms
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#icons" class="nav-link">
                                    Icons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#lists" class="nav-link">
                                    Lists
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#loaders" class="nav-link">
                                    Loaders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#modal" class="nav-link">
                                    Modal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#navs" class="nav-link">
                                    Navs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#navbar" class="nav-link">
                                    Navbar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#page-headers" class="nav-link">
                                    Page headers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#pagination" class="nav-link">
                                    Pagination
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#popovers" class="nav-link">
                                    Popovers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#progress" class="nav-link">
                                    Progress
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#social-posts" class="nav-link">
                                    Social post
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#tables" class="nav-link">
                                    Tables
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#tooltips" class="nav-link">
                                    Tooltips
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#typography" class="nav-link">
                                    Typography
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#utilities" class="nav-link">
                                    Utilities
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="fe fe-git-branch"></i> 系统版本 <span class="badge badge-primary ml-auto">v1.1.2</span>
                    </a>
                </li>
            </ul>
            <!-- User (md) -->
            <div class="navbar-user mt-auto d-none d-md-flex">


                <!-- Dropup -->
                <div class="dropup">
                    <!-- Toggle -->
                    <a href="#!" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="{{auth()->user()->icon}}" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                        <a href="{{route('logout')}}" class="dropdown-item">注销登录</a>
                    </div>
                </div>



            </div>


        </div> <!-- / .navbar-collapse -->

    </div> <!-- / .container-fluid -->
</nav>

<!-- MAIN CONTENT
================================================== -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Budget
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                      $24,500
                    </span>

                                <!-- Badge -->
                                <span class="badge badge-soft-success mt--1">
                      +3.5%
                    </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Total Hours
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                      763.5
                    </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Progress
                                </h6>

                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">

                                        <!-- Heading -->
                                        <span class="h2 mr-2 mb-0">
                          84.5%
                        </span>

                                    </div>
                                    <div class="col">

                                        <!-- Progress -->
                                        <div class="progress progress-sm">
                                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-clipboard text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Effective Hourly
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                      $85.50
                    </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-clock text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12 col-xl-4">

                <!-- Projects -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Projects
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Link -->
                                <a href="#!" class="small">View all</a>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-body">

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="project-overview.html" class="avatar avatar-4by3">
                                    <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="project-overview.html">Homepage Redesign</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="2018-05-24">Updated 5hr ago</time>
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="project-overview.html" class="avatar avatar-4by3">
                                    <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="project-overview.html">Travels & Time</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="2018-05-24">Updated 3hr ago</time>
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="project-overview.html" class="avatar avatar-4by3">
                                    <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="project-overview.html">Safari Exploration</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="2018-05-24">Updated 10hr ago</time>
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="project-overview.html" class="avatar avatar-4by3">
                                    <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/projects/project-5.jpg" alt="..." class="avatar-img rounded">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="project-overview.html">Personal Site</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small text-muted">
                                    <time datetime="2018-05-24">Updated 4hr ago</time>
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                    </div> <!-- / .card-body -->
                </div> <!-- / .card -->

            </div>
            <div class="col-12 col-xl-8">

                <!-- Goals -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Goals
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a href="#!" class="btn btn-sm btn-white">
                                    Export
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                        <table class="table table-sm table-nowrap card-table">
                            <thead>
                            <tr>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="goal-project">
                                        Goal
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="goal-status">
                                        Status
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="goal-progress">
                                        Progress
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="goal-date">
                                        Due date
                                    </a>
                                </th>
                                <th class="text-right">
                                    Team
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <tr>
                                <td class="goal-project">
                                    Update the API
                                </td>
                                <td class="goal-status">
                                    <span class="text-warning">●</span> In progress
                                </td>
                                <td class="goal-progress">
                                    55%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">07/24/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group">
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="Daniela Dewitt">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="goal-project">
                                    Release v1.2-Beta
                                </td>
                                <td class="goal-status">
                                    <span class="text-warning">●</span> In progress
                                </td>
                                <td class="goal-progress">
                                    25%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">08/26/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group justify-content-end">
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="goal-project">
                                    GDPR Compliance
                                </td>
                                <td class="goal-status">
                                    <span class="text-success">●</span> Completed
                                </td>
                                <td class="goal-progress">
                                    100%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">06/19/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group justify-content-end">
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="goal-project">
                                    v1.2 Documentation
                                </td>
                                <td class="goal-status">
                                    <span class="text-danger">●</span> Cancelled
                                </td>
                                <td class="goal-progress">
                                    0%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">06/25/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group justify-content-end">
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="fe fe-more-vertical"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="goal-project">
                                    Plan design offsite
                                </td>
                                <td class="goal-status">
                                    <span class="text-success">●</span> Completed
                                </td>
                                <td class="goal-progress">
                                    100%
                                </td>
                                <td class="goal-date">
                                    <time datetime="2018-10-24">06/30/18</time>
                                </td>
                                <td class="text-right">
                                    <div class="avatar-group justify-content-end">
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Dianna Smiley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Ab Hadley">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-2.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Adolfo Hess">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-3.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                        <a href="#!" class="avatar avatar-xs" data-toggle="tooltip" title="Daniela Dewitt">
                                            <img src="http://laravel.ishilf.com/org/Dashkit-1.1.2/assets/img/avatars/profiles/avatar-4.jpg" class="avatar-img rounded-circle border border-white" alt="...">
                                        </a>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container-fluid -->
</div> <!-- / .main-content -->

<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')

</body>
</html>