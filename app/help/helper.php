<?php

function getSetting($settingname = 'sitename'){
    return \App\Models\SiteSetting::where('namesetting', $settingname)->get()[0]->value;
}
function checkIfImageExists($imageName, $pathImage = 'website/bu_images/', $url='website/bu_images/')
{

    if ($imageName !='') {
        $path = base_path() .$pathImage.$imageName;
        if (file_exists($path)) {
            return Request::root().$url.$imageName;
        }
    }else {
        return getSetting('no_image');
    }
}


function checkIfAllImageExist($imageName, $pathImage = '/pictures/', $url='/pictures/')
{

    if ($imageName !='') {

        return asset("pictures/{$imageName}");

    }else {
        return getSetting('no_image');
    }
}

function uploadImage($request, $path='/public/website/bu_images/', $width= '500' , $height= '362' , $deleteFileWithName = ''){

    if($deleteFileWithName != ''){
        deleteImage( base_path().$path.'/'.$deleteFileWithName);
    }
    $dim= getimagesize($request);

    $fileName= $request->getClientOriginalName();
    $request->move(
        base_path().$path,$fileName
    );
    if($width == '500' && $height == '362'){
        $thumpPath= base_path().'/public/website/thump/';
        $thumpPathNew =$thumpPath.$fileName;
       \Intervention\Image\facades\Image::make(base_path().$path.'/'.$fileName)->resize('500', '362')->save($thumpPathNew , 100);
    if($deleteFileWithName != ''){
        deleteImage( $thumpPath.$deleteFileWithName);
    }
    }

    return $fileName;

}

function deleteImage($deleteFileWithName){
    if(file_exists($deleteFileWithName)){
    \Illuminate\Support\Facades\File::delete($deleteFileWithName);
    }
}

function countAllBu($status){
    return \App\Models\Item::where('status', $status)->count();
}


function setActive($array, $class = "active"){
    if(!empty($array)){
        $seg_array=[];
        foreach($array as $key => $url){
            if(Request::segment($key+1)== $url){
                $seg_array[] = $url;
            }
        }
        if(count($seg_array) == count(Request::segments())){
            if(isset($seg_array[0])){
                return $class;
            }
        }
    }
}

function buForUserCount($user_id){
    return \App\Models\Item::where('user_id', $user_id)->count();
}
//je dois faire la meme choise pour categories et ville
function transaction(){
    $array=['For Sale','For Rent'

    ];
    return $array;
}
function rooms(){
    $array=[];

    for($i=0;$i<=12;$i++){
        $array[]= $i;
    }
//    $array=['Studio', '1 Bed','2 Beds', '3 Beds' , '4 Beds','5 Beds','6 Beds', '7 Beds', '8 Beds','9 Beds', '10 Beds', '11 Beds'
//
//    ];
    return $array;
}
function bath(){
    $array=[];

    for($i=0;$i<=6;$i++){
        $array[]= $i;
    }
    return $array;
}


function status(){
    $array=['Not Activated','Activated'

    ];
    return $array;
}
 function unreadMessage(){
    return \App\Models\ContactUs::where('view' , 0)->get();
 }
function countunreadMessage(){
    return \App\Models\ContactUs::where('view' , 0)->count();
}



//function searchnamefilled(){
//
//    return [
//        'price' => 'Item price',
//         'bu_type'=> 'Type of Item',
//         'ville' => 'City',
//        'bu_price_from' =>'Price From',
//        'bu_price_to' =>'Price to',
//
//
//    ];
//}