@extends('admin.layouts.layout')

@section('title')

    Add new City
    |

@endsection

@section('header')
    {!! Html::style('cus/css/select2.css') !!}
@endsection


@section('content')

    <section class="content-header">
        <h1>
            Add City

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/city')}}">Control items</a></li>
            <li class="active"><a href="{{url('/adminpanel/city/create')}}">Add new city</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add new city</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open( ['url' => '/adminpanel/city' , 'method' => 'post','files'=>true]) !!}
                      <!-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/adminpanel/city') }}">-->
                          @include('admin.city.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('footer')
    {!! Html::script('cus/js/select2.js') !!}
    <script type="text/javascript">
        $('.select2').select2();
    </script>
@endsection
