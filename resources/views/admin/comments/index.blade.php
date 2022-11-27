@extends('admin.layouts.app')
@section('title','Danh sách bình luận  ')
@section('main-content')
    <section class="content-header">
        <h1>
            Danh sách bình luận
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

            @include('admin.notification.index')
            <div class="box-body border mr-t-10">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th> Tên </th>
                            <th> Email</th>
                            <th> Nội Dung </th>
                            <th>Action</th>
                        </tr>
                        @foreach($comments as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td> {{ $item->cmt_name }}</td>
                                <td> {{ $item->cmt_email }}</td>
                                <td> {{ $item->cmt_content }}</td>
                                <td>
                                    {!! renderBtnDelete(route('admin.comments.delete',$item->id)) !!}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <div class="box-footer">
            {!! renderPaginate($comments) !!}
        </div>
        <!-- /.box -->

    </section>
@endsection