@extends('admin.layouts.app')
@section('title',' Thông tin và cấu hình gủi gmail website ')
@section('main-content')
    <style type="text/css">
       
    </style>
     <section class="content-header">
        <h1>
            Thông tin và cấu hình gủi gmail website 
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                
                <!-- /. box -->
                
                <!-- /.box -->
                 @include('admin.layouts.inc_left_email')
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    @include('admin.notification.index')
                    
                        <div class="box-header with-border">
                            <h3 class="box-title"> Danh sách gmail  </h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                             <form action="" method="get" class="form-inline">
                                <input type="text" class="form-control"  placeholder=" Tên email " name="e_email"  value="{{ Request::get('e_email') }}" style="width: 30%;margin:5px 0;display: inline;"/>
                            
                                <select name="paginate" id="" class="form-control" style="width:20%;margin-left: 10px;display: inline;">
                                    <option value="">--  Số bản ghi hiển thị  --</option>
                                    <option value="5" {{ Request::get('paginate') == 5 ? "selected='selected'" : "" }}>5</option>
                                    <option value="10" {{ Request::get('paginate') == 10 ? "selected='selected'" : "" }}>10</option>
                                    <option value="20" {{ Request::get('paginate') == 20 ? "selected='selected'" : "" }}>20</option>
                                    <option value="100" {{ Request::get('paginate') == 100 ? "selected='selected'" : "" }}>100</option>
                                </select>
                               
                                <div class="" style="margin-top: 5px;display: inline;">
                                    <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-search"></i> Tìm kiếm </button>
                                    <a href="{{ route('admin.gmail.index') }}" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i> Làm mới </a>
                                    <a href="{{ route('admin.gmail.add') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Thêm mới </a>
                                </div>
                            </form>
                            <table class="table table-striped table-hover border">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="hg">Stt</th>
                                        <th rowspan="2" class="hg">Email</th>
                                        <th rowspan="2" class="hg">Drive</th>
                                        <th rowspan="2" class="hg">Post</th>
                                        <th rowspan="2" class="hg">Pass</th>
                                        <th colspan="2" style="border:1px solid #f4f4f4;text-align: center;">Action</th>
                                    </tr>
                                    <tr >
                                        <th style="text-align: center;">Edit</th>
                                        <th style="text-align: center;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listgmails as $k => $item)
                                        <tr>
                                            <td>{{  $k + 1 }}</td>
                                            <td>{{  $item->e_email }}</td>
                                            <td>{{  $item->e_drive }}</td>
                                            <td>{{  $item->e_post }}</td>
                                            <td>{{  $item->e_password }}</td>
                                            <td style="text-align: center;"> 
                                                 {!! renderBtnEdit(route('admin.gmail.edit',$item->id)) !!}
                                             </td>
                                            <td style="text-align: center;"> 
                                                {!! renderBtnDelete(route('admin.gmail.delete',$item->id)) !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="text-center">
                                {!! renderPaginate($listgmails,$finter) !!}
                            </div>
                        </div>
                   
                    <!-- /.box-footer -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection