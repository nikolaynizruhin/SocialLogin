@extends('layouts.master')
@section('page-title', 'Please login')
@section('page-content')
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            @include('partials.flash-messages')
        </div>
        <div class="col-md-8 col-md-offset-1">
            <ul>
                <li>
                    <a href="{{ action('LoginController@auth', ['provider' => 'google']) }}" class="btn btn-block btn-lg btn-social btn-google social-button">
                        <span class="fa fa-google"></span> login with Google
                    </a>
                </li>
            </ul>
        </div>
    </div>
@stop
