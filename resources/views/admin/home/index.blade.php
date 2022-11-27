@extends('admin.layouts.app')
@section('title',' Trang quản trị admin  ')
@section('main-content')
    <section class="content-header">
        <h1>
            Trang quản trị admin
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

            </div>

        </div>
        <!-- /.box -->
    </section>
@endsection