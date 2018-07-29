{{--<!-- Left side column. contains the logo and sidebar -->--}}
<aside class="main-sidebar">

    {{--<!-- sidebar: style can be found in sidebar.less -->--}}
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel _none">
            <div class="pull-left image">
                <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::guard('admin')->user()->nickname}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form _none">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            {{--机构基本信息--}}
            <li class="header">机构(企业)管理</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="treeview">
                <a href="{{ url('/admin/info/index') }}">
                    <i class="fa fa-sun-o text-default"></i> <span>基本信息</span>
                </a>
            </li>

            <li class="treeview" style="display:none;">
                <a href="{{ url('/admin/info/edit') }}">
                    <i class="fa fa-circle-o text-red"></i> <span>编辑基本信息</span>
                </a>
            </li>

            <li class="treeview" style="display:none;">
                <a href="">
                    <i class="fa fa-th text-aqua"></i>
                    <span>更多信息</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li style="display:none;">
                        <a href="{{ url('/admin/website/edit') }}">
                            <i class="fa fa-circle-o text-aqua"></i>详细编辑
                        </a>
                    </li>
                    {{--<li><a href="{{ url('/admin/administrator/list') }}"><i class="fa fa-circle-o text-aqua"></i>管理员列表</a></li>--}}
                </ul>
            </li>


            {{--目录管理--}}
            <li class="header">目录管理</li>

            <li class="treeview">
                <a href="{{ url('/admin/menu/list') }}">
                    <i class="fa fa-folder-o text-aqua"></i> <span>目录列表</span>
                </a>
            </li>


            {{--内容管理--}}
            <li class="header">内容管理</li>

            <li class="treeview">
                <a href="{{ url('/admin/item/list') }}">
                    <i class="fa fa-file-o text-green"></i> <span>全部内容</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ url('/admin/item/list?category=about') }}">
                    <i class="fa fa-circle-o text-green"></i> <span>关于我们</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ url('/admin/item/list?category=advantage') }}">
                    <i class="fa fa-circle-o text-green"></i> <span>选择我们</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ url('/admin/item/list?category=service') }}">
                    <i class="fa fa-circle-o text-green"></i> <span>服务项目</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ url('/admin/item/list?category=faq') }}">
                    <i class="fa fa-circle-o text-green"></i> <span>常见问题</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ url('/admin/item/list?category=coverage') }}">
                    <i class="fa fa-circle-o text-green"></i> <span>资讯动态</span>
                </a>
            </li>




            {{--留言管理--}}
            <li class="header">留言管理</li>

            <li class="treeview">
                <a href="{{ url('/admin/message/list?category=all') }}">
                    <i class="fa fa-commenting-o text-red"></i> <span>全部留言</span>
                </a>
            </li>




            {{--目录管理--}}
            <li class="header _none">自定义内容管理</li>

            <li class="treeview _none">
                <a href="{{ url('/admin/menu/list') }}">
                    <i class="fa fa-folder-open-o text-blue"></i> <span>目录列表</span>
                </a>
            </li>

            <li class="treeview _none">
                <a href="{{ url('/admin/item/list') }}">
                    <i class="fa fa-file-o text-blue"></i> <span>内容列表</span>
                </a>
            </li>


            <li class="treeview _none" style="display:none;">
                <a href="{{ url(config('common.org.admin.prefix').'/admin/menu/sort') }}">
                    <i class="fa fa-sort text-red"></i> <span>目录排序</span>
                </a>
            </li>


            <li class="treeview _none">
                <a href=""><i class="fa fa-th text-aqua"></i> <span>特殊内容</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/admin/product/list') }}">
                            <i class="fa fa-file-text text-red"></i> <span>产品列表</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/article/list') }}">
                            <i class="fa fa-file-text text-red"></i> <span>文章列表</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/activity/list') }}">
                            <i class="fa fa-calendar-check-o text-red"></i> <span>活动/会议列表</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/survey/list') }}">
                            <i class="fa fa-question-circle text-red"></i> <span>调研问卷列表</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/slide/list') }}">
                            <i class="fa fa-th-large text-red"></i> <span>幻灯片列表</span>
                        </a>
                    </li>
                </ul>
            </li>



            {{--流量统计--}}
            <li class="header _none">流量统计</li>

            <li class="treeview _none">
                {{--<a href="{{ url(config('common.org.admin.prefix').'/admin/website/statistics') }}"><i class="fa fa-bar-chart text-green"></i> <span>流量统计</span></a>--}}
                <a href="{{ url('/admin/statistics/website') }}"><i class="fa fa-bar-chart text-green"></i> <span>流量统计</span></a>
            </li>


            {{--前台展示--}}
            <li class="header">前台展示</li>

            <li class="treeview">
                <a target="_blank" href="{{ url('/') }}">
                    <i class="fa fa-cube text-red"></i><span>前台主页</span>
                </a>
            </li>

            <li class="header" style="display:none;">管理员管理</li>

            <li class="treeview" style="display:none;">
                <a href="{{ url('/admin/administrator/password/reset') }}">
                    <i class="fa fa-circle-o text-aqua"></i><span>修改密码</span>
                </a>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    {{--<!-- /.sidebar -->--}}
</aside>