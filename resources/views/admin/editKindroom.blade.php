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
                            @foreach($edit_kindroom as $key => $kindroom)
                            <form role="form" action="{{URL::to('/update-kindroom/'.$kindroom->kindroom_id)}}" method="POST" id="manage-supplier">
                            {{csrf_field()}}  
                                <div class="card">
                                    <div class="card-header">
                                            Sửa loại thành viên
                                    </div>
                                        <div class="card-body">
                                                <div class="form-group">
                                                    <label class="control-label">Tên thành viên</label>
                                                    <input type="text" class="form-control" name="kindroom_name" value="{{$kindroom->kindroom_name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mô tả</label>
                                                    <textarea name="kindroom_desc" id="address" cols="30" rows="4" class="form-control">
                                                    {{$kindroom->kindroom_desc}}
                                                    </textarea>
                                                </div>
                                        </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                                                <a href="{{URL::to('/list-kindroom')}}" class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endforeach
                        </div>
                        <!-- FORM Panel -->

                        <!-- Table Panel -->
                        

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
