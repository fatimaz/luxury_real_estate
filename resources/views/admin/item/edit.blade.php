@extends('admin.layouts.layout')

@section('title')

    Edit item
    {{$item->name}}

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
            Edit item
            {{$item->name}}

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="{{url('/adminpanel/item')}}">Control items</a></li>
            <li class="active"><a href="{{url('/adminpanel/item/'.$item->id.'edit')}}">Edit item {{$item-> bu_name}}</a></li>


        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit item {{$item->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">



                        {!!Form::model($item,array('url'=>'/adminpanel/item/'.$item->id, 'method' => 'PATCH','files' =>true ,  'enctype'=>'multipart/form-data'))!!}
                                 @include('admin.item.form')
                        {!! Form::close() !!}
                        @if(request()->segment(4)=="edit")
                            @foreach($item->photos as $photo)
                                <form method="post" action="/adminpanel/item/picture/{{$photo->id}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <img style="width:100px;height:100px;border: 1px solid #fff;border-radius: 50px" src={{asset('pictures/'.$photo->pic_name)}}>
                                    <input type="submit" value="delete">

                                </form>
                            @endforeach

                        @endif



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


        $(document).ready(function() {
            $('#summernote').summernote({
                height:300,
            });
        });

    </script>
@endsection

