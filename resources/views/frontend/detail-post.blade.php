@include('frontend.layouts.inc_header')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=967276326757532&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <section style="background-color: #f1f1f16e;margin-bottom: 100px;">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-3" id="fix-left" style="border: 1px solid #dedede;position: fixed;background-color: white">
                    <div id="sidebar" style="">
                        <ul style="padding-left: 10px;list-style: none;height: 600px;overflow-y:auto; overflow-x:hidden;" id="ul-sidebar">
                            @if( count($CategoryChildrens) > 0)
                                @foreach($CategoryChildrens as $childrenCate)
                                    <li>
{{--                                        <a href="javascript:void(0)" title="{{ $childrenCate->cpo_name }}" class="no-drop">{{ $childrenCate->cpo_name }}</a>--}}
                                        <a href="{{ route('show-category-cap2',[$childrenCate->cpo_slug,$childrenCate->id]) }}" title="{{ $childrenCate->cpo_name }}"  style="color: #4285f4;font-weight: bold">{{ $childrenCate->cpo_name }}</a>
                                        <?php
                                            $posts = DB::table('posts')
                                            ->leftJoin('categoryposts', 'categoryposts.id', '=', 'posts.po_category_post_id')
                                            ->select('posts.id','posts.po_title','posts.po_slug','posts.po_category_post_id','categoryposts.cpo_slug')
                                            ->where('po_category_post_id',$childrenCate->id)->orderBy('po_sort','ASC')->get();
                                        ?>
                                        @if($posts->count() > 0 )
                                            <ul>
                                                @foreach($posts as $post)
                                                    <li><a {!! Request::segment(4) == $post->id ? "style='color:#00a888'"  : "" !!} href="/bai-viet/{{ $childrenCate->cpo_parent_id }}/{{ $post->po_slug }}/{{ $post->id }}" title="{{ $post->po_title }}" style="color: #222">{{ $post->po_title }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <a href=""> Chưa có dữ liệu  </a>
                                </li>
                            @endif

                        </ul>

                    </div>
                </div>

                <div class="col-sm-9" style="margin-left: 24.9%;">
                    <div id="box-content">
                        <div style="padding: 20px ;border: 1px solid #dedede;margin-bottom: 10px;background-color: white">
                            <div style="border-bottom: 1px solid #dfdfdf;padding-bottom: 20px;" class="clearfix">
                                <?php
                                    $pre  = DB::table('posts')->where('po_sort','<',$postDetail->po_sort)->orderBy('po_sort','DESC')->first();
                                    $next = DB::table('posts')->where('po_sort','>',$postDetail->po_sort)->orderBy('po_sort','ASC')->first();
                                ?>

                                @if($pre)
                                    <a style="margin-right: 10px;font-size: 14px;" href="/bai-viet/{{ Request::segment(2) }}/{{ $pre->po_slug }}/{{ $pre->id }}" class="btn btn-xs btn-success pull-left" >Trang Trước</a>
                                @endif
                                    <?php
                                        $check_qs = DB::table('questions')->where('qs_post_id',$postDetail->id)->first();
                                    ?>
                                    @if( $check_qs)
                                        <a href="javascript:void(0)"  class="text-center btn btn-xs questions-modail" style="background-color: #00a888;color: white;position: absolute;transform: translateX(-50%);left: 50%;font-size: 14px" data-id=<?= $postDetail->id ?>> Câu hỏi ôn tập </a>
                                    @endif
                                @if($next)
                                        <a style="margin-right: 10px;font-size: 14px;" href="/bai-viet/{{ Request::segment(2) }}/{{ $next->po_slug }}/{{ $next->id }}" class="btn btn-xs btn-success pull-right">Trang Sau</a>
                                @endif

                            </div>

                            <h2 style="margin-top: 20px;font-size: 36px" class="title-detail-post">{{  $postDetail->po_title }}</h2>
                            <div class="content-post" style="padding: 20px;">
                                {!! $postDetail->po_content !!}
                            </div>
                            <div style="border-bottom: 1px solid #dfdfdf;padding-bottom: 20px;" class="clearfix">
                                <?php
                                $pre  = DB::table('posts')->where('po_sort','<',$postDetail->po_sort)->orderBy('po_sort','DESC')->first();
                                $next = DB::table('posts')->where('po_sort','>',$postDetail->po_sort)->orderBy('po_sort','ASC')->first();
                                ?>
                                @if($pre)
                                    <a style="margin-right: 10px;font-size: 14px;" href="/bai-viet/{{ Request::segment(2) }}/{{ $pre->po_slug }}/{{ $pre->id }}" class="btn btn-xs btn-success pull-left">Trang Trước</a>
                                @endif
                                <?php
                                        $check_qs = DB::table('questions')->where('qs_post_id',$postDetail->id)->first();
                                    ?>
                                    @if( $check_qs)
                                        <a href="javascript:void(0)" id="" class="text-center btn btn-xs questions-modail" style="background-color: #00a888;color: white;position: absolute;transform: translateX(-50%);left: 50%;font-size: 14px" data-id=<?= $postDetail->id ?>> Câu hỏi ôn tập </a>
                                    @endif
                            
                                @if($next)
                                    <a style="margin-right: 10px;font-size: 14px;" href="/bai-viet/{{ Request::segment(2) }}/{{ $next->po_slug }}/{{ $next->id }}" class="btn btn-xs btn-success pull-right">Trang Sau</a>
                                @endif

                            </div>
                        </div>
                        <div style="padding: 20px ;border: 1px solid #dedede;margin-bottom: 10px;background-color: white" >
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home"> Bình luận </a></li>
                            <li><a data-toggle="tab" href="#menu1"> Comment Facebook </a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div id="form-comment" class="col-sm-6 ">
                                    <h2>Gủi bình luận của bạn</h2>
                                    @if(  Auth::guard('web')->check())
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="usr">Nội Dung <span style="color: red;font-size: 20px">*</span></label>
                                                <textarea name="cmt_content" id="" cols="30" rows="5" class="form-control" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="form-control btn btn-xs btn-success" id="pwd" value=" Gửi đi">
                                            </div>
                                        </form>
                                    @else
                                        <h4 style="color: red">Đăng nhập để được bình luận</h4>
                                    @endif
                                </div>

                                <div class="col-sm-6" id="content-comment">
                                    <div style="padding-left: 30px;padding-right: 30px;">
                                        <h2 style="border-bottom: 2px solid ;padding-bottom: 20px;">Nội dung comment bài viết </h2>

                                        <!-- Left-aligned media object -->
                                        @if($comments->count() > 0)
                                            @foreach($comments as $cmt)
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="{{ asset('frontend/img_avatar1.png') }}" class="media-object" style="width:40px">
                                                    </div>
                                                    <div class="media-body">
                                                        <p> {{ $cmt->cmt_content }}.</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div id="form-comment" class="col-sm-12 ">
                                    @if (\Auth::guard('web')->check())
                                        <h5>Gủi bình luận của bạn</h5>
                                    <div class="fb-comments" data-width="100%" data-href="http://127.0.0.1:8000/bai-viet/{{ Request::segment(2) }}/{{ Request::segment(3) }}/{{ Request::segment(4) }}" data-numposts="5"></div>
                                    @else
                                        {{--<span> Đăng nhập để bình luận </span>--}}
                                        <h4 style="color: red">Đăng nhập để được bình luận</h4>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                        </div>
                            
                        </div>
                    </div>
                    <div class="footer" style="padding: 20px ;border: 1px solid #dedede;background-color: white;position: fixed;bottom: 0;width: 79.6%">
                        <p style="color: #333"> Khoá Luận Tốt Nghiệp <a href=""> Nguyễn Thị Thuý </a></p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </section>

</div>

<div id="myModal-question" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-transform: uppercase"> Câu hỏi ôn tập : {{ $postDetail->po_title }}</h4>
            </div>
            <div class="modal-body" id="content-question" style="height: 500px;overflow-y: auto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/frontend/js/jquery.js"></script>
<script type="text/javascript" src="/frontend/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</body>
</html>
<script type="text/javascript">
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 50) {
            $('#main-menu').addClass('fixed-menu');
        } else {
            $('#main-menu').removeClass('fixed-menu');
        }
    });
    $("#ul-sidebar").css("height",$(window).height() - 115);

    $(function(){
        $(".questions-modail").on('click',function(){
            $("#myModal-question").modal("show");
            let $idPost = $(this).attr('data-id');
            console.log($idPost);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                dataType : 'json',
                url:  '/bai-viet/question-ajax/' + $idPost,
                data: { 'idpost': $idPost },
                success: function( msg ) {
                    let string  = '';
                    if( msg && msg.questions.length > 0)
                    {
                        console.log(msg.questions);
                        function  convertQuestion(string)
                        {
                            switch (string)
                            {
                                case 'qs_answer1':
                                    return ' Đáp án A';
                                    break;
                                case 'qs_answer2':
                                    return ' Đáp án B';
                                    break;
                                case 'qs_answer3':
                                    return ' Đáp án C';
                                    break;
                                default:
                                    return ' Đáp án D';
                            }
                        }
                        $.each(msg.questions , function (index, value ) {
                            $key = index + 1;
                            string += ' <div class="modal-item">\n' +
                        '                    <h5 style="display: inline-flex;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 868px;font-weight: bold"> '+$key+'. '+value.qs_name+' : '+ ' '+' ( K'+ value.qs_level +' ) </h5>\n' +
                        '                    <p><b>a</b> '+value.qs_answer1+' </p>\n' +
                        '                    <p><b>b</b> '+value.qs_answer2+' </p>\n' +
                        '                    <p><b>c</b> '+value.qs_answer3+' </p>\n' +
                        '                    <p><b>d</b> '+value.qs_answer4+' </p>\n' +
                        '                    <a href="javascript:void(0)" class="qs_answer_true">Xem đáp án </a>'+
                        '                            <div class="box-item-question">'+
                       '                                <span> '+convertQuestion(value.qs_answer_true)+'</span>'+
                        '                                <div> Gợi ý : '+value.qs_suggestion+' </div>'+
                         '                          </div>'+
                        '                </div>'
                        })
                        $("#content-question").html('').append($(string));
                    }
                },
                processData: false,
                contentType: false,
                error : function () {
                    console.log(" LOI AJAX ");
                }
            });
        });
    });

    $(document).on('click','.qs_answer_true', function(){
        $(this).parent().find(".box-item-question").toggle();
    })
    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 50) {
            $('#main-menu').addClass('fixed-menu');
            $("#fix-left").addClass('fix-left');
        } else {
            $('#main-menu').removeClass('fixed-menu');
            $("#fix-left").removeClass('fix-left');
        }
    });
    $(function(){
        var path = "{{ route('searchTypehead') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {

                return $.get(path, { query: query }, function (data) {
                    console.log(data);
                    $("#result").show();
                    $html  = '';
                    if(data && data.length > 0)
                    {
                        $.each(data , function(index, value){
                            $html += "<li><a href='/bai-viet/1/"+value.po_slug+"/"+value.id+"'>"+value.po_title+"</a></li>"
//                            $html += "<li><a href='/san-pham/"+value.po_slug+"-"+value.id+".html'>"+value.po_title+"</a></li>"
                        });
                    }else {
                        $("#result").html('').append('<li><a href="#"> Không có dữ liệu </a></li>');
                    }
                    $("#result").html('').append($html);
                });
            }
        });
    })
</script>
