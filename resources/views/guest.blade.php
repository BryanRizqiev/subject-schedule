<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Schedule table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"
        defer></script>
</head>

<body>

    <div class="idance">
        <div class="schedule content-block">
            <div class="container">
                <h2>Jadwal kelas : TI - 1A</h2>

                <div class="timetable mt-3">

                    <!-- Schedule Top Navigation -->
                    <nav class="nav nav-tabs parent-day">
                        <a class="nav-link all" id="all">All</a>
                        <a class="nav-link sunday">Sun</a>
                        <a class="nav-link monday">Mon</a>
                        <a class="nav-link tuesday">Tue</a>
                        <a class="nav-link wednesday">Wed</a>
                        <a class="nav-link thursday">Thu</a>
                        <a class="nav-link friday">Fri</a>
                        <a class="nav-link saturday">Sat</a>
                    </nav>

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="row">

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

            $(function () {
                $('.all').trigger('click');
            });

            $('.parent-day').on('click', '.all', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                getAllData();
            });
            $('.parent-day').on('click', '.sunday', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                getData('Sun');
            });
            $('.parent-day').on('click', '.monday', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                getData('Mon');
            });
            $('.parent-day').on('click', '.tuesday', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                getData('Tue');
            });
            $('.parent-day').on('click', '.wednesday', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                getData('Wed');
            });
            $('.parent-day').on('click', '.thursday', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                getData('Thu');
            });
            $('.parent-day').on('click', '.friday', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                getData('Fri');
            });
            $('.parent-day').on('click', '.saturday', function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
                getData('Sat');
            });

        });

        function getData(day) {
            $.get(`/guest/${day}/show`, {}, function (datas, status) {
                show(datas);
            });
        }

        function getAllData() {
            $.get(`/guest/showAll`, {}, function (datas, status) {
                show(datas);
            });
        }

        function show(datas) {
            console.log(datas);
            $('.row').html('');
            $.each(datas, function (i, data) {
                $('.row').append(`                                
                                <div class="col-md-6">
                                    <div class="timetable-item rounded">
                                        <div class="timetable-item-main">
                                            <div class="d-inline float-end btn btn-success">
                                                <i class="fa-solid fa-clipboard-list"></i>
                                            </div>
                                            <div class="timetable-item-time">${data.subject}</div>
                                            ${data.type == 'Offline' ? '<div class="timetable-item-name">' + data.location + '</div>' : '<div class="timetable-item-name">Bebas</div>'}
                                                <span class="btn btn-primary rounded">${data.date}</span>
                                                <span class="btn btn-primary rounded">${data.date_time}</span> 
                                            <div class=mt-1>
                                                <span class="btn btn-primary rounded">${data.date_for_human}</span>
                                                ${data.type == 'Online' ? '<span class="badge bg-warning rounded">Online</span>' : '<span class="badge bg-secondary rounded">Offline</span>'}
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
            });
        }
    </script>
    
    <script src="https://kit.fontawesome.com/d4310dc43d.js" crossorigin="anonymous"></script>
</body>

</html>