<?php

namespace App\Http\Controllers;

use App\Models\Pictures;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Pagination;
use DB;
use App\Models\Item;
use App\Models\City;
use App\Models\SubCategory;
use Datatables;
use App;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{

public $itemAll;
    public function index(Request $request){
         $id =$request->id !== null ? '?user_id='.$request->id : null;
        // $idcat =$request->idcat !== null ? '?category_id='.$request->idcat : null;
            return view('admin.item.index',compact('id'));

    }
    ////////////////////////////////////***************************//////////////////////////////////////////
    public function create(){
        $cat_data = SubCategory::all();
        $cities = City::all();
        return view('admin.item.add',compact('photos','cat_data','cities'));
    }
    ////////////////////////////////////***************************//////////////////////////////////////////
   public function save($id){
//       dd($id);
   }


    public function store(ItemRequest $itemRequest){

        $user= Auth::user();
        $item = new Item();
        $data =[
            'name'=> $itemRequest-> name,
            'price'=> $itemRequest-> price,
            'type'=> $itemRequest-> type,
            'small_ds'=> $itemRequest-> small_ds,
            'meta'=> $itemRequest-> meta,
            'large_ds'=> $itemRequest-> large_ds,
            'transaction'=> $itemRequest-> transaction,
            'square'=> $itemRequest-> square,
            'square_inter' => $itemRequest-> square_inter,
            'rooms'=> $itemRequest-> rooms,
            'bath'=> $itemRequest-> bath,
            'status'=> $itemRequest-> status,
            'user_id'=> $user-> id,
            'category_id'=> $itemRequest-> category_id,
            'city_id'=> $itemRequest-> city_id,
            'month'=> date('m'),
            'year'=> date('Y'),
        ];

       $id = $item->create($data)->id;
       $this ->save($id);

       PicturesController::multiple_upload($itemRequest,$id);
       return redirect('adminpanel/item')->withFlashMessage('Item is added successfuly');
    }
    ////////////////////////////////////***************************//////////////////////////////////////////
    public function edit($id){
        $cat_data = SubCategory::all();
        $cities = City::all();
        $item= Item::with('photos')->where('id',$id)->first();
        return view('admin.item.edit',compact('item','cat_data','cities'));
    }
    ////////////////////////////////////***************************//////////////////////////////////////////



    public static function update(ItemRequest $request, $id)
    {
        $updatePro = Item::find($id);
        PicturesController::update($request,$id);
        $updatePro->fill($request->all())->save();
        return redirect('/adminpanel/item')->withFlashMessage('Item is updated successfuly');
    }

    ////////////////////////////////////***************************//////////////////////////////////////////
// function store product
    public function destroy($id){

        $item = Item::find($id);
        $item->photos()->delete();
        $item->delete();
        return redirect('/adminpanel/item')->withFlashMessage('Item is deleted successfuly');

    }
    ////////////////////////////////////***************************//////////////////////////////////////////
    public function anyData(Request $request, Item $item)
    {
        if($request->user_id){
            $items = $item->where('user_id' , $request->user_id)->get();
        }else{
            $items = $item->all();
        }

        if($request->category_id){
            $items = $item->where('category_id' , $request->category_id)->get();
        }else{
            $items = $item->all();
        }

        return Datatables::of($items)

            ->editColumn('name', function ($model) {
                return ['<a href="'.url('/adminpanel/item/' . $model->id . '/edit').'">'.$model->name.'</a>'];
            })
            ->editColumn('status', function ($model) {
                return [$model->status == 0 ? '<span class="badge badge-info">' . 'Not activated' . '</span>' : '<span class="badge badge-warning">' . ' Activated' . '</span>'];
            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/item/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                // $all = "<a href='{{url("/adminpanel/users/" .$model->id . '/edit') }}' class='btn btn-info btn-circle'><i class='fa fa-edit'></i></a>";
                    $all .= '<a href="' . url('/adminpanel/item/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle" onclick="preventDelete(event)"><i class="fa fa-trash-o"></i></a>';

                return [$all];
            })
            ->make(true);
    }
////////////////////////////////////***************************//////////////////////////////////////////
//    public function showAllEnable(Item $item){
//        $subcategories = SubCategory::all();
//
//        $itemAll = $item-> where('status',1)->OrderBy('id', 'desc')->paginate(15);
//        return view('web.item.all', compact('itemAll','subcategories'));
//    }

////////////////////////////////////***************************//////////////////////////////////////////

    public function showByCategory(Item $item){

        $categories = SubCategory::all();
        $itemAll = $item-> where('status',1)->OrderBy('id', 'desc')->paginate(15);
       return view('web.item.all', compact('itemAll','categories'));
    }

    public function getProducts(){

        $subcategories = SubCategory::all();

        $this->itemAll = Item::where('status',1)->with('firstPhoto','cities');

        foreach(request()->all() as $filter=>$value) {
            if (method_exists($this, $filter)) {
                 $this->$filter($value);
            }
        }

        $itemAll=$this->itemAll->paginate(15);

        return view('web.item.all', compact('itemAll','subcategories'));

    }
    //filter all products
    public function FilterAllProducts(){
        $subcategories = SubCategory::all();
        $itemAll = Item:: where('status',1);

        if(request()->get('subcategory')) {
            $itemAll->where('category_id', request()->get('subcategory'));
        }
        if(request()->get('price_from')!=''){
            $itemAll->where('price','>=',request()->get('price_from'));
        }

        if(request()->get('price_to')!=''){
            $itemAll->where('price','<=',request()->get('price_to'));
        }
        if(request()->get('rooms_from')!=''){
            $itemAll->where('rooms','>=',request()->get('rooms_from'));
        }

        if(request()->get('rooms_to')!=''){
            $itemAll->where('rooms','<=',request()->get('rooms_to'));
        }
//        if(request()->get('bath_from')!=''){
//            $itemAll->where('bath','>=',request()->get('bath_from'));
//        }
//
//        if(request()->get('bath_to')!=''){
//            $itemAll->where('bath','<=',request()->get('bath_to'));
//        }

        $itemAll = $itemAll->paginate(15);
       return view('web.item.all', compact('itemAll','subcategories'));
    }

    public function byCategory($cat_id){

        $this->itemAll->where('category_id',$cat_id);
        return $this->itemAll;
    }
    public function byCity($city){

        $this->itemAll->where('city_id',$city);
        return $this->itemAll;
    }
    public function byHighestPrice($variable){
        $this->itemAll->orderBy('price','desc');
        return $this->itemAll;
    }

    public function ForRent($variable){

        $this->itemAll->where('status',1)->where('transaction', 1)->with('cities','firstPhoto')->OrderBy('id', 'desc')->paginate(15);

        return $this->itemAll;
    }
    public function ForSale($variable){

        $this->itemAll->where('status',1)->where('transaction', 0)->with('cities','firstPhoto')->OrderBy('id', 'desc')->paginate(15);

        return $this->itemAll;
    }
    public function byLowestPrice($variable){
        $this->itemAll->orderBy('price','asc');
        return $this->itemAll;
    }
    public function newlyListed($variable){
        $this->itemAll->orderBy('id','desc');
        return $this->itemAll;
    }

    public function showSingle($id, Item $item){

        $itemInfo = $item-> findOrFail($id);
        $subcategories = SubCategory::all();

        $itemInfo->load('photos');
        $same_transaction = $item->where('transaction', $itemInfo->transaction)->with('cities','firstPhoto')->orderBy(DB::raw('RAND()'))->take(3)->get();


       /* if($buInfo->bu_status == 0){
            $messageTitle = " This item is waiting to be accepted";
            $messageBody="This item $buInfo->bu_name is waiting to be accepted";
            return view('web.bu.nopermission', compact('buInfo','messageTitle','messageBody'));
        }*/
        //$same_rent = $bu->where('bu_rent', $buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(5)->get();
       // $same_type = $item->where('ville', $itemInfo->ville)->orderBy(DB::raw('RAND()'))->take(3)->get();
        return view('web.item.itemInfo', compact('itemInfo','same_transaction','subcategories' ));


    }
////////////////////////////////////***************************//////////////////////////////////////////
    public function getAjaxInfo(Request $request, Item $item){
        return $item->find($request->id)->toJson();
    }
    ////////////////////////////////////***************************//////////////////////////////////////////
     public function userAddView(){
         $cat_data = SubCategory::all();
         return view('web.useritem.useradd',compact('cat_data'));
     }
////////////////////////////////////***************************//////////////////////////////////////////
    public function userStore(ItemRequest $itemRequest, Item $item ){


        $user= Auth::user() ? Auth::user()->id : 0;
        //??????
        //$user= Auth::user();
        $item = new Item();
        $data =[
            'name'=> $itemRequest-> name,
            'price'=> $itemRequest-> price,
            'type'=> $itemRequest-> type,
            //'small_ds'=> $itemRequest-> small_ds,
            'meta'=> $itemRequest-> meta,
            'large_ds'=> $itemRequest-> large_ds,
            'status'=> $itemRequest-> status,
            'user_id'=> $user-> id,
            'category_id'=> $itemRequest-> category_id,
            'month'=> date('m'),
            'year'=> date('Y'),
        ];

        $id = $item->create($data)->id;

        PicturesController::multiple_upload($itemRequest,$id);
        return view('web.useritem.done');
    }
    ////////////////////////////////////***************************//////////////////////////////////////////
    public function showUserBuilding(Item $item){
        $user = Auth::user();
        $item = $item->where('user_id', $user->id)->where('status',1)->paginate(10);

        return view ('web.useritem.showuser',compact('item','user'));
    }
////////////////////////////////////***************************//////////////////////////////////////////
    public function userEditBuilding($id, Item $item){
        $user = Auth::user();
        $itemInfo = $item->find($id);
        if($user->id != $itemInfo->user_id){
            $messageTitle = " This item is waiting to be accepted";
            $messageBody="This item $itemInfo->name is waiting to be accepted";
            return view ('web.item.nopermission',compact('itemInfo','messageTitle','messageBody'));

        }
        $item = $itemInfo;
            return view ('web.useritem.edituseritem',compact('item','user'));
    }
////////////////////////////////////***************************//////////////////////////////////////////
   public function userUpdateBuilding(ItemRequest $request, Item $item){
       $itemupdated = $item->find($request->bu_id);
       $itemupdated->fill(array_except($request->all() , ['image']))->save();
       if($request->file('image')){
           $fileName= uploadImage($request->file('image'), '/public/website/bu_images/' , '500' , '362' , $itemupdated->image);
           if(!$fileName){
               return Redirect::back()->withFlashMessage('Choose a picture less than 500x362');
           }
           $itemupdated->fill(['image'=> $fileName])->save();
       }
       return Redirect::back()->withFlashMessage('Item updated');
   }
}
