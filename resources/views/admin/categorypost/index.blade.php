@extends('admin.layouts.app')
@section('title','Danh sách danh mục bài viết ')
@section('main-content')
    <section class="content-header">
        <h1>
            Danh sách danh mục bài viết         </h1>
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
                <a href="{{ route('admin.categorypost.add') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Thêm mới </a>
            </div>
            @include('admin.notification.index')
            <div class="box-body">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Hot</th>
                                <th>Thứ tự</th>
                                <th>Action</th>
                            </tr>
                            @if($sortCategoryPost && count($sortCategoryPost) > 0)
                                @foreach($sortCategoryPost as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><?php for($i = 0; $i < $item->level; $i ++) echo ' |--- '; ?> {{ $item->cpo_name }}</td>
                                        <td>{!! renderHot(route('admin.categorypost.hot',$item->id),$item->cpo_hot) !!}</td>
                                        <td>{{ $item->cpo_sort }}</td>
                                        <td>
                                            {!! renderBtnEdit(route('admin.categorypost.edit',$item->id)) !!}
                                            {!! renderBtnDelete(route('admin.categorypost.delete',$item->id)) !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.box -->
    </section>
@endsection