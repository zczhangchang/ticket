<div class="box box-default">
    <div class="box-header with-border">
        <a href="{{ url('admin/tickets') }}" class="btn btn-app {{ Ekko::isActiveRoute('managetickets.index') }}"><span
                    class="badge">{{ $menucount['all'] }}</span><i class="fa fa-ticket"></i>全部</a>
        <a href="{{ url('admin/tickets/open') }}"
           class="btn btn-app {{ Ekko::isActiveRoute('managetickets.open') }}"><span
                    class="badge bg-aqua">{{ $menucount['open'] }}</span><i class="fa fa-folder-open"></i>待处理</a>
        <a href="{{ url('admin/tickets/inprogress') }}"
           class="btn btn-app {{ Ekko::isActiveRoute('managetickets.inprogress') }}"><span
                    class="badge bg-yellow">{{ $menucount['inprogress'] }}</span><i class="fa fa-folder"></i>处理中</a>
        <a href="{{ url('admin/tickets/closed') }}"
           class="btn btn-app {{ Ekko::isActiveRoute('managetickets.closed') }}"><span
                    class="badge bg-green">{{ $menucount['closed'] }}</span><i class="fa fa-check-square"></i>已关闭</a>
        <a href="{{ url('admin/tickets/reopened') }}"
           class="btn btn-app {{ Ekko::isActiveRoute('managetickets.reopened') }}"><span
                    class="badge bg-red">{{ $menucount['reopened'] }}</span><i class="fa fa-history"></i>已回复</a>
    </div>
</div>