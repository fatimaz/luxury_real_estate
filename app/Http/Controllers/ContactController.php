<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Datatables;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Redirect;


class ContactController extends Controller
{

    public function index(){
        return view('admin.contact.index');
    }
    public function store(ContactRequest $request,ContactUs $contact){
        $contact->create($request->all());
        return Redirect::back()->withFlashMessage('Message was sent successfully');

    }

    public function edit($id,ContactUs $contactUs){

        $contact= $contactUs->find($id);
        $contact->fill(['view'=> 1])->save();
        return view('admin.contact.edit',compact('contact'));
    }

    public function update($id,ContactUs $contactUs,ContactRequest $request){

        $contactupdated= $contactUs->find($id);
        $contactupdated->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('Message was updated successfully');;
    }

    public function destroy($id)
    {
        $cont = ContactUs::find($id);
        $cont->delete();
        return redirect('/adminpanel/contact')->withFlashMessage('Message is deleted successfuly');
    }


    public function anyData(ContactUs $contact)
    {

        $contacts = $contact->all();

        return Datatables::of($contacts)

            ->editColumn('contact_name', function ($model) {
                return ['<a href="'.url('/adminpanel/contact/' . $model->id . '/edit').'">'.$model->contact_name.'</a>'];
            })
            ->editColumn('contact_email', function ($model) {
                return ['<a href="'.url('/adminpanel/contact/' . $model->id . '/edit').'">'.$model->contact_email.'</a>'];
            })


            ->editColumn('view', function ($model) {
                return [$model->view==0 ? '<span class="badge badge-info">' . ' new message ' . '</span>' : '<span class="badge badge-warning">' . 'old message' . '</span>'];


//                    ['<a href="'.url('/adminpanel/bu/' . $model->id).'"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>'];
            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/contact/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                 $all .= '<a href="' . url('/adminpanel/contact/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';

                return [$all];
            })
            ->make(true);
    }
}
