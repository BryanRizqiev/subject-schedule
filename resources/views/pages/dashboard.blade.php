@extends('layouts.template')

@section('content')

@php
$className = auth()->user()->classUNP->name;
@endphp

<!-- ============================================================== -->
<!-- Modal Schedule Form Start -->
<!-- ============================================================== -->
<div class="modal fade" id="popupModalScheduleForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit jadwal</h4>
                <button type="button" class="close btn btn-danger text-white" data-bs-dismiss="modal"
                    aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body mx-3 parent-modal-form">
                <form id="modalScheduleForm">
                    @csrf
                    @method('PUT')
                    <div id="messageScheduleStatus"></div>
                    <input type="hidden" id="schedule_id" name="schedule_id">
                    <div class="form-group mb-5">
                        <label class="col-sm-12" for="subject_id">Pilih mapel</label>

                        <div class="col-sm-12 border-bottom">
                            <select class="form-select shadow-none p-0 border-0" id="subject_id" name="subject_id">
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md-form mb-5">
                        <label class="col-sm-12" for="location">Pilih lokasi</label>

                        <div class="col-sm-12 border-bottom">
                            <select class="form-select shadow-none p-0 border-0" id="location" name="location">
                                <option value="Kampus 1">Kampus 1</option>
                                <option value="Kampus 2">Kampus 2</option>
                                <option value="Kampus 3">Kampus 3</option>
                                <option value="Kampus 4">Kampus 4</option>
                                <option value="Kampus 5">Kampus 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-md-12 p-0" for="date">Pilih waktu</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="datetime-local" placeholder="123 456 7890" class="form-control p-0 border-0"
                                id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="button" id="edit-schedule-submit">
                            <span class="spinner-border text-primary spinner-border-sm" id="loading"
                                style="display:none;" role="status" aria-hidden="true"></span> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Modal Schedule Form End -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Modal Subject Form Start -->
