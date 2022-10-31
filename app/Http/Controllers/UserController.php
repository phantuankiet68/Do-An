<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class UserController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }
    public function showUser()
    {
        $this->AuthLoGin();
        $all_user = DB::table('tbl_user')->orderby('user_id','asc')->get();
    	$menage_user = view('admin.user')->with('all_user',$all_user);
    	return view('admin_layout')->with('admin.all_user',$menage_user);
    }
    public function inforUser($user_id)
    {
        $this->AuthLoGin();
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $infor_user = DB::table('tbl_user')->where('user_id',$user_id)->get();
        $menage_user = view('admin.inforUser')->with('infor_user',$infor_user)->with('category',$category);
    	return view('admin_layout')->with('admin.inforUser',$menage_user);
    }
    public function addUser()
    {
        $this->AuthLoGin();
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        return view('admin.addUser')->with('category',$category);
    }
    public function saveUser(Request $request)
    {
    	$data = array();
    	$data['category_id'] = $request->user_category_id;
        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_password'] = $request->user_password;
        $data['user_phone'] = $request->user_phone;
        $data['user_facebook'] = $request->user_facebook;
        $data['user_content'] = $request->user_content;
        $data['user_local'] = $request->user_local;
        $get_img = $request->file('user_image',);
     
        if($get_img){
            $get_name_image = $get_img->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,300).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/back-end/upload/user',$new_img);
            $data['user_image'] = $new_img;
            DB::table('tbl_user')->insert($data);
            session::put('message_user','Thêm thành viên thành công!!');
            return Redirect::to('list-user');
        }
    	$data['user_image'] = '';
    	DB::table('tbl_user')->insert($data);
    	session::put('message-user','Thêm thành viên thành công!!');
        return Redirect::to('Add-user');

    }
    public function editUser($user_id){
        $this->AuthLoGin();
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $edit_user = DB::table('tbl_user')->where('user_id',$user_id)->get();
        $menage_user = view('admin.editUser')->with('edit_user',$edit_user)->with('category',$category);
    	return view('admin_layout')->with('admin.editUser',$menage_user);
    }
    public function updateUser(Request $request,$user_id){
        $data = array();
    	$data['category_id'] = $request->user_category_id;
        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_password'] = $request->user_password;
        $data['user_phone'] = $request->user_phone;
        $data['user_facebook'] = $request->user_facebook;
        $data['user_content'] = $request->user_content;
        $data['user_local'] = $request->user_local;
        $get_img = $request->file('user_image',);

        if($get_img){
            $get_name_image = $get_img->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_img = $name_image.rand(0,300).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/back-end/upload/user',$new_img);
            $data['user_image'] = $new_img;
            DB::table('tbl_user')->where('user_id',$user_id)->update($data);
            session::put('message_user','Thêm thành viên thành công!!');
            return Redirect::to('list-user');
        }
       
        $data['user_image'] = '';
    	DB::table('tbl_user')->where('user_id',$user_id)->update($data);
    	session::put('message-user','Thêm thành viên thành công!!');
        return Redirect::to('list-user');

    }
    public function deleteUser($user_id){
        DB::table('tbl_user')->where('user_id',$user_id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-user');
    }
}
