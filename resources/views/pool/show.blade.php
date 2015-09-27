@extends('layout.base')

@section('title', "Pool {$pool->pool_type->name}")

@section('content')
<div class="pure-g" id="pool-show">
    <div class="pure-u-1 text-center">
        <p>Pool {{ $pool->pool_type->name }}</p>
        <p>Starting on {{ $pool->start_date }}</p>
        <p>Ending on {{ $pool->end_date }}</p>
        @foreach ($pool->pool_type->rules as $ruleName => $ruleValue)
            <p>{{ $ruleName }}: {{ $ruleValue }}</p>
        @endforeach
        {!! form($form, $formOptions = []) !!}
        @can('join-pool', $pool)
        <a href="{{ route('pool.join', $pool->id) }}">
            <button class="pure-button pure-button-primary">Join this pool</button>
        </a>
        @endcan
    </div>
</div>
@endsection

