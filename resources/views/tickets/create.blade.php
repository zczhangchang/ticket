@extends('layouts.master')

@section('title', 'My tickets')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="content">
                @include('layouts.partials.alerts')

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-ticket"> 创建工单</i></h3>
                    </div>
                    <div class="box-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/tickets/store') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-2 control-label">标题</label>

                                <div class="col-md-10">
                                    <input id="title" type="text" class="form-control" name="title"
                                           placeholder="Type in a title" value="{{ old('title') }}">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-2 control-label">类别</label>

                                <div class="col-md-10">
                                    <select id="category" type="category" class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                                <label for="priority" class="col-md-2 control-label">级别</label>

                                <div class="col-md-10">
                                    <select id="priority" type="priority" class="form-control" name="priority">
                                        <option value="">Select Priority</option>
                                        @foreach ($prioritys as $priority)
                                            <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('priority'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message" class="col-md-2 control-label">内容</label>

                                <div class="col-md-10">
                                    <textarea rows="10" id="summernote" class="form-control"
                                              placeholder="Type in a message" name="message"></textarea>

                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn bg-purple">
                                        <i class="fa fa-btn fa-ticket"></i> 提交工单
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection