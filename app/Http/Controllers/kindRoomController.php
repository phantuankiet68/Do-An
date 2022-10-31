<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class kindRoomController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('Kindroom');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }
    public function showKindroom()
    {
        $this->AuthLoGin();
    	$kindroom = DB::table('tbl_kindroom')->get();
    	$menageKindroom = view('admin.kindroom')->with('kindroom',$kindroom);
    	return view('admin_layout')->with('admin.kindroom',$menageKindroom);
    }
    public function saveKindroom(Request $request)
    {
        $this->AuthLoGin();
    	$data = array();
    	$data['kindroom_name'] = $request->kindroom_name;
    	$data['kindroom_desc'] = $request->kindroom_desc;
    	
    	DB::table('tbl_kindroom')->insert($data);
    	session::put('messages','Thêm danh mục thành công!!');
        return Redirect::to('list-kindroom');

    }
    public function editKindroom($kindroom_id){
        $this->AuthLoGin();
        $kindroom = DB::table('tbl_kindroom')->orderby('kindroom_id','desc')->get();
        $edit_kindroom = DB::table('tbl_kindroom')->where('kindroom_id',$kindroom_id)->get();
        $menage_kindroom = view('admin.editKindroom')->with('edit_kindroom',$edit_kindroom)->with('kindroom',$kindroom);
    	return view('admin_layout')->with('admin.editKindroom',$menage_kindroom);
    }

     public function updateKindroom(Request $request,$kindroom_id){
        $this->AuthLoGin();
     	$data = array();
    	$data['kindroom_name'] = $request->kindroom_name;
    	$data['kindroom_desc'] = $request->kindroom_desc;

    	DB::table('tbl_kindroom')->where('kindroom_id',$kindroom_id)->update($data);
    	session::put('update','Cập nhật danh mục thành công!!');
        return Redirect::to('list-kindroom');
     }
    public function deleteKindroom($kindroom_id){
        DB::table('tbl_kindroom')->where('kindroom_id',$kindroom_id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-kindroom');
    }



    //end function
    public function show_work_home($work_id){
        $work = DB::table('tbl_work')->orderby('work_id','desc')->get();

        $work_by_id = DB::table('tbl_member')->join('tbl_work','tbl_member.work_id','=','tbl_work.work_id')->where('tbl_work.work_id',$work_id)->get();
        return view('pages.show_work')->with('work',$work)->with('work_by_id',$work_by_id);
    }
}
