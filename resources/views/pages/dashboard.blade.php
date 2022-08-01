@extends('layouts.template')

@section('content')

<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="form34" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form34">Your name</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" id="form29" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form29">Your email</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-tag prefix grey-text"></i>
                    <input type="text" id="form32" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form32">Subject</label>
                </div>

                <div class="md-form">
                    <i class="fas fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                    <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">


    @if (session('create-schedule-success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('create-schedule-success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('destroy-schedule-success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('destroy-schedule-success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard kelas {{ auth()->user()->classUNP->name }}</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary text-white">Logout</button>
                            </form>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Three charts -->
        <!-- ============================================================== -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Visit</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-success">659</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Page Views</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash2"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-purple">869</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Unique Visitor</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash3"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-info">911</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent Comments -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- .col -->
            <div class="col-md-12 col-lg-8 col-sm-12">
                <div class="card white-box p-0">
                    <div class="card-body">
                        <h3 class="box-title mb-0">Kelas {{ auth()->user()->classUNP->name }} minggu ini</h3>
                    </div>
                    <div class="comment-widgets">
                        <!-- Comment Row -->
                        @foreach (App\Models\Schedule::all() as $schedule)
                        <div class="d-flex flex-row comment-row p-3 mt-0">
                            <div class="comment-text ps-2 ps-md-3 w-100">
                                <h5 class="font-medium">{{ $schedule->subject->name }}</h5>
                                <span class="mb-3 d-block">{{ $schedule->location }}</span>
                                <div class="comment-footer d-md-flex align-items-center">
                                    <span
                                        class="btn btn-primary rounded">{{ \Carbon\Carbon::parse($schedule->date)->toFormattedDateString() }}</span>
                                    <span
                                        class="btn btn-primary rounded ms-2">{{ \Carbon\Carbon::parse($schedule->date)->toTimeString() }}</span>

                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0 d-flex">
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalContactForm">Edit</button>
                                        <form class="ms-1" action="{{ route('schedule.destroy', $schedule->id) }}"
                                            onsubmit="return confirm('Yakin ?')" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-white">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card white-box p-0">
                    <div class="card-heading">
                        <h3 class="box-title mb-0">Chat Listing</h3>
                    </div>
                    <div class="card-body">
                        <ul class="chatonline">
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="{{ asset('plugins/images/users/varun.jpg') }}" alt="user-img"
                                        class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Varun Dhavan <small
                                                class="d-block text-success d-block">online</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/genu.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Genelia
                                            Deshmukh <small class="d-block text-warning">Away</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Ritesh
                                            Deshmukh <small class="d-block text-danger">Busy</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/arijit.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Arijit
                                            Sinh <small class="d-block text-muted">Offline</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/govinda.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">Govinda
                                            Star <small class="d-block text-success">online</small></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="call-chat">
                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-info btn-circle btn" type="button">
                                        <i class="far fa-comments text-white"></i>
                                    </button>
                                </div>
                                <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                        src="plugins/images/users/hritik.jpg" alt="user-img" class="img-circle">
                                    <div class="ms-2">
                                        <span class="text-dark">John
                                            Abraham<small class="d-block text-success">online</small></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    @endsection