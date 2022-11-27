@extends('admin.layouts.app')
@section('title','Danh sách bài viết ')
@section('main-content')
    


    <section class="content-header">
        <h1>
            Danh sách bài viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">News (modules)</a></li>
            <li class="active">posts</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header border">

                <form action="" method="get" class="form-inline">
                    <input type="text" class="form-control"  placeholder=" Tên bài  viết tìm kiếm " autocomplete="off" name="title"  value="{{ Request::get('title') }}" style="width: 80%;margin:5px 0"/>
                    <div class="" style="margin-top: 5px;display: inline-block">
                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-search"></i> Tìm kiếm </button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Làm mới </a>
                    </div>
                    <label class="radio-box">Hiển thị
                        <input type="radio"  name="active" value="1" {{ Request::get('active') == 1 ? "checked=''" : "" }}>
                        <span class="checkmark"></span>
                    </label>
                    <label class="radio-box"> Không hiển thị
                        <input type="radio" name="active" value="2" {{ Request::get('active') == 2 ? "checked=''" : "" }}>
                        <span class="checkmark"></span>
                    </label>
                    <label class="radio-box"> Bài viết hót
                        <input type="radio" name="hot" value="1" {{ Request::get('hot') == 1 ? "checked=''" : "" }}>
                        <span class="checkmark"></span>
                    </label>
                    <label class="radio-box"> Không hot
                        <input type="radio" name="hot" value="2" {{ Request::get('hot') == 2 ? "checked=''" : "" }}>
                        <span class="checkmark"></span>
                    </label>
                    <select name="paginate" id="" class="form-control" style="width:20%;margin-left: 10px;">
                        <option value="">--  Số bản ghi hiển thị  --</option>
                        <option value="5" {{ Request::get('paginate') == 5 ? "selected='selected'" : "" }}>5</option>
                        <option value="10" {{ Request::get('paginate') == 10 ? "selected='selected'" : "" }}>10</option>
                        <option value="20" {{ Request::get('paginate') == 20 ? "selected='selected'" : "" }}>20</option>
                        <option value="100" {{ Request::get('paginate') == 100 ? "selected='selected'" : "" }}>100</option>
                    </select>
                    <div class="input-group date" data-provide="datepicker">

                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input type="text" class="form-control" data-date-format="Y-m-d" placeholder="Lọc thời gian">
                    </div>
                    <div class="" style="margin-top: 5px;display: inline-block">
                        <a href="{{ route('admin.posts.add') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Thêm mới </a>
                    </div>
                </form>
            </div>
            @include('admin.notification.index')
            <div class="box-body border mr-t-10">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr class="bg-tr">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Hot</th>
                                <th>Category</th>
                                <th>Content</th>
                                <th>Info</th>
                                <th>Action</th>
                            </tr>
                            @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td> {{ $item->po_title }}</td>
                                    <td>{!! renderHot(route('admin.posts.hot',$item->id),$item->po_hot) !!}</td>
                                    <td>{{ $item->name_category ?? "" }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success view-detail-post" data-id="{{ $item->id }}"> Click xem nội dung </a>
                                    </td>
                                    <td>
                                        <ul style="list-style: none;padding-left: 0;margin-bottom: 0">
                                            <li><span style="display: inline-block;width: 23%">Auth</span> <span class="label label-danger"> {{ $item->name }}</span></li>
                                            <li><span style="display: inline-block;width: 23%">Active :</span>  {!! renderActive(route('admin.posts.active',$item->id),$item->po_active) !!}</li>
                                            <li><span>Thứ tự</span> {{  $item->po_sort }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        {!! renderBtnEdit(route('admin.posts.edit',$item->id)) !!}
                                        {!! renderBtnDelete(route('admin.posts.delete',$item->id)) !!}
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {!! renderPaginate($posts,$finter) !!}
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <div class="modal fade custome-modal" id="modal-view-posts"></div>
@endsection

