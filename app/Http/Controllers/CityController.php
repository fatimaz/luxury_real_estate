<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Datatables;
use DB;

class CityController extends Controller
{
    public function index(Request $request){
        return view('admin.city.index');
    }
    public function create(){
        return view('admin.city.add');
    }

    public function store(CityRequest $cityRequest, City $city){



        if($cityRequest->file('image')){
            $fileName= $cityRequest->file('image')->getClientOriginalName();
            $cityRequest->file('image')->move(
                base_path().'/public/website/bu_images/' ,$fileName
            );
            $image = $fileName;
        }else{
            $image='';
        }
        $city = new City();
        $data =[
            'name'=> $cityRequest-> name,
            'image' => $image,
        ];

        $city->create($data)->id;
        return redirect('adminpanel/city')->withFlashMessage('City is added successfuly');

    }
    public function edit($id){

        $cities= City::find($id);
        return view('admin.city.edit',compact('cities'));
    }

    public function update($id, CityRequest $request){
        $cotupdated= City::find($id);

        $cotupdated->fill(array_except($request->all(),['image']))->save();
        if($request->file('image')){
            $fileName= $request->file('image')->getClientOriginalName();
            $request->file('image')->move(
                base_path().'/public/website/bu_images/' ,$fileName
            );
            $cotupdated->fill(['image' => $fileName])->save();
        }
//          $cotupdated->name= $request->input('name');;
//          $cotupdated->save();

        return redirect('/adminpanel/city')->withFlashMessage('City is updated successfuly');

    }


    public function destroy($id)
    {
        $cityDeleted = City::find($id);
        $cityDeleted->items()->delete();
        $cityDeleted->delete();
        return redirect('/adminpanel/city')->withFlashMessage('City is deleted successfuly');
    }
    public function anyData(Request $request, City $city)
    {

            $cities = $city->all();



        return Datatables::of($cities)

            ->editColumn('name', function ($model) {
                return ['<a href="'.url('/adminpanel/city/' . $model->id . '/edit').'">'.$model->name.'</a>'];
            })



            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/city/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                // $all = "<a href='{{url("/adminpanel/users/" .$model->id . '/edit') }}' class='btn btn-info btn-circle'><i class='fa fa-edit'></i></a>";
                $all .= '<a href="' . url('/adminpanel/city/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';

                return [$all];
            })
            ->make(true);
    }

}
