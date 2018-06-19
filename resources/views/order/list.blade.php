@extends('app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pasutijumi</h4>
                        <div class="card-text">
                            <table class="table table-hover">
                                <thead><tr class="table-info">
                                    <th scope="col">Pasutijuma Nr.</th>
                                    <th scope="col">Piegades adrese</th>
                                    <th scope="col">Telefona numurs</th>
                                    <th scope="col">Komentari</th>
                                </tr></thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><a href="order/{{ $order->id }}">{{ $order->id }}</a></td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->comment }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
