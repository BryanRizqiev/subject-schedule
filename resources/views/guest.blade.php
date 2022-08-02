<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>schedule table - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="idance">
        <div class="schedule content-block">
            <div class="container">
                <h2>Jadwal kelas : TI - 1A</h2>

                <div class="timetable mt-3">

                    <!-- Schedule Top Navigation -->
                    <nav class="nav nav-tabs parent-day">
                        <a class="nav-link active sunday">Sun</a>
                        <a class="nav-link monday">Mon</a>
                        <a class="nav-link tuesday">Tue</a>
                        <a class="nav-link wednesday">Wed</a>
                        <a class="nav-link thursday">Thu</a>
                        <a class="nav-link friday">Fri</a>
                        <a class="nav-link saturday">Sat</a>
                        <a class="nav-link all">All</a>
                    </nav>

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="row">

                                @foreach ($schedules as $schedule)
                                <div class="col-md-6">
                                    <div class="timetable-item">
                                        <div class="timetable-item-main">
                                            <div class="timetable-item-time">{{ $schedule->subject->name }}</div>
                                            <div class="timetable-item-name">{{ $schedule->location }}</div>
                                            <span class="btn btn-primary rounded">{{ Carbon\Carbon::parse($schedule->date)->isoFormat('dddd, D MMMM Y') }}</span>
                                            <span class="btn btn-primary rounded">{{ Carbon\Carbon::parse($schedule->date)->toTimeString() }}</span>
                                        </div>
                                    </div>
                                </div>
                                    
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        body {
            margin-top: 20px;
        }

        .idance .classes-details ul.timetable {
            margin: 0 0 22px;
            padding: 0;
        }

        .idance .classes-details ul.timetable li {
            list-style: none;
            font-size: 15px;
            color: #7f7f7f;
        }

        idance .timetable {
            max-width: 900px;
            margin: 0 auto;
        }

        .idance .timetable-item {
            border: 1px solid #d8e3eb;
            padding: 15px;
            margin-top: 20px;
            position: relative;
            display: block;
        }

        @media (min-width: 768px) {
            .idance .timetable-item {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .idance .timetable-item-img {
            overflow: hidden;
            height: 100px;
            width: 100px;
            display: none;
        }

        .idance .timetable-item-img img {
            height: 100%;
        }

        @media (min-width: 768px) {
            .idance .timetable-item-img {
                display: block;
            }
        }

        .idance .timetable-item-main {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            position: relative;
            margin-top: 12px;
        }

        @media (min-width: 768px) {
            .idance .timetable-item-main {
                margin-top: 0;
                padding-left: 15px;
            }
        }

        .idance .timetable-item-time {
            font-weight: 500;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .idance .timetable-item-name {
            font-size: 14px;
            margin-bottom: 19px;
        }

        .idance .btn-book {
            padding: 6px 30px;
            width: 100%;
        }

        .idance .timetable-item-like {
            position: absolute;
            top: 3px;
            right: 3px;
            font-size: 20px;
            cursor: pointer;
        }

        .idance .timetable-item-like .fa-heart-o {
            display: block;
            color: #b7b7b7;
        }

        .idance .timetable-item-like .fa-heart {
            display: none;
            color: #f15465;
        }

        .idance .timetable-item-like:hover .fa-heart {
            display: block;
        }

        .idance .timetable-item-like:hover .fa-heart-o {
            display: none;
        }

        .idance .timetable-item-like-count {
            font-size: 12px;
            text-align: center;
            padding-top: 5px;
            color: #7f7f7f;
        }

        .idance .timetable-item-book {
            width: 200px;
        }

        .idance .timetable-item-book .btn {
            width: 100%;
        }

        .idance .schedule .nav-tabs {
            border-bottom: 2px solid #104455;
        }

        .idance .schedule .nav-link {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            font-size: 12px;
            text-align: center;
            text-transform: uppercase;
            color: #3d3d3d;
            font-weight: 500;
            -webkit-transition: none;
            -o-transition: none;
            transition: none;
            border-radius: 2px 2px 0 0;
            padding-left: 0;
            padding-right: 0;
            cursor: pointer;
        }

        @media (min-width: 768px) {
            .idance .schedule .nav-link {
                font-size: 16px;
            }
        }

        .idance .schedule .nav-link.active {
            background: #104455;
            border-color: #104455;
            color: #fff;
        }

        .idance .schedule .nav-link.active:focus {
            border-color: #104455;
        }

        .idance .schedule .nav-link:hover:not(.active) {
            background: #46c1be;
            border-color: #46c1be;
            color: #fff;
        }

        .idance .schedule .tab-pane {
            padding-top: 10px;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function () {

            $('.parent-day').on('click', '.sunday', function () {
                console.log({{ Carbon\Carbon::SUNDAY }});
            });            
            $('.parent-day').on('click', '.monday', function () {
                const day = {{ Carbon\Carbon::MONDAY }};
                getData(day);
            });            
            $('.parent-day').on('click', '.tuesday', function () {
                const day = {{ Carbon\Carbon::TUESDAY }};
                getData(day);
            });            
            $('.parent-day').on('click', '.wednesday', function () {
                const day = {{ Carbon\Carbon::WEDNESDAY }};
                getData(day);
            });            
            $('.parent-day').on('click', '.thursday', function () {
                const day = {{ Carbon\Carbon::THURSDAY }};
                getData(day);
            });            
            $('.parent-day').on('click', '.friday', function () {
                const day = {{ Carbon\Carbon::FRIDAY }};
                getData(day);
            });            
            $('.parent-day').on('click', '.saturday', function () {
                const day = {{ Carbon\Carbon::SATURDAY }};
                getData(day);
            });            

            // $.get(`schedule/${id}/edit`, {}, function (data, status) {
            //     const schedule = data.schedule;
            //     $("#modalContactForm").modal('show');
            //     $("#subject_id").val(schedule.subject_id);
            //     $("#location").val(schedule.location);
            //     $("#date").val(schedule.date);
            //     $("#schedule_id").val(schedule.id);
            // });
        });

        function getData(day) {
            $.get(`/guest/${day}/show`, {}, function (data, status) {
                console.log(data.schedules);   
            });
        }
    </script>
</body>

</html>