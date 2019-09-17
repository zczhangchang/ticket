<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->getAvatarUrl() }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->fullname }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">菜单</li>
            @permission('view-backend')
            <li class="{{ Ekko::isActiveRoute('admin.dashboard') }}"><a href="{{ url('admin') }}">
                    <i class="fa fa-dashboard"></i> <span>首页</span></a>
            </li>
            @endpermission

            @permission('manage-tickets')
            <li class="{{ Ekko::isActiveRoute('managetickets.*') }}"><a href="{{ url('admin/tickets') }}">
                    <i class="fa fa-ticket"></i> <span>工单</span></a>
            </li>
            @endpermission

            @permission('manage-users')
            <li class="{{ Ekko::isActiveRoute('users.*') }}"><a href="{{ url('admin/users') }}">
                    <i class="fa fa-users"></i> <span>用户</span></a>
            </li>
            @endpermission

            @permission('manage-roles')
            <li class="{{ Ekko::isActiveRoute('roles.*') }}"><a href="{{ url('admin/roles') }}">
                    <i class="fa fa-archive"></i> <span>角色</span></a>
            </li>
            @endpermission

            @permission('manage-permissions')
            <li class="{{ Ekko::isActiveRoute('permissions.*') }}"><a href="{{ url('admin/permissions') }}">
                    <i class="fa fa-key"></i> <span>权限</span></a>
            </li>
            @endpermission

            @permission('manage-settings')
            <li class="{{ Ekko::isActiveRoute('settings.*') }}"><a href="{{ url('admin/settings') }}">
                    <i class="fa fa-cog"></i> <span>配置</span></a>
            </li>
            @endpermission
        </ul>
    </section>
</aside>
<div class="control-sidebar-bg"></div>