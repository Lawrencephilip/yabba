<!DOCTYPE html>
<html>
{{--lawrence kamau--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yabba - Hostels</title>

    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('css/styles.css')}}" rel="stylesheet">
    <!--Icons-->
    <script src="{{url('js/lumino.glyphs.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{url('js/html5shiv.js')}}"></script>
    <script src="{{url('js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/home')}}"><span>Yabba</span>Hostels</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{\Illuminate\Support\Facades\Auth::user()->firstName}}  {{\Illuminate\Support\Facades\Auth::user()->surname}} <span class="caret"></span></a>
                    {{--<ul class="dropdown-menu" role="menu">--}}
                 <a href="{{url('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a>

                    {{--</ul>--}}
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">

        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
        <li class="active"><a href="{{url('/home')}}"><svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg>Dashboard</a></li>
        <li class="parent ">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg></span>Manage Users            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="{{url('add/user')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Add Receptionist
                    </a>
                </li>
                <li>
                    <a class="" href="{{url('list/users')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List Users
                    </a>
                </li>
                <li>
                    <a class="" href="{{url('list/tenants')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List Tenants
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent ">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg></span>Manage Hostels
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    <a class="" href="{{url('add/hostel')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Add Hostel
                    </a>
                </li>
                <li>
                    <a class="" href="{{url('list/hostels')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List Hostels
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent ">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg></span>Manage Rooms
            </a>
            <ul class="children collapse" id="sub-item-3">
                <li>
                    <a class="" href="{{url('add/room')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Add Room
                    </a>
                </li>
                <li>
                    <a class="" href="{{url('list/rooms')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List Rooms
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent ">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg></span>Report</a>
            <ul class="children collapse" id="sub-item-4">
                <li>
                    <a class="" href="{{url('payment/report')}}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Payment Report
                    </a>
                </li>
            </ul>
        </li>
            @else
            <li>
                <a class="" href="{{url('list/tenants')}}">
                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List Tenants
                </a>
            </li>
            <li>
                <a class="" href="{{url('list/hostels')}}">
                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List Hostels
                </a>
            </li>
            <li>
                <a class="" href="{{url('list/rooms')}}">
                    <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>List Rooms
                </a>
            </li>
        @endif
    </ul>
    <div class="attribution">Created by <a href="#">Lawrence Kamau</a><br/></div>
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Yabba Hostels</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Welcome To Yabba Hostels Management System</h1>
        </div>
    </div><!--/.row-->

    @include('notices.success')
    @include('notices.fail')
    @yield('content')

</div>	<!--/.main-->

<script> var url = "{{ url('') }}"; </script>
<script src="{{url('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/chart.min.js')}}"></script>
<script src="{{url('js/chart-data.js')}}"></script>
<script src="{{url('js/easypiechart.js')}}"></script>
<script src="{{url('js/easypiechart-data.js')}}"></script>
<script src="{{url('js/bootstrap-datepicker.js')}}"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
<script>
    //slide up the notification
    $(".notify").delay(3000).slideUp('slow');
</script>
@yield('scripts')
</body>
</html>
