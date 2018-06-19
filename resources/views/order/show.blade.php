@extends('app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pasutijums Nr: {{$order->id}}</h4>
                        <div class="card-text">
                            <table class="table table-hover">
                                <thead><tr class="table-info">
                                    <th scope="col">Produkts</th>
                                    <th scope="col">Cena</th>
                                    <th scope="col">Dadzums</th>
                                    <th scope="col">Kopa</th>
                                </tr></thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    @foreach($order->productOrders()->get() as $productOrder)
                                        <tr>
                                            <td>{{ $productOrder->product->name }}</td>
                                            <td>{{ $productOrder->product->price }}</td>
                                            <td>{{ $productOrder->amount }}</td>
                                            <td>{{ $productOrder->price }}</td>
                                        </tr>
                                        <?php $total += $productOrder->price; ?>
                                    @endforeach
                                    <tr class="table-info">
                                        <td colspan="3"></td>
                                        <td>{{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-text">Piegades adrese: {{ $order->address }}</p>
                        <p class="card-text">Telefona numurs: {{ $order->phone }}</p>
                        @if ($order->comment)
                            <p class="card-text">Komentari: {{ $order->comment }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
