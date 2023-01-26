<div class="text2{{ $errors->has('contact_name')? 'has-error' : '' }}">
    <label class="col-md-2">
        contact name
    </label>

    <div class="col-md-10">
        {!! Form::text("contact_name" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('contact_name'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_name') }}</strong>
            </span>
         @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('contact_email')? 'has-error' : '' }}">
    <label class="col-md-2">
       Email
    </label>

    <div class="col-md-10">
        {!! Form::text("contact_email" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('contact_email'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_email') }}</strong>
            </span>
        @endif
    </div>

</div>

<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('contact_tel')? 'has-error' : '' }}">
    <label class="col-md-2">
        Phone
    </label>

    <div class="col-md-10">
        {!! Form::text("contact_tel" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('contact_tel'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_tel') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('contact_message')? 'has-error' : '' }}">
    <label class="col-md-2">
        contact message
    </label>

    <div class="col-md-10">
        {!! Form::text("contact_message" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('contact_message'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_message') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>



<div class="text2">
    <div class="col-md-10">
        <button type="submit" class="btn btn-warning">
            <i class="fa fa-btn fa-user" style="..."></i>
        </button>
    </div>
</div>
