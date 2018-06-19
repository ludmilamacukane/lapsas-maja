@extends('app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pievienotie produkti</h4>
                        <div class="card-text">
                            <table class="table table-hover">
                                <thead><tr class="table-info">
                                    <th scope="col">Produkts</th>
                                    <th scope="col">Cena</th>
                                    <th scope="col">Daudzums</th>
                                    <th scope="col">Kopa</th>
                                </tr></thead>
                                <tbody>
                                @foreach ( $products as $product )
                                    <tr>
                                        <td>{{ $product['product']->name }}</td>
                                        <td>{{ $product['product']->price }}</td>
                                        <td>{{ $product['amount'] }}</td>
                                        <td>{{ $product['total'] }}</td>
                                    </tr>
                                @endforeach
                                <tr class="table-info">
                                    <td colspan="3"></td>
                                    <td>{{ $total }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(['action' => 'OrderController@store']) !!}

                        <div class="form-group">
                            {!! Form::label('address', 'Piegades adrese:') !!}
                            {!! Form::text('address', '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Telefona numurs:') !!}
                            {!! Form::text('phone', '', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('comment', 'Komentari:') !!}
                            {!! Form::textarea('comment', '', ['class' => 'form-control']) !!}
                        </div>

                        <button class="btn btn-success" type="submit">Pasutit</button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
