@extends('admin.layouts.layout')

@section('title')

    Control cities
    |

@endsection

@section('header')
{!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection


@section('content')
    <section class="content-header">
        <h1>
            Control cities

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/city')}}">Control cities</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <h3 class="box-title">Control cities</h3>
                            <a href="{{url('/adminpanel/city/create')}}" class="btn btn-primary pull-right ladda-button"><i class="glyphicon glyphicon-plus"></i> Add city</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data"  class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th>name</th>
                                <th>created_at</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>created_at</th>
                                <th>Control</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection
@section('footer')
    {!! Html::script('admin/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/plugins/datatables/dataTables.bootstrap.min.js') !!}
    <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "70%"
        }
    </script>

    <body onload="zoom()">


    <script type ="text/javascript">


        var lastIdx = null;

        $('#data thead th').each( function () {
            if($(this).index()  < 3  ){
                var classname = $(this).index() == 2  ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" Search '+title+'" />' );


            }

        } );


        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/adminpanel/city/data') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'control', name: ''}
            ],
            "language": {
                "url": "{{ Request::root()  }}/admin/cus/English.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [


                    {
                        "sExtends": "csv",
                        "sButtonText": "ملف اكسل",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "نسخ المعلومات",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "طباعة",
                        "mColumns": "visible",


                    }
                ],

                "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });




        });



        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        $('#data tbody')
            .on( 'mouseover', 'td', function () {
                var colIdx = table.cell(this).index().column;

                if ( colIdx !== lastIdx ) {
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                    $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                }
            } )
            .on( 'mouseleave', function () {
                $( table.cells().nodes() ).removeClass( 'highlight' );
            } );


    </script>
@endsection

