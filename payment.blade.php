@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Configure Rent Payment Report</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'reports/payments']) !!}
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                {!! Form::label('label', 'Select a Date Range:') !!}
                            </div>
                            <div class="form-group" id="data_1">
                                <label class="font-noraml">Start Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="start-date">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                {!! Form::label('label', 'Select a Date Range:') !!}
                            </div>
                            <div class="form-group" id="data_2">
                                <label class="font-noraml">End Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="end-date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            {!! Form::submit('Generate Report', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        @if(isset($transactions))
            <div  class="table-responsive col-lg-12" >
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="ibox-title">
                            <h3>Rental Payment Report  From Date: {!! $start !!} To Date: {!! $end !!} </h3>
                        </div>
                        <div role="tabpanel" class="ibox-tools" >
                <div class="ibox-content">
                    <table id="trans_table"  class="table table-striped">
                        <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Room Name</th>
                        <th>Hostel Name</th>
                        <th>Created At</th>
                        </thead>
                        <tbody>
                        @if(strtotime({!! $start !!})>strtotime({!! $end !!}))
                         <script type="text/javascript">alert("ERROR");</script>
                         @endif
                         @else
                        @foreach($transactions as $trans)
                            <tr>
                                <td>{{ $trans->firstName }}</td>
                                <td>{{ $trans->surname  }} </td>
                                <td>{{ $trans->email }}</td>
                                <td>{{ $trans->roomName }}</td>
                                <td>{{ $trans->hostelName }}</td>
                                <td>{{ $trans->created_at }}</td>
                            </tr>
                        @endforeach
                        @endelse
                        </tbody>
                    </table>
                </div>
            </div>
                    </div>
        @endif
    </div>
            </div>
    </div>
@endsection

@section('scripts')
                    <link href="{{ url('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
                    <script src="{{url('js/plugins/dataTables/jquery.dataTables.js')}}"></script>
                    <script type="text/javascript" charset="utf8" src="{{ url('js/dataTables/buttons.html5.min.js') }}"></script>
                    <script type="text/javascript" charset="utf8" src="{{ url('js/dataTables/buttons.print.min.js') }}"></script>
                    <script type="text/javascript" charset="utf8" src="{{ url('js/dataTables/dataTables.buttons.min.js') }}"></script>
                    <script type="text/javascript" charset="utf8" src="{{ url('js/dataTables/jszip.min.js') }}"></script>
                    <script type="text/javascript" charset="utf8" src="{{ url('js/dataTables/pdfmake.min.js') }}"></script>
                    <script type="text/javascript" charset="utf8" src="{{url('js/dataTables/vfs_fonts.js')}}"></script>

                    <script type="text/javascript" charset="utf8" src="{{ url('js/dataTables/buttons.flash.min.js') }}"></script>
                    <script src="{{url('js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
                    <script src="{{url('js/plugins/dataTables/dataTables.responsive.js')}}"></script>
                    <script src="{{url('js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
                    <link href="{{url('css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
                    <link href="{{url('css/plugins/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
                    <link href="{{url('css/plugins/dataTables/dataTables.tableTools.min.css')}}" rel="stylesheet">
    <script src="{{url('js/sugar.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <link href="{{ url('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{url('js/plugins/dataTables/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('js/datatables/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('js/datatables/buttons.print.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('js/datatables/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('js/datatables/jszip.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('js/datatables/pdfmake.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('js/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{url('js/dataTables/vfs_fonts.js')}}"></script>
    <script src="{{url('js/moment.js')}}"></script>

    <script src="{{url('js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('js/plugins/dataTables/dataTables.responsive.js')}}"></script>
    <script src="{{url('js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
    <link href="{{url('css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('css/plugins/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
    <link href="{{url('css/plugins/dataTables/dataTables.tableTools.min.css')}}" rel="stylesheet">

    <script>
        $(function(){
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            $('#data_2 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            $('#trans_table').DataTable({
                dom: 'lBrtip',
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copy current page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Export To Excel Current Page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Export To PDF Current Page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    }

                ],
                "columnDefs": [
                    { "visible": false }
                ],
                "order": [[ 0, 'asc' ]],
                "displayLength": 10

            } );

            // Order by the grouping
            $('#trans_table tbody').on( 'click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if ( currentOrder[0] === 0 && currentOrder[1] === 'asc' ) {
                    table.order( [ 0, 'desc' ] ).draw();
                }
                else {
                    table.order( [ 0, 'asc' ] ).draw();
                }
            } );

        })
    </script>
@endsection