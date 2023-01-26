<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Validator;
use Response;
use Redirect;
use Session;
use DB;
use App\Models\Pictures;
use App\Models\Item;

class PicturesController extends Controller
{
    public function index()
    {
        return view('admin.item.add');

    }
    public function show(){

    }

    public static function multiple_upload(ItemRequest $request, $product_id)
    {
        //getting all of the post data

        $files = Input::file('images');
        //Making counting of uploaded images
        $file_count = count($files);
        //start count how many uploaded
        $uploadcount = 0;
        if (count($files)!=0){
        foreach ($files as $file) {
            $rules = array('file' => 'required');
            $validator = Validator::make(array('file' => $file), $rules);
            if ($validator->passes()) {
                $image = Image::make($file);
                $destinationPath = 'pictures'; //upload folder in public durectory
                $extention = $file->getClientOriginalExtension();
                $newFileName = str_random(13) . '.' . $extention;

                $upload_success = $file->move($destinationPath, $newFileName);
                $image->resize(320,240)->save(storage_path("app/public/pictures/320x240/{$newFileName}"));
                $uploadcount++;

                //save into database
                $extension = $file->getClientOriginalExtension();
                $entry = new Pictures();
                $entry->mime = $file->getClientMimeType();
                $entry->pic_name = $newFileName;
                $entry->original_filename = $file->getFilename() . '.' . $extension;

                $entry->item_id = $product_id;
                $entry->save();

            }
        }

        }
        if ($uploadcount == $file_count) {
            Session::flash('success', 'Upload sucessfully');
            return Redirect::to('/adminpanel/item');
        } else {
            return Redirect::to('/adminpanel/item')->withInput()->withErrors($validator);
        }
    }
    public static function update(ItemRequest $request, $id){
        
        $product = Item::find($id);
//        $product->photos()->delete();
        static::multiple_upload($request,$id);

        return redirect('/adminpanel/item')->withFlashMessage('Item is updated successfuly');

    }

    public function destroy($id){

        //todo
        //delete File with specific id
        $picture = Pictures::find($id);
        if($picture){
            \File::delete(public_path('/pictures/'.$picture->pic_name));
            $picture->delete();
        }
            return back()->withFlashMessage('Picture Successfully Deleted !!!');
    }
}




