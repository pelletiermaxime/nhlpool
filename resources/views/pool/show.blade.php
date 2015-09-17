@extends('layout.base')

@section('title', "Pool {$pool->pool_type->name}")

@section('content')
<div class="pure-g" id="login-select">
    <div class="pure-u-1 text-center">
        <p>Pool {{ $pool->pool_type->name }}</p>
        <p>Starting on {{ $pool->start_date }}</p>
        <p>Ending on {{ $pool->end_date }}</p>
        @foreach ($pool->pool_type->rules as $ruleName => $ruleValue)
            <p>{{ $ruleName }}: {{ $ruleValue }}</p>
        @endforeach
    </div>
</div>
@endsection

