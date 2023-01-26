


@extends('layouts.app')
@section('title')
    Contact us
@endsection

@section('header')
    {!! Html::style('cus/buall.css') !!}

@endsection
@section('content')
    <br>
    <br>
<div class="container">

    <h1> Contact us</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                {!! Form::open(['url' =>'/contact', 'nethod'=>'post']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Name</label>
                                <input name="contact_name" type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-envelope"></span>
                                </span>
                                    <input name="contact_email"  type="email" class="form-control" id="email" placeholder="Enter email"  required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="tel">
                                    Phone</label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-phone"></span>
                                </span>
                                    <input name="contact_tel"  type="phone" class="form-control" id="phone" placeholder="Enter Phone" required="required" /></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                                <textarea name="contact_message" id="message" class="form-control" rows="9" cols="25" required="required"
                                          placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="banner_btn pull-right" id="btnContactUs">
                                Send Message</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        {{--<div class="col-md-4">--}}
            {{--<form>--}}
                {{--<legend><i class="fa fa-outdent"></i> Our office</legend>--}}
                {{--<address>--}}
                    {{--<strong>Inc.</strong><br>--}}
                    {{--{{ nl2br(getSetting('Address')) }}--}}
                    {{--<br>--}}
                    {{--<abbr title="Phone">--}}
                        {{--Tel:</abbr>--}}
                    {{--{{ nl2br(getSetting('mobile')) }}--}}
                {{--</address>--}}
                {{--<address>--}}
                    {{--<strong>Full Name</strong><br>--}}
                    {{--<a href="mailto:#">{{ nl2br(getSetting('email')) }}</a>--}}
                {{--</address>--}}
            {{--</form>--}}
        {{--</div>--}}
    </div>
</div>
@endsection