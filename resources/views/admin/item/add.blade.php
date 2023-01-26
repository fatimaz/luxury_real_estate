@extends('admin.layouts.layout')

@section('title')

    Add new Item

@endsection

@section('header')
    {!! Html::style('cus/css/select2.css') !!}

    <!-- include summernote css/js-->


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Add new item

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/item')}}">Control items</a></li>
            <li class="active"><a href="{{url('/adminpanel/item/create')}}">Add new item</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add new item</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        {!! Form::open( ['url' => '/adminpanel/item' , 'method' => 'post','files'=>true,  'enctype'=>'multipart/form-data']) !!}
                      {{-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/adminpanel/bu') }}">-->--}}
                          @include('admin.item.form')

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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height:300,
            });
        });
    </script>

@endsection

