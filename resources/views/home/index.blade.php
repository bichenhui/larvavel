@extends('home.layouts.master')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-4">
                <!-- Files -->
                @auth()
                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    动态({{$actives->count()}})
                                </h4>

                            </div>
                        </div> <!-- / .row -->
                    </div>

                    <div class="card-body">

                        <!-- List group -->

                            <div class="list-group list-group-flush my--3">
                                @if($actives->count()!=0)
                                @foreach($actives as $active)
                                    @if($active['log_name']=='article')
                                        @include('home.layouts._article')
                                    @elseif($active['log_name']=='comment')
                                        @include('home.layouts._comment')
                                    @endif
                                @endforeach
                                @else
                                <p class="text-muted text-center">暂无评论</p>
                                @endif
                            </div>

                    </div>
                    <!-- List -->

                </div>
                @endauth
                {{$actives->links()}}

            </div>
            <div class="col-12 col-xl-8">

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar avatar-lg">
                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..."
                                         class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Dianna Smiley</a>
                                </h4>

                                <!-- Text -->
                                <p class="card-text small text-muted mb-1">
                                    You either die Spongebob or you live long enough to...
                                </p>

                                <!-- Status -->
                                <p class="card-text small">
                                    <span class="text-success">●</span> Online
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a href="#!" class="btn btn-sm btn-primary d-none d-md-inline-block">
                                    Subscribe
                                </a>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" data-expanded="false">
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
                </div>

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar avatar-lg">
                                    <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..."
                                         class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Ab Hadley</a>
                                </h4>

                                <!-- Text -->
                                <p class="card-text small text-muted mb-1">
                                    Working on the latest API integration.
                                </p>

                                <!-- Status -->
                                <p class="card-text small">
                                    <span class="text-success">●</span> Online
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a href="#!" class="btn btn-sm btn-primary d-none d-md-inline-block">
                                    Subscribe
                                </a>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" data-expanded="false">
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
                </div>

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar avatar-lg">
                                    <img src="assets/img/avatars/profiles/avatar-3.jpg" alt="..."
                                         class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Adolfo Hess</a>
                                </h4>

                                <!-- Text -->
                                <p class="card-text small text-muted mb-1">
                                    Vactioning with the fam
                                </p>

                                <!-- Status -->
                                <p class="card-text small">
                                    <span class="text-success">●</span> Online
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a href="#!" class="btn btn-sm btn-primary d-none d-md-inline-block">
                                    Subscribe
                                </a>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" data-expanded="false">
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
                </div>

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar avatar-lg">
                                    <img src="assets/img/avatars/profiles/avatar-4.jpg" alt="..."
                                         class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Daniela Dewitt</a>
                                </h4>

                                <!-- Text -->
                                <p class="card-text small text-muted mb-1">
                                    Arts District project management stuff.
                                </p>

                                <!-- Status -->
                                <p class="card-text small">
                                    <span class="text-warning">●</span> Busy
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a href="#!" class="btn btn-sm btn-primary d-none d-md-inline-block">
                                    Subscribe
                                </a>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" data-expanded="false">
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
                </div>

                <!-- Card -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar avatar-lg">
                                    <img src="assets/img/avatars/profiles/avatar-5.jpg" alt="..."
                                         class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Miyah Myles</a>
                                </h4>

                                <!-- Text -->
                                <p class="card-text small text-muted mb-1">
                                    You either die Spongbob...or become Squidward
                                </p>

                                <!-- Status -->
                                <p class="card-text small">
                                    <span class="text-danger">●</span> Offline
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                <a href="#!" class="btn btn-sm btn-primary d-none d-md-inline-block">
                                    Subscribe
                                </a>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" data-expanded="false">
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
                </div>

            </div>
        </div>
    </div>
@endsection