<!-- ============================================================== -->
<div class="modal fade" id="popupModalSubjectForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Mapel</h4>
                <button type="button" class="close btn btn-danger text-white" data-bs-dismiss="modal"
                    aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body mx-3 parent-modal-form">
                <form id="modalSubjectForm">
                    @csrf
                    @method('PUT')
                    <div id="messageSubjectStatus"></div>
                    <input type="hidden" id="subject_id" name="subject_id">
                    <div class="form-group mb-3">
                        <label class="col-sm-12" for="subject_name">Nama Mapel</label>

                        <div class="col-sm-12 border-bottom">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="col-sm-12" for="subject_name">Nama Dosen</label>

                        <div class="col-sm-12 border-bottom">
                            <input type="text" name="lecturer" id="lecturer" class="form-control">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="button" id="edit-subject-submit">
                            <span class="spinner-border text-primary spinner-border-sm" id="loading"
                                style="display:none;" role="status" aria-hidden="true"></span> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Modal Subject Form End -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">

    @if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard kelas {{ $className }}</h4>
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
                    <h3 class="box-title">Jumlah Kelas</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-success">25</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Jumlah Jadwal</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash2"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-purple">50</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Jumlah Mapel</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash3"><canvas width="67" height="30"
                                    style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ms-auto"><span class="counter text-info">130</span>
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
                        <h3 class="box-title mb-0">Kelas {{ $className }} minggu ini</h3>
                    </div>
                    <div class="comment-widgets">
                        <!-- Comment Row -->
                        @foreach ($schedules as $schedule)
                        <div class="d-flex flex-row comment-row p-3 mt-0">
                            <div class="comment-text ps-2 ps-md-3 w-100">
                                <h5 class="font-medium">{{ $schedule->subject->name }}</h5>
                                <span class="mb-3 d-block">{{ $schedule->location }}</span>
                                <div class="comment-footer d-md-flex align-items-center">
                                    <span class="btn btn-primary rounded">{{
                                        Carbon\Carbon::parse($schedule->date)->isoFormat('dddd, D MMMM Y') }}</span>
                                    <span class="btn btn-primary rounded ms-1">{{
                                        Carbon\Carbon::parse($schedule->date)->toTimeString() }}</span>
                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0 d-flex parent-edit-schedule">
                                        <button class="btn btn-warning" id="edit-schedule"
                                            data-id="{{ Crypt::encryptString($schedule->id) }}">Edit</button>
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
                        <h3 class="box-title mb-0">Mapel</h3>
                    </div>
                    <div class="card-body">
                        <ul class="chatonline">
                            @foreach ($subjects as $subject)
                            <li>
                                <div class="call-chat">
                                    <div class="d-flex parent-edit-subject">
                                        <button class="btn btn-warning text-white btn-circle btn" id="edit-subject"
                                            data-id="{{ $subject->id }}">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                        <form action="{{ route('subject.destroy', $subject->id) }}"
                                            onsubmit="return confirm('Yakin ? dengan menghapus ini maka juga akan menghapus sebagian jadwal')"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle btn">
                                                <i class="fas fa-file-excel text-white"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="ms-2">
                                    <h4 class="text-dark">{{ $subject->name }}<p
                                            class="d-block text-success d-block mt-2">{{ $subject->lecturer }}</p>
                                    </h4>
                                </div>
                            </li>
                            @endforeach
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

    @push('custom-script')
    <script>
        //perlu optimasi
        $(document).ready(function () {
            $('.parent-edit-schedule').on('click', '#edit-schedule', function () {
                const id = $(this).data('id');
                showEShceduleM(id);

                $('#edit-schedule-submit').click(function () {

                    const id = $("#schedule_id").val();

                    $.ajax({
                        method: "PUT",
                        url: "schedule/" + id,
                        data: $('#modalScheduleForm').serialize(),
                        type: 'json',
                        beforeSend: function () {
                            $('#loading').show();
                            $('#edit-schedule-submit').attr('disabled', true);
                        },
                        success: function (data) {
                            $('#loading').hide();
                            $('#edit-schedule-submit').attr('disabled', false);
                            $('#messageScheduleStatus').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${data.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`);

                            setTimeout(function () {
                                $('#messageScheduleStatus').hide();
                                location.reload();
                            }, 2000);

                        }
                    });
                });
            });


            $('.parent-edit-subject').on('click', '#edit-subject', function () {
                const id = $(this).data('id');
                showSubjectM(id);

                $('#edit-subject-submit').click(function () {

                    const id = $("#subject_id").val();

                    $.ajax({
                        method: "PUT",
                        url: "subject/" + id,
                        data: $('#modalSubjectForm').serialize(),
                        type: 'json',
                        beforeSend: function () {
                            $('#loading').show();
                            $('#edit-subject-submit').attr('disabled', true);
                        },
                        success: function (data) {
                            $('#loading').hide();
                            $('#edit-subject-submit').attr('disabled', false);
                            $('#messageSubjectStatus').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${data.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`);

                            setTimeout(function () {
                                $('#messageSubjectStatus').hide();
                                location.reload();
                            }, 2000);

                        }
                    });
                });
            });

        });

        function showEShceduleM(id) {
            $.get(`schedule/${id}/edit`, {}, function (data, status) {
                $("#popupModalScheduleForm").modal('show');
                $("#subject_id").val(data.subject_id);
                $("#location").val(data.location);
                $("#date").val(data.date);
                $("#schedule_id").val(data.id);
            });

        }

        function showSubjectM(id) {
            $.get(`subject/${id}/edit`, {}, function (data, status) {
                const subject = data.subject;
                $("#popupModalSubjectForm").modal('show');
                $("#subject_id").val(subject.id);
                $("#name").val(subject.name);
                $("#lecturer").val(subject.lecturer);
            });
        }
    </script>
    @endpush