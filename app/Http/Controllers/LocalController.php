<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class LocalController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('list-local');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }
    public function showLocal()
    {
        $this->AuthLoGin();
    	$local = DB::table('tbl_local')->get();
    	$menagelocal = view('admin.local')->with('local',$local);
    	return view('admin_layout')->with('admin.local',$menagelocal);
    }

    public function saveLocal(Request $request)
    {
        $this->AuthLoGin();
    	$data = array();
    	$data['local_name'] = $request->local_name;
    	$data['local_desc'] = $request->local_desc;
    	
    	DB::table('tbl_local')->insert($data);
    	session::put('messages','Thêm danh mục thành công!!');
        return Redirect::to('list-local');

    }
    public function editLocal($local_id){
        $this->AuthLoGin();
        $local = DB::table('tbl_local')->orderby('local_id','desc')->get();
        $edit_local = DB::table('tbl_local')->where('local_id',$local_id)->get();
        $menage_local = view('admin.editlocal')->with('edit_local',$edit_local)->with('local',$local);
    	return view('admin_layout')->with('admin.editlocal',$menage_local);
    }

     public function updateLocal(Request $request,$local_id){
        $this->AuthLoGin();
     	$data = array();
    	$data['local_name'] = $request->local_name;
    	$data['local_desc'] = $request->local_desc;

    	DB::table('tbl_local')->where('local_id',$local_id)->update($data);
    	session::put('update','Cập nhật danh mục thành công!!');
        return Redirect::to('list-local');
     }
    public function deleteLocal($local_id){
        DB::table('tbl_local')->where('local_id',$local_id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-local');
    }



  
}
