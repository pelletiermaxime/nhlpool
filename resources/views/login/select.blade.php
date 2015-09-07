@extends('layout.base')

@section('title', 'Login')

@section('content')
<div class="pure-g" id="login-select">
    <div class="pure-u-1 text-center">
        <a href="{{ route('do_login', 'facebook') }}">
            <button type="button" class="pure-button pure-button-primary button-xlarge">Facebook</button>
        </a>
    </div>
    <div class="pure-u-1 text-center">
        <a href="{{ route('do_login', 'twitter') }}">
            <button type="button" class="pure-button pure-button-primary button-xlarge">Twitter</button>
        </a>
    </div>
    <div class="pure-u-1 text-center">
        <a href="{{ route('do_login', 'google') }}">
            <button type="button" class="pure-button pure-button-primary button-xlarge">Google</button>
        </a>
    </div>
</div>
@endsection

