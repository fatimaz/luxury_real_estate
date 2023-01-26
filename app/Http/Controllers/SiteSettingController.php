<?php

namespace App\Http\Controllers;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
Use Redirect;

class SiteSettingController extends Controller
{

    public function index(SiteSetting $siteSetting){
        $siteSetting = $siteSetting->all();
        return view('admin.sitesetting.index', compact('siteSetting'));
    }
    //
    public function store(Request $request ,SiteSetting $siteSetting){

        foreach(array_except($request->toArray(), ['_token','submit']) as $key =>$req){

            $siteSettingUpdate= $siteSetting-> where('namesetting', $key)->get()[0];
            if($siteSettingUpdate->type !=3){
                $siteSettingUpdate->fill(array('value'=>$req))->save();
            }else{
                $fileName= uploadImage($req, '/public/website/slider/','1600','500', $siteSettingUpdate->value);
                if($fileName){
                    $siteSettingUpdate->fill(array('value'=>$fileName))->save();
                }
            }

        }
        return redirect::back()->withFlashMessage('setting is updated successfuly');
    }
}
