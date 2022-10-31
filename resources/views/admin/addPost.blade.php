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
                                 $message_member = Session::get('message-post');
                                 if ($message_member) {
                                    echo '<span style="padding-left:230px" class="message-text">'.$message_member.'</span>';
                                    Session::get('message_member',null);
                                 }
                            ?>
                                <div class="position-center">
                                    <form role="form" action="{{URL::to('/save-post')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}} 
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">chủ đề bài viết</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên thành viên" name="post_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả Thành Viên</label>
                                            <textarea style="resize: none" rows="8" class="form-control" id="editor3" placeholder="Mô tả danh mục" name="post_desc"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputFile">Hình ảnh</label>
                                            <input name="post_image" type="file" id="exampleInputFile">
                                            <p class="help-block"></p>
                                        </div>
                                        
                                        
                                        <button type="submit" name="Add-post" class="btn btn-info">Thêm Thành Viên</button>
                                        <a name="Add-post" class="btn btn-warning">Trở lại</a>
                                    </form>
                                </div>
                            </div>
                        </section>
                </div>
        </div>
            
    </div>
    @endsection