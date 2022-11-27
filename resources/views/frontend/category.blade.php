@include('frontend.layouts.inc_header')
<style>

</style>
    <section style="background-color: #f1f1f16e">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-3" id="fix-left" style="border: 1px solid #dedede;position: fixed;background-color: white">
                    <div id="sidebar" style="">
                        <ul style="padding-left: 10px;list-style: none;height: 600px;overflow-y:auto; overflow-x:hidden;" id="ul-sidebar">
                            @if( count($CategoryChildrens) > 0)

                                @foreach($CategoryChildrens as $key => $childrenCate)
                                    <li>
                                        <?php
                                        $posts = DB::table('posts')
                                            ->leftJoin('categoryposts', 'categoryposts.id', '=', 'posts.po_category_post_id')
                                            ->select('posts.id','posts.po_title','posts.po_slug','posts.po_category_post_id','categoryposts.cpo_slug')
                                            ->where('po_category_post_id',$childrenCate->id)->orderBy('po_sort','ASC')->get();
                                        ?>
{{--                                        <!-- menu cap 2 /danh-muc/{{ $childrenCate->cpo_slug }}/{{ $childrenCate->id }}" title="{{ $childrenCate->cpo_name }} -->--}}
                                        <a href="{{ route('show-category-cap2',[$childrenCate->cpo_slug,$childrenCate->id]) }}" style="color: #4285f4;font-weight: bold" >{{ $childrenCate->cpo_name }}</a>
                                        @if($posts->count() > 0 )
                                            <ul>
                                                @foreach($posts as $post)
                                                    <li><a href="/bai-viet/{{ $childrenCate->cpo_parent_id }}/{{ $post->po_slug }}/{{ $post->id }}" title="{{ $post->po_title }}" style="color: #000">{{ $post->po_title }}</a></li>
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
                            <h3>Giới thiệu </h3>
                            <div>
                                {!! $category->cpo_content !!}
                            </div>
                        </div>
                        {{--<div style="padding: 20px ;border: 1px solid #dedede;margin-bottom: 10px;background-color: white">--}}
                            {{--<h3>Danh sách bài học </h3>--}}
                        {{--</div>--}}
                    </div>

                </div>
            </div>

        </div>
    </section>
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
            $("#fix-left").addClass('fix-left');
        } else {
            $('#main-menu').removeClass('fixed-menu');
            $("#fix-left").removeClass('fix-left');
        }
    });
    $("#ul-sidebar").css("height",$(window).height() - 115);
    console.log($(window).height() - 115);
    $(function(){
        $("#sidebar ul").first().addClass('menu-level1').attr('id','ul-sidebar');
    })

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
