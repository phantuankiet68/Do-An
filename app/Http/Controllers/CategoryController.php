<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
{
    public function AuthLoGin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('category');
        }
        else{
             return Redirect::to('admin')->send();
        }
    }
    public function showCategory()
    {
        $this->AuthLoGin();
    	$category = DB::table('tbl_category')->get();
    	$menageCategory = view('admin.category')->with('category',$category);
    	return view('admin_layout')->with('admin.category',$menageCategory);
    }

    public function saveCategory(Request $request)
    {
        $this->AuthLoGin();
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_desc'] = $request->category_desc;
    	
    	DB::table('tbl_category')->insert($data);
    	session::put('messages','Thêm danh mục thành công!!');
        return Redirect::to('list-category');

    }
    public function editCategory($category_id){
        $this->AuthLoGin();
        $category = DB::table('tbl_category')->orderby('category_id','desc')->get();
        $edit_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
        $menage_category = view('admin.editCategory')->with('edit_category',$edit_category)->with('category',$category);
    	return view('admin_layout')->with('admin.editCategory',$menage_category);
    }

     public function updateCategory(Request $request,$category_id){
        $this->AuthLoGin();
     	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_desc'] = $request->category_desc;

    	DB::table('tbl_category')->where('category_id',$category_id)->update($data);
    	session::put('update','Cập nhật danh mục thành công!!');
        return Redirect::to('list-category');
     }
    public function deleteCategory($category_id){
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
    	session::put('delete','Xóa danh mục thành công!!');
        return Redirect::to('list-category');
    }



    //end function
    public function show_work_home($work_id){
        $work = DB::table('tbl_work')->orderby('work_id','desc')->get();

        $work_by_id = DB::table('tbl_member')->join('tbl_work','tbl_member.work_id','=','tbl_work.work_id')->where('tbl_work.work_id',$work_id)->get();
        return view('pages.show_work')->with('work',$work)->with('work_by_id',$work_by_id);
    }
}
