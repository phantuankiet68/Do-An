@extends('admin_layout')
@section('admin_content')
    <div class="gallery">
        <div class="panel panel-default">
           <div class="panel-heading">
               <marquee>
                 <p style="color:red">Chào mừng bạn đến với trang!! Chúc bạn có một ngày làm việc vui vẻ</p>
               </marquee>
           </div>
           <div class="row w3-res-tb">
          <div class="col-sm-4 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
          </div>

          <div class="col-sm-5">
                <section class="panel">
                    <div class="panel-body">
                        <div class="position-center ">
                            <div class="text-center">
                                <a  href="{{URL::to('/add-user')}}" class="btn btn-success">
                                    Thêm mới
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
          </div>
          
        </div>
        </div>
        <div class="gallery-grids">
                <div class="gallery-top-grids">
                @foreach($all_user as $key => $user)
                    <div class="col-sm-4 gallery-grids-left">
                        <div class="gallery-grid">
                            <a id="button"  class="example-image-link" data-lightbox="example-set" data-title="">
                                <img src="public/back-end/upload/user/{{$user->user_image}}" wight="200px" height="200px"  alt="" />
                                <div class="captn">
                                    <h4>Họ và tên: {{$user->user_name}}</h4>
                                    <p>Email: {{$user->user_email}}</p>
                                    <p>Điện thoại:0{{$user->user_phone}}</p>
                                    <p>facebook:{{$user->user_facebook}}</p>
                                    <a href="{{URL::to('/edit-user/'.$user->user_id)}}" name="" class=" btn btn-space btn-info">Sửa</a>
                                    <a  onclick="return confirm('Bạn có chắc là muốn xóa người dùng này?')" href="{{URL::to('/delete-user/'.$user->user_id)}}" class=" btn btn-info">Xóa</a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"> </div>
        </div>
@endsection