@extends('app')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Izveletie produkti</h4>
                <div class="card-text">
                    <table class="table table-hover">
                        <thead><tr class="table-info">
                            <th scope="col">Produkts</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Daudzums</th>
                            <th scope="col">Kopa</th>
                            <th scope="col"></th>
                        </tr></thead>
                        <tbody>
                        @foreach ( $products as $product )
                        <tr>
                            <td>{{ $product['product']->name }}</td>
                            <td>{{ $product['product']->price }}</td>
                            <td>{{ $product['amount'] }}</td>
                            <td>{{ $product['total'] }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href='{{ url('cart/remove', $product['product']->id) }}'>-</a>
                                <a class="btn btn-info btn-sm" href='{{ url('cart/add', $product['product']->id) }}'>+</a>
                            </td>
                        </tr>
                        @endforeach 
                        <tr class="table-info">
                            <td colspan="4"></td>
                            <td>{{ $total }}</td>
                        </tr>                        
                        </tbody>
                    </table>
                </div>
                    <a href="order/create" class="btn btn-success float-right">Pasutit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection