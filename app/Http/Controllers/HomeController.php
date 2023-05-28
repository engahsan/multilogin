<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function approvalList()
    {
        $data['lists'] = User::where('status', 0)->get(); 
        return view('approvalList', $data);
    }

    public function changeStatus($id, $status) {

        if(!User::where('id',$id)->exists()){
            Toastr::error('',__('cmn.data_not_found'));
            return redirect()->back(); 
        }

        try {

            // dd($status);
            $user = User::find($id);
            $user->status = $status;
            $user->save();

            // Toastr::success('',__('cmn.successfully_updated'));
            return redirect()->back();
            
        } catch (\Exception $e) {
            // Toastr::error('',__('cmn.did_not_updated'));
            return redirect()->back();
        }

    }
}
