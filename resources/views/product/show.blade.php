@extends('app')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <p class="card-text">{!! $product->description !!}</p>
                    <p class="card-text">Cena: <span class="badge badge-info">{{ $product->price }} EUR</span></p>
                    <p class="card-text">
                        <a class="btn btn-outline-info btn-sm" href='{{ url('cart/add', $product->id) }}'>Pievienot grozam</a>
                    </p>
                    @if ( !Auth::guest() && Auth::user()->isAdmin() )
                    <p class="card-text mt-1">
                        <a class="btn btn-warning btn-sm" href="{{ url('product', $product['id']) }}/edit">Rediget</a>
                        <a class="btn btn-danger btn-sm" href="{{ url('product', $product['id']) }}/remove">Dzest</a>
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection