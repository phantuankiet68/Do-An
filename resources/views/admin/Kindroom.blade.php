@extends('admin_layout')
@section('admin_content')
<div class="gallery">
        <div class="panel panel-default">
           <div class="panel-heading">
               <marquee>
                 <p style="color:red">Chào mừng bạn đến với trang!! Chúc bạn có một ngày làm việc vui vẻ</p>
               </marquee>
           </div>
        </div>
          <main id="view-panel" > 
            <div class="container-fluid">
                
                <div class="col-lg-12">
                    <div class="row">
                        <!-- FORM Panel -->
                        <div class="col-md-4">
                        <form role="form" action="{{URL::to('/save-kindroom')}}" method="POST" id="manage-supplier">
                        {{csrf_field()}}  
                            <div class="card">
                                <div class="card-header">
                                        Thêm loại phòng
                                </div>
                                    <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label">Tên loại phòng</label>
                                                <input type="text" class="form-control" name="kindroom_name">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Mô tả loại phòng</label>
                                                <textarea name="kindroom_desc" id="address" cols="30" rows="4" class="form-control"></textarea>
                                            </div>
                                    </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                                            <button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <!-- FORM Panel -->

                        <!-- Table Panel -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <b>Danh sách danh mục</b>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Stt</th>
                                                <th class="text-center">Mô tả</th>
                                                <th class="text-center">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kindroom as $key => $kindroom)
                                            <tr>
                                                <td style= "color: #707070;"class="text-center">{{$kindroom->kindroom_id}}</td>
                                                <td >
                                                    <p>Name: <b>{{$kindroom->kindroom_name}}</b></p>
                                                    <p><small>Mô tả: <b>{{$kindroom->kindroom_desc}}</b></small></p>
                                                </td>
                                                <td class="text-center">
                                                    <a style="margin-right:10px" href="{{URL::to('/edit-kindroom/'.$kindroom->kindroom_id)}}" class="btn btn-sm btn-primary edit_supplier" id="button" >Edit</button>
                                                    <a class="btn btn-sm btn-danger delete_supplier" onclick="return confirm('Bạn có chắc là muốn xóa danh mục này?')" href="{{URL::to('/delete-kindroom/'.$kindroom->kindroom_id)}}"  >
                                                        Delete
                                                    </a>
                                               </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <footer class="panel-footer">
                              <div class="row">
                                <div class="col-sm-7 text-right text-center-xs">                
                                  <ul class="text-center pagination pagination-sm m-t-none m-b-none">
                                    <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                    <li><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">4</a></li>
                                    <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                                  </ul>
                                </div>
                              </div>
                            </footer>
                        </div>

                        <!-- Table Panel -->
                    </div>
                </div>  

            </div>

            <style>
                
                td{
                    vertical-align: middle !important;
                }
                td p {
                    margin:unset;
                }
            </style>
        </main>
    </div>
   
@endsection