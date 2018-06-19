@extends('app')
@section('content')
<div class="list-group mb-5">
    <div class="list-group-item list-group-item-info">
        <h4 class="float-left">Produkti</h4>
        @if ( !Auth::guest() && Auth::user()->isAdmin() )
        <a class="float-right btn btn-primary btn-sm" href="/product/add">Pievienot</a>
        @endif
    </div>

    <div class="list-group-item">
        @foreach ( $products as $product )
        <div class="card-deck mb-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-secondary" href="{{ url('product', $product['id']) }}/show">{{ $product->name }}</a>
                        <span class="badge badge-info">{{ $product->price }} EUR</span>
                    </h5>
                    <div class="card-text">
                        <span>{!! $product->description !!}</span>
                    </div>
                    <div class="card-text">
                        <a class="btn btn-outline-info btn-sm" href='{{ url('cart/add', $product->id) }}'>Pievienot grozam</a>
                    </div>
                    @if ( !Auth::guest() && Auth::user()->isAdmin() )
                    <p class="card-text mt-1">
                        <a class="btn btn-warning btn-sm" href="{{ url('product', $product['id']) }}/edit">Rediget</a>
                        <a class="btn btn-danger btn-sm" href="{{ url('product', $product['id']) }}/remove">Dzest</a>
                    </p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
