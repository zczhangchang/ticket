@extends('layouts.master')

@section('title', 'Contact')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="content">
                @include('layouts.partials.alerts')

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">联系表单</h3>
                    </div>
                    <div class="box-body">
                        {!! Form::open(array('route' => 'contact','method'=>'POST', 'class'=>'form-horizontal')) !!}

                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" autofocus="" placeholder="Type in a your name"
                                       class="form-control">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" id="email" placeholder="Type in your email address"
                                       class="form-control">
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-sm-2 control-label">内容</label>
                            <div class="col-sm-10">
                                <textarea name="message" id="summernote" rows="7" placeholder="Type in a message"
                                          class="form-control"></textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn bg-purple"><i class="fa fa-envelope"></i> 提交</button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop