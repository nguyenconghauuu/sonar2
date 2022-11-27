@extends('admin.layouts.app')
@section('title','Danh sách đề thi  ')
@section('main-content')
    <section class="content-header">
        <h1>
            Danh sách đề thi
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">News (modules)</a></li>
            <li class="active">Categorys</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header border">
                <div class="" style="margin-top: 5px;display: inline-block">
                    {{--<a href="{{ route('choices.add') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Thêm mới </a>--}}
                </div>
            </div>
            @include('admin.notification.index')
            <div class="box-body border mr-t-10">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th> Mã Đề </th>
                            <th> Cấp độ</th>
                            <th>Action</th>
                        </tr>
                        @foreach($exams as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td> {{ $item->e_code }}</td>
                                <td> {{ $item->e_level }}</td>
                                <td>
                                    {!! renderBtnDelete(route('choices.delete',$item->id)) !!}
                                    <a href="{{ route('list.exams',$item->id) }}" class="custome-btn btn-xs btn-success"> Danh Sách Câu Hỏi </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <div class="box-footer">
            {!! renderPaginate($exams) !!}
        </div>
        <!-- /.box -->

    </section>
@endsection