@extends('layout.base')

@section('title', 'Pools list')

@section('content')
<div class="pure-g" id="login-select">
    @foreach ($pools as $pool)
    <div class="pure-u-1 text-center">
        {!! link_to_route('pool.show', $pool->pool_type->name, $pool->id) !!}
    </div>
    @endforeach
    <div class="pure-u-1 text-center">
        <section class="pagination-section text-center">
        {!! $pools->render() !!}
        </section>
    </div>
</div>
@endsection

