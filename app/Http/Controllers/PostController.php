<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PostController extends Controller
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
    public function add_post()
    {
    	$this->AuthLoGin();
    	return view('admin.addPost');

    }
     public function showPost()
    {
        $this->AuthLoGin();
        $all_post = DB::table('tbl_post')->get();
    	$menage_post = view('admin.post')->with('all_post',$all_post);
    	return view('admin_layout')->with('admin.post',$menage_post);
    }
     public function save_post(Request $request)
    {
    	$data = array();
        $data['post_title'] = $request->post_title;
        $data['post_desc'] = $request->post_desc;
        $data['post_content'] = $request->post_content;
        $data[''] = $request->post_meta_dest;
        $get_image = $request->file('post_image',);
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,300).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/member',$new_image);
            $data['post_image'] = $new_image;
            
            DB::table('tbl_post')->where('post_id',$post_id)->insert($data);
            session::put('message_post','Cập nhật thành viên thành công!!');
            return Redirect::to('add-post');
        }
    	$data['post_image'] = '';
    	DB::table('tbl_post')->insert($data);
    	session::put('message1','Thêm thành viên thành công!!');
        return Redirect::to('add-post');

    }
     public function edit_post($post_id){
        $this->AuthLoGin();
        $edit_post = DB::table('tbl_post')->where('post_id',$post_id)->get();
        $menage_post = view('admin.edit_post')->with('edit_post',$edit_post);
    	return view('admin_layout')->with('admin.edit_post',$menage_post);
    }
    public function update_post(Request $request,$post_id){
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['post_desc'] = $request->post_desc;
        $data['post_content'] = $request->post_content;
        $data['post_meta_dest'] = $request->post_meta_dest;
        $get_image = $request->file('post_image',);
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,300).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/member',$new_image);
            $data['post_image'] = $new_image;
            
            DB::table('tbl_post')->where('post_id',$post_id)->update($data);
            session::put('message_post','Cập nhật thành viên thành công!!');
            return Redirect::to('all-post');
        }
    	$data['post_image'] = '';
    	DB::table('tbl_post')->where('post_id',$post_id)->update($data);
    	session::put('update','Cập nhật danh mục thành công!!');
        return Redirect::to('all-post');

     }
     public function delete_post($post_id){
        DB::table('tbl_post')->where('post_id',$post_id)->delete();
    	session::put('update','Xóa danh mục thành công!!');
        return Redirect::to('all-post');
    }

}
