@extends('admin.layouts.app')
@section('title','Danh sách slide  ')
@section('main-content')
    <section class="content-header">
        <h1>
            Danh sách slide website
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
            <div class="box-header with-border">
                <a href="{{ route('admin.slides.add') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Thêm mới </a>
            </div>
            @include('admin.notification.index')
            <div class="box-body border mr-t-10">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th> Tiêu đề </th>
                            <th> Link web</th>
                            <th> Hình ảnh </th>
                            <th>Action</th>
                        </tr>
                        @foreach($slides as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td> {{ $item->title }}</td>
                                <td><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td>
                                <td>
                                    <img src="/uploads/{{ $item->images }}" alt="" class="img img-responsive" style="width: 80px;height: 80px;">
                                </td>
                                <td>
                                    {!! renderBtnEdit(route('admin.slides.edit',$item->id)) !!}
                                    {!! renderBtnDelete(route('admin.slides.delete',$item->id)) !!}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.box -->
    </section>
@endsection