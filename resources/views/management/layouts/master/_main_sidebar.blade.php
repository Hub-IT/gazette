<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! $user->avatar !!}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{ $user->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-newspaper-o"></i> <span>Posts</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('management.posts.create') !!}" id="posts-create">
                            <i class="fa fa-circle-o"></i> Create</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-envelope"></i> <span>Contact Requests</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{!! route('management.contact-requests.index') !!}" id="contact-requests-index">
                            <i class="fa fa-list"></i> List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
