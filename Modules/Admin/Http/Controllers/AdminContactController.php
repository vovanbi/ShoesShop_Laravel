<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        $viewData= [
            'contacts' => $contacts,
        ];
        return view('admin::contact.index',$viewData);
    }
    public function action($action,$id)
    {
        if($action)
        {
            $contact = Contact::find($id);
            switch ($action)
            {
                case 'status':
                    $contact->c_status = $contact->c_status ? 0 : 1;
                    $contact->save();
                    break;
                case 'delete':
                    $contact->delete();
                    break;
            }
        }
        return redirect()->back();
    }
}
