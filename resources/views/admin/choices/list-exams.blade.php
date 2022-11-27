@extends('admin.layouts.app')
@section('title','Danh sách bộ câu   ')
@section('main-content')
    <style>
        .active {
            color: red !important;
        }
    </style>
    <section class="content-header">
        <h1>
            Danh sách đề thi có mã đề : <span class="label-danger label"> {{ $infoEx->e_code}}</span>
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
                    <span> Có tổng số  <span class="label label-info">{{ $listExams->count() }}</span> câu hỏi | </span>
                    <a href="{{ route('choices.index') }}" class="btn btn-xs btn-danger"><i class="fa fa-plus"></i> Trở về </a>
                </div>
            </div>
            @include('admin.notification.index')
            <div class="box-body border mr-t-10">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th> STT </th>
                            <th> Câu hỏi </th>
                            <th> Mức độ </th>
                            <th> Câu hỏi  </th>
                            <th>Action</th>
                        </tr>

                        @foreach($listExams as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td> {!! $item->qs_name !!}</td>
                                <td>
                                     {{ showMucDo($item->qs_level) }}
                                </td>
                                <td>
                                    <ul style="list-style: none;padding-left: 0;margin-bottom: 0">
                                        <li class="{{ $item->qs_answer_true == 'qs_answer1' ? 'active' : '' }}"> 1.1 - {{ $item->qs_answer1  }}</li>
                                        <li class="{{ $item->qs_answer_true == 'qs_answer2' ? 'active' : '' }}"> 1.2 - {{ $item->qs_answer2  }}</li>
                                        @if($item->qs_answer3)
                                            <li class="{{ $item->qs_answer_true == 'qs_answer3' ? 'active' : '' }}"> 1.5 - {{ $item->qs_answer3  }}</li>
                                        @endif
                                        @if($item->qs_answer4)
                                            <li class="{{ $item->qs_answer_true == 'qs_answer4' ? 'active' : '' }}"> 1.5 - {{ $item->qs_answer4  }}</li>
                                        @endif
                                        @if($item->qs_answer5)
                                            <li class="{{ $item->qs_answer_true == 'qs_answer5' ? 'active' : '' }}"> 1.5 - {{ $item->qs_answer5  }}</li>
                                        @endif

                                    </ul>
                                </td>
                                <td>
                                    {{--{!! renderBtnDelete(route('choices.delete',$item->id)) !!}--}}
                                    {{--<a href="{{ route('create.list.exams',$item->id) }}" class="custome-btn btn-xs btn-success"> Tạo câu hỏi </a>--}}
                                    {{--<a href="{{ route('list.exams',$item->id) }}" class="custome-btn btn-xs btn-success"> Danh Sách Câu Hỏi </a>--}}
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