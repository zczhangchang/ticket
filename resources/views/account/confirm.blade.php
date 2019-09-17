@extends('layouts.master')

@section('title', 'My profile')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <h1>
                    {{ site_name() }}
                    <small>Account Deletion Confirmation</small>
                </h1>
            </section>

            <section>
                <p>是否确实要删除您的帐户？ </p>

                <form method="POST" action="{{ route('account.delete.now') }}">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> 是</button>

                    <a href="{{ route('account.dont.delete') }}" class="btn btn-primary"><i class="fa fa-close"></i> 否</a>
                </form>

            </section>
        </div>
    </div>
@stop