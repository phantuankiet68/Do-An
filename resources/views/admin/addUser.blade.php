@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
        <div class="row">
                <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel panel-default">
                                 <div class="panel-heading">
                                   <marquee>
                                     <p style="color:red">Chào mừng bạn đến với trang thêm thành viên</p>
                                   </marquee>
                               </div>
                           </div>
                            <div class="panel-body">
                            <?php
                                 $message_member = Session::get('message-user');
                                 if ($message_member) {
                                    echo '<span style="padding-left:230px" class="message-text">'.$message_member.'</span>';
                                    Session::get('message_member',null);
                                 }
                            ?>
                                <div class="position-center">
                                    <form role="form" action="{{URL::to('/save-user')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}} 
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên Thành Viên</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên thành viên" name="user_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email" name="user_email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mật khẩu</label>
                                            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="password" name="user_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Số điện thoại</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại" name="user_phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Facebook</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="facebook" name="user_facebook">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Đia chỉ</label>
                                            <textarea style="resize: none" rows="3" class="form-control" id="exampleInputPassword1" placeholder="Địa chỉ" name="user_local"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả Thành Viên</label>
                                            <textarea style="resize: none" rows="8" class="form-control" id="editor3" placeholder="Mô tả danh mục" name="user_content"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputFile">Hình ảnh</label>
                                            <input name="user_image" type="file" id="exampleInputFile">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Nhóm ngành nghề</label>
                                                <select name="user_category_id" class="form-control m-bot15">
                                                @foreach($category as $key => $cate)
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" name="Add-User" class="btn btn-info">Thêm Thành Viên</button>
                                        <a name="Add-User" class="btn btn-warning">Trở lại</a>
                                    </form>
                                </div>
                            </div>
                        </section>
                </div>
        </div>
            
    </div>
    @endsection