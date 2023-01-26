<div class="text2{{ $errors->has('name')? 'has-error' : '' }}">
    <label class="col-md-2">
       Sub_Category name
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
<div class="text2{{ $errors->has('parent_cat_id')? 'has-error' : '' }}">
<label class="col-md-2">
Parent Categories
</label>

<div class="col-md-10">
<Select class="form-control" name="parent_cat_id">
@foreach($parent_cat as $parentcat)
<option value="{{$parentcat->id}}">{{ucwords($parentcat->name)}}</option>
@endforeach
</Select>
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
</div>
<div class="clearfix"></div>
<br>

<article>
    <label for="files">Select multiple files: </label>
    <input id="files" type="file" multiple/>
    <output id="result" />
</article>