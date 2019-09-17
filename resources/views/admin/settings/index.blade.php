@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('admin.layouts.partials.alerts')

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">配置</h3>
                </div>
                <div class="box-body">

                    {!! Form::open(array('route' => 'settings.update','method'=>'PATCH', 'class'=>'form-horizontal')) !!}

                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
                        <label for="site_name" class="col-md-2 control-label">平台名称</label>
                        <div class="col-md-4">
                            <input type="text" name="site_name" id="site_name" autofocus=""
                                   value="{{ $settings->site_name }}" class="form-control">
                            @if ($errors->has('site_name'))
                                <span class="help-block">{{ $errors->first('site_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('site_url') ? ' has-error' : '' }}">
                        <label for="site_url" class="col-md-2 control-label">平台地址</label>
                        <div class="col-md-4">
                            <input type="text" name="site_url" id="site_url" autofocus=""
                                   value="{{ $settings->site_url }}" class="form-control">
                            @if ($errors->has('site_url'))
                                <span class="help-block">{{ $errors->first('site_url') }}</span>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div class="form-group{{ $errors->has('email_from') ? ' has-error' : '' }}">
                        <label for="email_from" class="col-md-2 control-label">默认邮箱 (Tickets)</label>
                        <div class="col-md-4">
                            <input type="text" name="email_from" id="email_from" autofocus=""
                                   value="{{ $settings->email_from }}" class="form-control">
                            @if ($errors->has('email_from'))
                                <span class="help-block">{{ $errors->first('email_from') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email_to') ? ' has-error' : '' }}">
                        <label for="email_to" class="col-md-2 control-label">默认邮箱 (Contact Form)</label>
                        <div class="col-md-4">
                            <input type="text" name="email_to" id="email_to" autofocus=""
                                   value="{{ $settings->email_to }}" class="form-control">
                            @if ($errors->has('email_to'))
                                <span class="help-block">{{ $errors->first('email_to') }}</span>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" class="btn bg-purple"><i class="fa fa-envelope"></i> 更新</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>


@endsection