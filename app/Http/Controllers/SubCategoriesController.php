<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use Pagination;
use DB;
use App\Models\SubCategory;
use App\Models\Category;
use Datatables;
use App\Http\Requests\SubCategoryRequest;


class SubCategoriesController extends Controller
{

    public function index()
    {

        return view('admin.subcategory.index');
    }

    public function create()
    {
        $parent_cat = Category::all();

        return view('admin.subcategory.add',compact('parent_cat'));
    }

    public function store(SubCategoryRequest $subcatRequest, SubCategory $subcategory)
    {
        $user = Auth::user();
        $subcategory = new SubCategory();
        $data = [
            'name' => $subcatRequest->name,
            'parent_cat_id'=> $subcatRequest-> parent_cat_id,
        ];

        $subcategory->create($data)->id;
        return redirect('adminpanel/subcategory')->withFlashMessage('SubCategory is added successfuly');
    }

    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        $parent_cat = Category::all();
      //  $subcategory= SubCategory::with('subcategories')->where('id',$id)->first();
        return view('admin.subcategory.edit', compact('subcategory','parent_cat'));
    }

    public function update($id, SubCategoryRequest $request)
    {
        $subcatup= SubCategory::find($id);
        $subcatup->name = $request->input('name');;
        $subcatup->save();

        return redirect('/adminpanel/subcategory')->withFlashMessage('SubCategory is updated successfuly');

    }

//hadi 7ta mn b3d
    public function destroy($id)
    {
            $subcatdel = Category::find($id);
             $subcatdel->delete();
            return redirect('/adminpanel/subcategory')->withFlashMessage('SubCategory is deleted successfuly');
    }

    public function anyData(Request $request, SubCategory $subcategory)
    {

        $subcategories = $subcategory->all();

        return Datatables::of($subcategories)
            ->editColumn('name', function ($model) {
                return ['<a href="' . url('/adminpanel/subcategory/' . $model->id . '/edit') . '">' . $model->name . '</a>'];
            })
            ->editColumn('pro', function ($model) {
                return ['<a href="' . url('/adminpanel/item/' . $model->id) . '"><span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span></a>'];
            })
            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/subcategory/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                // $all = "<a href='{{url("/adminpanel/users/" .$model->id . '/edit') }}' class='btn btn-info btn-circle'><i class='fa fa-edit'></i></a>";
                $all .= '<a href="' . url('/adminpanel/subcategory/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';

                return [$all];
            })
            ->make(true);
    }

    public function search(Request $request, SubCategory $subcategories)
    {

        $requestAll = array_except($request->toArray(), ['submit', '_token', 'page']);

        $query = DB::table('subcategories')->select('*');
        $array = [];
        $count = count($requestAll);
        $i = 0;

    }

}
