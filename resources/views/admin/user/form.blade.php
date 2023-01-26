

    <div class="text2{{ $errors->has('name') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label class="control-label" for="name">Name</label>
            {!! Form::text("name" , null , ['class'=> 'form-control']) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                       <strong>{{ $errors->first('name') }}</strong>
                 </span>
            @endif
        </div>
    </div>
    <div class ="clearfix"></div>
    <br>

    <div class="text2{{ $errors->has('lastname') ? ' has-error' : '' }}">


        <div class="col-md-6">
            <label class="control-label" for="lastname">Lastname</label>
            {!! Form::text("lastname" , null , ['class'=> 'form-control']) !!}

            @if ($errors->has('lastname'))
                <span class="help-block">
                       <strong>{{ $errors->first('lastname') }}</strong>
                 </span>
            @endif
        </div>
    </div>
    <div class ="clearfix"></div>
    <br>

    <div class="text2{{ $errors->has('admin') ? ' has-error' : '' }}">

        <div class="col-md-12">
            {!! Form::select("admin" , ['0'=>'user' , '1' => 'admin'] , ['class'=> 'form-control']) !!}

            @if ($errors->has('admin'))
                <span class="help-block">
                       <strong>{{ $errors->first('admin') }}</strong>
                 </span>
            @endif
        </div>
    </div>
    <div class ="clearfix"></div>
    <br>
    <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <label class="control-label" for="email">Email</label>
            {!! Form::text("email" , null , ['class'=> 'form-control']) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class ="clearfix"></div>
    <br>
    @if(!isset($user))

        <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="col-md-6">
                <label class="control-label" for="lastname"> Password</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                 </span>
                @endif
            </div>
        </div>
        <div class ="clearfix"></div>
        <br>
        <div class="text2">

            <div class="col-md-6">
                <label class="control-label" for="lastname">Repeat password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class ="clearfix"></div>
    @endif

    <hr>

    <div class="text2">
        <div class="col-md-12 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </div>
    <div class ="clearfix"></div>

