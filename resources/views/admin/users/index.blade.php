@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('admin.layouts.partials.alerts')

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">用户</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <div class="col-md-12">
                        <table class="table table-hover" id="usertable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>头像</th>
                                <th>姓名</th>
                                <th>邮箱</th>
                                <th>地区</th>
                                <th>角色</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="{{ $user->getAvatarUrl() }}" class="img-circle" height="32" width="32"
                                             alt="User Image"></td>
                                    <td><a href="{{ route('users.show',$user->id) }}">{{ $user->fullname }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->provider }}</td>
                                    <td>
                                        @foreach($user->roles as $v)
                                            <label class="label label-success">{{ $v->display_name }}</label>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a class="btn bg-purple" href="{{ route('users.create') }}"> 创建新用户</a>
        </section>
    </div>

    @push('scripts')
    <script>
        $(function () {
            $("#usertable").DataTable();
        });
    </script>
    @endpush
@endsection