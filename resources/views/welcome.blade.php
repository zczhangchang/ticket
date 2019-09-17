@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="content-wrapper">
        <div class="container">
{{--            {{ site_name() }}--}}
            <section class="content">
                < class="jumbotron hero-spacer">
                    <h1>维保派单系统</h1>
                    <p>注意事项：</p>
                    <p>1</p>
                    <p>2</p>
                    <p>3</p>
                    <p>4</p>

                    @if (Auth::guest())
                        <p><a href="/register" class="btn bg-purple">创建用户</a></p>
                    @else
                        <p><a href="/account" class="btn bg-purple">我的信息</a></p>
                    @endif
                </header>
            </section>
        </div>
    </div>
@stop