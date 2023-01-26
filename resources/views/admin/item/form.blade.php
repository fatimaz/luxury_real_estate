<div class="text2{{ $errors->has('name')? 'has-error' : '' }}">
    <label class="col-md-2">
        Item name
    </label>

    <div class="col-md-10">
        {!! Form::text("name" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('price')? 'has-error' : '' }}">
    <label class="col-md-2">
        Price
    </label>

    <div class="col-md-10">
        {!! Form::text("price" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>

</div>

<div class="clearfix"></div>
<br>



<div class="text2{{ $errors->has('category_id')? 'has-error' : '' }}">
    <label class="col-md-2">
        Property type
    </label>

    <div class="col-md-10">
        <Select class="form-control" name="category_id" required>
            <option>select Category</option>
            @foreach($cat_data as $subcategory)
                <option value="{{$subcategory->id}}" @if(isset($item))@if($subcategory->id ==$item->category_id ) selected @endif @endif>{{ucwords($subcategory->name)}}</option>
            @endforeach
        </Select>
    </div>

</div>

<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('city_id')? 'has-error' : '' }}">
    <label class="col-md-2">
        City
    </label>

    <div class="col-md-10">
        <Select class="form-control select2" name="city_id" required>
            <option>select City</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}"  @if(isset($item))@if($city->id ==$item->city_id ) selected @endif @endif>{{ucwords($city->name)}}</option>
            @endforeach
        </Select>
    </div>

</div>
<div class="clearfix"></div>
<br>
<div class="text2{{ $errors->has('transaction')? 'has-error' : '' }}">
    <label class="col-md-2">
        Transaction
    </label>

    <div class="col-md-10">

        {!! Form::select("transaction" ,transaction(), null , ['class'=> 'form-control select2', 'placeholder'=> 'Transaction']) !!}

        @if($errors->has('transaction'))
            <span class="help-block">
                <strong>{{ $errors->first('transaction') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('rooms')? 'has-error' : '' }}">
    <label class="col-md-2">
        Bedrooms
    </label>

    <div class="col-md-10">

        {!! Form::select("rooms" ,rooms(), null , ['class'=> 'form-control select2', 'placeholder'=> 'Bedrooms']) !!}

        @if($errors->has('rooms'))
            <span class="help-block">
                <strong>{{ $errors->first('rooms') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>
<div class="text2{{ $errors->has('bath')? 'has-error' : '' }}">
    <label class="col-md-2">
        Bathroom
    </label>

    <div class="col-md-10">

        {!! Form::select("bath" ,bath(), null , ['class'=> 'form-control select2', 'placeholder'=> 'Bathroom']) !!}

        @if($errors->has('bath'))
            <span class="help-block">
                <strong>{{ $errors->first('bath') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>
<div class="text2{{ $errors->has('square')? 'has-error' : '' }}">
    <label class="col-md-2">
        External Square
    </label>

    <div class="col-md-10">
        {!! Form::text("square" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('square'))
            <span class="help-block">
                <strong>{{ $errors->first('square') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('square_inter')? 'has-error' : '' }}">
    <label class="col-md-2">
        Internal Square
    </label>

    <div class="col-md-10">
        {!! Form::text("square_inter" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('square_inter'))
            <span class="help-block">
                <strong>{{ $errors->first('square_inter') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>

@if(!isset($user))
    <div class="text2{{ $errors->has('status')? 'has-error' : '' }}">
        <label class="col-md-2">
            Item status
        </label>

        <div class="col-md-10">
            {!! Form::select("status" , status(),null , ['class'=> 'form-control']) !!}
            @if($errors->has('status'))
                <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
            @endif
        </div>

    </div>
    <div class="clearfix"></div>
    <br>
@endif

<!--had if bach maybanch f la list-->
<div class="text2{{ $errors->has('meta')? 'has-error' : '' }}">
    <label class="col-md-2">
        Key words
    </label>

    <div class="col-md-10">
        {!! Form::text("meta" , null , ['class'=> 'form-control']) !!}
        @if($errors->has('meta'))
            <span class="help-block">
                <strong>{{ $errors->first('meta') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="clearfix"></div>
<br>




<div class="text2{{ $errors->has('image')? 'has-error' : '' }}">
    <label class="col-md-2">
        Images
    </label>

    <div class="col-md-10">


        <div class="container">
            @if(Session::has('success'))
                <div class="alert-box success">
                    <h2>{!! Session::get('success') !!}</h2>
                </div>
            @endif
            <div class="form-group">
                <h2> Upload</h2>
                <input type="file" name="images[]" multiple="multiple" onchange="uploadImageTemporary">

                <p>{!! $errors->first('images') !!}</p>
                @if(Session::has('error'))
                    <p>{!! Session::get('error') !!}</p>
                @endif
            </div>

        </div>
    </div>
</div>

    <div class="clearfix"></div>
    <br>

    @if(!isset($user))
        <div class="text2{{ $errors->has('small_ds')? 'has-error' : '' }}">
            <label class="col-md-2">
                Item description for search engine
            </label>

            <div class="col-md-10">
                {!! Form::textarea("small_ds" , null , ['class'=> 'form-control', 'rows'=>'4']) !!}
                @if($errors->has('small_ds'))
                    <span class="help-block">
                <strong>{{ $errors->first('small_ds') }}</strong>
            </span>
                @endif
                <br>
                <div class="alert alert-warning"> You can not meta more than 160 characters</div>
            </div>

        </div>
        <div class="clearfix"></div>
        <br>
    @endif
    <div class="text2{{ $errors->has('small_ds')? 'has-error' : '' }}">
        <label class="col-md-2">
            Item full description
        </label>

        <div class="col-md-10">
            {!! Form::textarea("large_ds" , null , ['class'=> 'form-control', 'id'=>'summernote']) !!}
            {{--<textarea id="summernote" name="summernote" class="form-control">--}}

            {{--</textarea>--}}
            @if($errors->has('large_ds'))
                <span class="help-block">
                <strong>{{ $errors->first('large_ds') }}</strong>
            </span>
            @endif
        </div>

    </div>
    <div class="clearfix"></div>
    <br>
    <div class="text2">
        <div class="col-md-10">
            <button meta="submit" class="btn btn-warning">
                <i class="fa fa-btn fa-user" style=".."></i>
            </button>
        </div>
    </div>
</div>


