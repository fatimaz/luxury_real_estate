@extends('admin.layouts.layout')

@section('title')

    Edit city
    {{$cities->name}}

@endsection

@section('header')
    {!! Html::style('cus/css/select2.css') !!}

@endsection


@section('content')

    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="content-header">
        <h1>
            Edit city
            {{$cities->name}}

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/city')}}">Control cities</a></li>
            <li class="active"><a href="{{url('/adminpanel/city/'.$cities->id.'edit')}}">Edit city {{$cities->name}}</a></li>


        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit city {{$cities->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">



                        {!!Form::model($cities,array('url'=>'/adminpanel/city/'.$cities->id, 'method' => 'PATCH','files' =>true))!!}
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

