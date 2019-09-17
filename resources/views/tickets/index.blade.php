@extends('layouts.master')

@section('title', 'My tickets')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="content">
                @include('layouts.partials.alerts')
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-ticket"> 我的工单</i></h3>
                    </div>
                    <div class="box-body">
                        @if ($tickets->isEmpty())
                            <p>暂无.</p>
                        @else
                            <div class="box-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('') }}">
                                {!! csrf_field() !!}
                                    @foreach ($tickets as $ticket)
                                    <!-- ID -->
                                    <div class="list-wrap">
                                        <span class="label label-default">#{{ $ticket->ticket_id }}</span>
                                        <ul class="app-list">
                                            <li>
                                                <div class="app-wrap">
                                                    <a href="">
                                                    <div class="form-group">
                                                        <label class="col-xs-4 col-md-2 control-label" >维修地点：</label>
                                                        <label  class="col-xs-8 col-md-10 control-label" style="text-align: center">ffffffff</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 col-md-2 control-label" >维修人：</label>
                                                        <label  class="col-xs-8 col-md-10 control-label" style="text-align: center">ffffffff</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-4 col-md-2 control-label" >进度：</label>
                                                        <label  class="col-xs-8 col-md-10 control-label" style="text-align: center">ffffffff</label>
                                                    </div>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection