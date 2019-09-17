@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="content-wrapper">
        <div class="container">

            <section class="content">
                <header class="jumbotron hero-spacer">
                    <h1>Welcome to {{ site_name() }}!</h1>
                    <p>{{ site_name() }} is a Open Source Support Ticket system. It is built with the awesome Laravel
                        Framwork. It includes roles & permissions, ticket system, responsive email
                        templates and much more.</p>

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