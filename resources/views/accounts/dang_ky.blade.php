@include('frontend.layouts.inc_header')
<style>
    .box-sm{ background: white}
    .panel-default { border-radius: 0;border-color: white;border: 0 !important;}
    .panel-heading { background-color: #fff !important;border: none}
    .title-nav {
        color: #000;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .panel-body{ border: 0 !important;padding-top: 0!important;}
    .panel-group .panel { border: 0 !important;border-radius: 0!important;}
    .title_post_sub
    {
        color: #222;
        display: block;
        padding-bottom: 1px;
        padding-top: 1px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .title-post a { color: #666; display: block; padding-bottom: 1px;  padding-top: 1px;  white-space: nowrap;  overflow: hidden; text-overflow: ellipsis;}
    .title-post a:hover {  color: #00a888 !important;}
    .title-new { text-transform: uppercase;font-size: 20px; text-align: center ;  border-bottom: 1px solid #dfdfdf;padding-bottom: 10px;}
    .title-footer { font-size: 20px;text-transform: uppercase;border-bottom: 2px solid #72c02c;padding-bottom: 15px;width: 90%}
    .fa-book
    {
        line-height: 50px;
        font-size: 24px;
        float: left;
        color: #fff;
        width: 50px;
        height: 50px;
        text-align: center;
        margin-right: 15px;
        display: inline-block;
        border-radius: 50%;
        background-color: #333333a3;
    }
    .fa-book:hover
    {
        background-color: #4285F4;
        cursor: pointer;
    }
    .fa-book:before {
        content: "\f02d";
        font-size: 100%;
        font-family: FontAwesome;
        font-style: normal;
        font-weight: normal;
        text-decoration: inherit;
    }
    .help-block
    {
        color: red;
    }
    .form-control
    {
        margin-bottom: 10px;
    }
    /*.fa-book:before {*/
    /*content: "\f02d";*/
    /*}*/
</style>
<section style="background-color: #f1f1f16e">
    <div class="container">
        <div class="row clearfix">
            <div class="col-sm-6 col-sm-offset-3" style="margin-top: 100px;margin-bottom: 100px">
                <form action="" method="post" class="form" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" name="u_name" placeholder="Họ tên hiển thị" type="text" autofocus />
                            @if ($errors->has('u_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('u_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <input class="form-control" name="u_email" placeholder=" Email đăng nhập" type="email" />
                    @if ($errors->has('u_email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('u_email') }}</strong>
                        </span>
                    @endif
                    <input class="form-control" name="u_password" placeholder="Password đăng nhập" type="password" />
                    @if ($errors->has('u_password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('u_password') }}</strong>
                                    </span>
                    @endif
                    <br />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="footer" style="background-color: #272727;min-height: 200px;color: white;padding-top: 20px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="/" style="padding-top: 10px;padding-bottom: 10px;display: block;font-size: 20px;letter-spacing: 3px;color: #555555;">
                    <img src="/frontend/thuy1.jpg" alt="" style="width: 100px;height: 100px;">
                </a>
            </div>
            <div class="col-sm-3">
                <h2 class="title-footer"> Danh mục nổi bật</h2>
                <div>
                    <ul>
                        @foreach($categoryLevel1 as $cate)
                            <li><a href="/danh-muc/{{ $cate->cpo_slug }}/{{ $cate->id }}" style="color: white;">{{ $cate->cpo_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <h2 class="title-footer"> Giới thiệu</h2>
                <div>
                    <p> Cảm ơn sự đóng góp cũng như ủng hộ của toàn thể các bạn ! Chúng tôi sẽ cố gắng hoàn thiện và cải tiến website để
                        mang lại sự trải nghiệm tốt nhất cho các bạn! .
                    </p>
                </div>
            </div>

            <div class="col-sm-3">
                <h2 class="title-footer">Liên hệ với chúng tôi</h2>
                <span><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> P 903, CT 36 B, Hoàng Mai, Hà Nội</span><br>
                <span style="display: inline-block;padding: 5px 0"><i class="	glyphicon glyphicon-phone-alt"></i> Phone: 01689933602</span><br>
                <span><i class="glyphicon glyphicon-envelope"></i> Email: <a href="mailto:nguyenthuy@gmail.com" style="color: #fb9f45">nguyenthuy@gmail.com</a></span>
            </div>
        </div>
    </div>
</section>
</div>
<script type="text/javascript" src="/frontend/js/jquery.js"></script>
<script type="text/javascript" src="/frontend/js/bootstrap.min.js"></script>
</body>
</html>
<script type="text/javascript">


</script>
