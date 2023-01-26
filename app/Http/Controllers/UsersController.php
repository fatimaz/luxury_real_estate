<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddUserRequestAdmin;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Item;
use Yajra\Datatables\Datatables;




class UsersController extends Controller
{
    public function index(){

        return view('admin.user.index');
    }
    public function create(){
        return view('admin.user.add');
    }

    public function store(AddUserRequestAdmin $request, User $user)
    {
         $user::create([
            'name' => $request-> name,
            'lastname' => $request->lastname,
             'admin' => $request->admin,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
         return redirect('/adminpanel/users')->withFlashMessage('Member is added successfuly');
    }
    public function edit($id, Item $bu){

        $user= User::find($id);
        $buw= $bu->where('user_id', $id)->where('status',1)->get();
        $bun= $bu->where('user_id', $id)->where('status',0)->get();
        return view('admin.user.edit',compact('user','buw','bun'));
    }
    public function update( $id,UserUpdateRequest $request){
        $userupdated= User::find($id);
        $userupdated->name= $request->input('name');
        $userupdated->lastname= $request->input('lastname');
        $userupdated->email= $request->input('email');
        $userupdated->save();

        return redirect('/adminpanel/users')->withFlashMessage('Member is updated successfuly');

    }
    public function show(){}
    public function updatePass(Request $request, User $user){
        $userUpdate= $user->find($request->user_id);
        $password = bcrypt($request->password);
        $userUpdate->fill(['password'=> $password])->save();

        return redirect('/adminpanel/users')->withFlashMessage('Password is updated successfuly');
    }
    public function destroy($id , User $user){

        if($id != 1){
            $user->find($id)->delete();
            Item::where('user_id', $id)->delete();
           return redirect('/adminpanel/users')->withFlashMessage('Member is deleted successfuly');
        }else{
            return redirect('/adminpanel/users')->withFlashMessage('you can not delete admin');
        }
    }

    public function anyData(User $user)
    {

        $users = $user->all();

        return Datatables::of($users)

            ->editColumn('name', function ($model) {
                return ['<a href="'.url('/adminpanel/users/' . $model->id . '/edit').'">'.$model->name.'</a>'];
            })
            ->editColumn('admin', function ($model) {
                return [$model->admin == 0 ? '<span class="badge badge-info">' . 'User' . '</span>' : '<span class="badge badge-warning">' . 'Admin' . '</span>'];
            })


            ->editColumn('mybu', function ($model) {
                return ['<a href="'.url('/adminpanel/bu/' . $model->id).'"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>'];
            })

            ->editColumn('control', function ($model) {
              $all = '<a href="' . url('/adminpanel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
               // $all = "<a href='{{url("/adminpanel/users/" .$model->id . '/edit') }}' class='btn btn-info btn-circle'><i class='fa fa-edit'></i></a>";

                if($model->id != 1){

                    $all .= '<a href="' . url('/adminpanel/users/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
                }
                return [$all];
            })
            ->make(true);

    }

    public function usereditInfo(){
        $user = Auth::user();
        return view('web.profile.edit',compact('user'));
        }

    public function userUpdateProfile(UserUpdateRequest $request, User $users){

        $user = Auth::user();
        if($request->email != $user->email) {
            $checkmail = $users->where('email' , $request->email)->count();
            if($checkmail == 0){
                $user->fill($request->all())->save();
            }else {
                return Redirect::back()->withFlashMessage('This email is already exist plz use other email');
            }

        }else{

            $user ->fill(['name'=> $request->name])->save();
        }

        return Redirect::back()->withFlashMessage('info updated successfuly');
    }
}
