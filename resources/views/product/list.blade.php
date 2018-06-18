@extends('app')
@section('content')
<div class="list-group">
    <div class="list-group-item list-group-item-info">
        <h4 class="float-left">Produkti</h4>
        @if ( !Auth::guest() && Auth::user()->isAdmin() )
        <a class="float-right btn btn-primary btn-sm" href="/product/add">Pievienot</a>
        @endif
    </div>

    <div class="list-group-item">
        <div class="card-deck">
            <?php $i=0; ?>
            @foreach ( $products as $product )
            @if ($i==2)
            <?php $i=1; ?>
        </div>
        <div class="card-deck">
            @else <?php $i++; ?>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-secondary" href="{{ url('product', $product['id']) }}/show">{{ $product->name }}</a>
                        <span class="badge badge-info">{{ $product->price }} EUR</span>
                    </h5>
                    <div class="card-text">
                        <span>{{ $product->description }}</span>
                    </div>
                    @if ( !Auth::guest() && Auth::user()->isAdmin() )
                    <p class="card-text">
                        <a class="btn btn-warning btn-sm" href="{{ url('product', $product['id']) }}/edit">Rediget</a>
                        <a class="btn btn-danger btn-sm" href="{{ url('product', $product['id']) }}/remove">Dzest</a>
                    </p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
