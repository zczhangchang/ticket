@extends('layouts.master')

@section('title', 'My profile')

@section('content')

    <div class="content-wrapper">
        <div class="container">

            <section class="content-header">
                <h1>
                    {{ site_name() }}
                    <small>个人信息</small>
                </h1>
            </section>

            <section class="content">

                @include('layouts.partials.alerts')

                <div class="row">
                    <div class="col-md-3">

                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle"
                                     src="{{ Auth::user()->getAvatarUrl() }}" alt="User profile picture">

                                <h3 class="profile-username text-center">{{ $account->fullname }}</h3>

                                <p class="text-muted text-center">{{ $account->email }}</p>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>位置</b> <a class="pull-right">{{ $account->location }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>网站</b> <a class="pull-right"
                                                     href="{{ $account->website }}">{{ $account->website }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#profile" data-toggle="tab">个人信息</a></li>
                                <li><a href="#avatar" data-toggle="tab">更改头像</a></li>
                                <li><a href="#password" data-toggle="tab">更改密码</a></li>
                                <li><a href="#deleteaccount" data-toggle="tab">删除账号</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="profile">

                                    <form role="form" method="POST" action="{{ route('account.profile') }}"
                                          class="form-horizontal">
                                        {!! csrf_field() !!}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="name" class="col-sm-2 control-label">邮箱</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="email" id="email"
                                                       value="{{ $account->email ?: old('email') }}" autofocus=""
                                                       class="form-control">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="fullname" class="col-sm-2 control-label">姓名</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="fullname" id="name"
                                                       value="{{ $account->fullname ?: old('fullname') }}"
                                                       class="form-control">
                                                @if ($errors->has('fullname'))
                                                    <span class="help-block">{{ $errors->first('fullname') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <label for="name" class="col-sm-2 control-label">性别</label>
                                            <div class="col-sm-4">
                                                <label class="radio col-sm-4">
                                                    <input type="radio"
                                                           @if ($account->gender == "M")
                                                           {{ 'checked="checked"' }}
                                                           @endif

                                                           name="gender" value="M" data-toggle="radio"><span>男生</span>
                                                </label>
                                                <label class="radio col-sm-4">
                                                    <input type="radio"
                                                           @if ($account->gender == "F")
                                                           {{ 'checked="checked"' }}
                                                           @endif
                                                           name="gender" value="F"
                                                           data-toggle="radio"><span>女生</span>
                                                </label>
                                                @if ($errors->has('gender'))
                                                    <span class="help-block">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="location" class="col-sm-2 control-label">位置</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="location" id="location"
                                                       value="{{ $account->location ?: old('location') }}"
                                                       class="form-control" placeholder="Changde">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="website" class="col-sm-2 control-label">网站</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="website" id="website"
                                                       value="{{ $account->website ?: old('website') }}"
                                                       class="form-control" placeholder="http://example.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-8">
                                                <button type="submit" class="btn bg-purple"><i class="fa fa-pencil"></i>
                                                    更新
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane" id="avatar">

                                    <form role="form" method="POST" action="{{ route('account.avatar') }}"
                                          enctype="multipart/form-data" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="gravatar" class="col-sm-2 control-label">头像</label>
                                            <div class="col-sm-4">
                                                <img src="{{ Auth::user()->getAvatarUrl() }}" width="100" height="100"
                                                     class="profile">
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('file_name') ? ' has-error' : '' }}">
                                            <label for="gravatar" class="col-sm-2 control-label"></label>
                                            <div class="col-sm-4">
                                                <input type="file" name="file_name" id="file_name">
                                                @if ($errors->has('file_name'))
                                                    <span class="help-block">{{ $errors->first('file_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-8">
                                                <button type="submit" class="btn bg-purple"><i class="fa fa-pencil"></i>
                                                    更新
                                                </button>
                                            </div>
                                        </div>
                                        {!! csrf_field() !!}
                                    </form>

                                </div>

                                <div class="tab-pane" id="password">

                                    <form role="form" method="POST" action="{{ route('account.password') }}"
                                          class="form-horizontal">
                                        {!! csrf_field() !!}
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-sm-3 control-label">新密码</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="password" id="password"
                                                       class="form-control">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password" class="col-sm-3 control-label">确认新密码</label>
                                            <div class="col-sm-4">
                                                <input type="password" name="password_confirmation"
                                                       id="password_confirmation" class="form-control">
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-4">
                                                <button type="submit" class="btn bg-purple"><i class="fa fa-lock"></i>
                                                    更改
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane" id="deleteaccount">

                                    <p> You can delete your account, but keep in mind this action is irreversible. </p>

                                    <a href="{{ route('account.confirm.delete') }}">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> 删除账户
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
@stop