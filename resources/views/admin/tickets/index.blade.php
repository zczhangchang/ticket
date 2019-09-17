@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('admin.layouts.partials.alerts')
            @include('admin.tickets.buttons')
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">工单</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <div class="col-md-12">
                        @if ($tickets->isEmpty())
                            <p>暂无</p>
                        @else
                            <table class="table table-hover" id="tickettable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>用户</th>
                                    <th>内容</th>
                                    <th>类别</th>
                                    <th>状态</th>
                                    <th>等级</th>
                                    <th>创建时间</th>
                                    <th>更新时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td><span class="label label-default">#{{ $ticket->ticket_id }}</span></td>
                                        <td>
                                            <a href="{{ url('admin/tickets/'. $ticket->ticket_id) }}">
                                                {{ $ticket->title }}
                                            </a>
                                        </td>
                                        <td>{{ $ticket->user->fullname }}</td>
                                        <td><span class="badge">{{ count($ticket->comments) }}</span></td>
                                        <td>
                                            @foreach ($categories as $category)
                                                @if ($category->id == $ticket->category_id)
                                                    {{ $category->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($statuses as $status)
                                                @if ($status->id == $ticket->status_id)
                                                    @if ($status->id == 1)
                                                        <span class="label label-info"> {{ $status->name }}</span>
                                                    @elseif ($status->id == 2)
                                                        <span class="label label-warning"> {{ $status->name }}</span>
                                                    @elseif ($status->id == 3)
                                                        <span class="label label-success"> {{ $status->name }}</span>
                                                    @else
                                                        <span class="label label-danger"> {{ $status->name }}</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($prioritys as $priority)
                                                @if ($priority->id == $ticket->priority_id)
                                                    @if ($priority->id == 1)
                                                        <p class="bg-danger"> {{ $priority->name }}</p>
                                                    @elseif ($priority->id == 2)
                                                        <p class="bg-success"> {{ $priority->name }}</p>
                                                    @else
                                                        <p class="bg-info"> {{ $priority->name }}</p>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                        <td>{{ $ticket->updated_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            $(function () {
                $("#tickettable").DataTable({
                    "order": [[0, "asc"]]
                });
            });
        </script>
    @endpush

@endsection