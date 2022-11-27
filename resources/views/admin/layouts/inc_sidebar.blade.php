<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('logo2.png') }}" class="img-circle" alt="User Image" style="width: 40px;height: 40px;">
            </div>
            <div class="pull-left info">
                <p> Nguyễn Nam </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?= Request::segment(2)  == 'home' ? 'active' : '' ?>">
                <a href="/"><i class="fa fa-dashboard"></i> <span> Trang Chủ </span></a>
            </li>
            <li class="header"> Bài viết </li>
            <li class="<?= Request::segment(2)  == 'category-post' ? 'active' : '' ?>">
                <a href="{{ route('admin.categorypost.index') }}"><i class="fa fa-list"></i> <span> Danh mục </span></a>
            </li>
            <li class="<?= Request::segment(2)  == 'posts' ? 'active' : '' ?>">
                 <a href="{{ route('admin.posts.index') }}"><i class="fa fa-pencil-square"></i> <span> Bài viết </span></a>
            </li>
            <li class="<?= Request::segment(2)  == 'questions' ? 'active' : '' ?>">
                <a href="{{ route('admin.questions.index') }}"><i class="fa fa-question-circle"></i> <span> Câu hỏi </span></a>
            </li>

            <li class="<?= Request::segment(2)  == 'comments' ? 'active' : '' ?>">
                <a href="{{ route('comments.index') }}"><i class="fa fa-comment-o"></i> <span> Comments </span></a>
            </li>
            <li class="<?= Request::segment(2)  == 'post-about' ? 'active' : '' ?>"><a href="{{ route('admin.post.about.index') }}"><i class="fa fa-book"></i> <span> Bài viết liên quan </span></a></li>
            <li class="header"> Thành viên & Admin </li>
            <li class="<?= Request::segment(2)  == 'users' ? 'active' : '' ?>">
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-gears"></i> <span> Thành viên  </span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
