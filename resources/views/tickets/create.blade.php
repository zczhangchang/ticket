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
                                <label for="title" class="col-xs-4 col-md-2 control-label" style="text-align: left;padding-top: 8px">标题：</label>

                                <div class="col-xs-8 col-md-10">
                                    <input id="title" type="text" class="form-control" name="title"
                                           placeholder="Type in a title" value="{{ old('title') }}">

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- 申请人 -->
                            <div class="form-group{{ $errors->has('application') ? ' has-error' : '' }}">
                                <label for="application" class="col-xs-4 col-md-2 control-label" style="text-align: left;padding-top: 8px">申请人：</label>

                                <div class="col-xs-8 col-md-10">
                                    <input id="application" type="text" class="form-control" name="application"
                                           placeholder="请输入申请人姓名" value="{{ old('application') }}">

                                    @if ($errors->has('application'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('application') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- 联系方式 -->
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-xs-4 col-md-2 control-label" style="text-align: left;padding-top: 8px">联系方式：</label>

                                <div class="col-xs-8 col-md-10">
                                    <input id="phone" type="text" class="form-control" name="phone"
                                           placeholder="请输入您的联系方式" value="{{ old('phone') }}">

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- 维修地点 -->
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-xs-4 col-md-2 control-label" style="text-align: left;padding-top: 8px;">维修地点：</label>

                                <div class="col-xs-8 col-md-10">
                                    <select id="address" type="category" class="form-control" name="address">
                                        <option value="">--请选择--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <p style="color:red;padding-left: 10px">提示：请选择报修地点，若没有，请选择其他。</p>
                            </div>

                            <!-- 详细地址 -->
                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                <label for="details" class="col-xs-4 col-md-2 control-label" style="text-align: left;padding-top: 8px">详细地点：</label>

                                <div class="col-xs-8 col-md-10">
                                    <input id="details" type="text" class="form-control" name="details"
                                           placeholder="请输入详细地址，如，xx房间号。" value="{{ old('details') }}">

                                    @if ($errors->has('details'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- 所属部门 -->
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-xs-4 col-md-2 control-label" style="text-align: left;padding-top: 8px">所属部门：</label>

                                <div class="col-xs-8 col-md-10">
                                    <select id="category" type="category" class="form-control" name="category">
                                        <option value="">--请选择--</option>
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

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-2 control-label">类别：</label>

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
                                <label for="priority" class="col-xs-4 col-md-2 control-label" style="text-align: left;padding-top: 8px">缓急情况：</label>

                                <div class="col-xs-8 col-md-10">
                                    <select id="priority" type="priority" class="form-control" name="priority">
                                        <option value="">--请选择--</option>
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

                            <!-- 是否选择维修人员 -->
                            <div class="form-group">
                                <label for="designated_personel" class="col-xs-5 col-md-2 control-label" style="text-align: left;padding-top: 8px">是否指定维修人员:</label>
                                <div class="checkbox col-xs-7 col-md-10" >
                                    <label>
                                        <input type="radio" name="designated_personel" value="是" required onclick="isNot()" >是&nbsp;&nbsp;
                                        <input type="radio" name="designated_personel" value="否" required onclick="disappear()">否
                                    </label>
                                </div>
                            </div>
                            <p style="color:red;padding-left: 10px">提示：若需指定，请在下面弹出框内选择您要指定的人员。</p>

                            <!-- 指定维修人员 -->
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}" id="mainname" style="display: none">
                                <label for="title" class="col-xs-4 col-md-2 control-label" style="text-align: left;padding-top: 8px">维修人员：</label>

                                <div class="col-xs-8 col-md-10">
                                    <select id="priority" type="priority" class="form-control" name="priority">
                                        <option value="">--请选择--</option>
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
                                <label for="message" class="col-xs-6 col-md-2 control-label" style="text-align: left;padding-top: 8px">故障信息描述：</label>

                                <div class="col-xs-12 col-md-10">
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
                                <div class="col-md-10 col-xs-10 col-md-offset-2">
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
    <script>
        function isNot() {
            document.getElementById('mainname').style.display='block';
        }
        function disappear() {
            document.getElementById('mainname').style.display='none';
        }
    </script>
@endsection