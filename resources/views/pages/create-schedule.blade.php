@extends('layouts.template')

@section('content')
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Halaman membuat jadwal</h4>
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
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('schedule.store') }}" method="POST"
                            class="form-horizontal form-material">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="col-sm-12" for="subject_id">Pilih mapel</label>

                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none p-0 border-0 form-control-line @error('subject_id') is-invalid @enderror"
                                        id="subject_id" name="subject_id">
                                        <option value="" selected></option>
                                        @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12" for="location">Pilih lokasi</label>

                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none p-0 border-0 form-control-line @error('location') is-invalid @enderror" id="location"
                                        name="location">
                                        <option value="" selected></option>
                                        <option value="Kampus 1">Kampus 1</option>
                                        <option value="Kampus 2">Kampus 2</option>
                                        <option value="Kampus 3">Kampus 3</option>
                                        <option value="Kampus 4">Kampus 4</option>
                                        <option value="Kampus 5">Kampus 5</option>
                                    </select>
                                    @error('location')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12" for="type">Tipe kelas</label>

                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none p-0 border-0 form-control-line @error('type') is-invalid @enderror" id="type"
                                        name="type">
                                        <option value="" selected></option>
                                        <option value="Offline">Offline</option>
                                        <option value="Online">Online</option>
                                    </select>
                                    @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0" for="date">Tanggal & waktu</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="datetime-local" placeholder="123 456 7890"
                                        class="form-control p-0 border-0 @error('date') is-invalid @enderror"
                                        id="date" name="date">
                                    @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Deskripsi" id="description" name="description"
                                    style="height: 100px"></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label class="ps-2 pt-2" for="description">Deskripsi</label>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Buat</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection