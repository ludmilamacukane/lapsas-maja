@extends('app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Rediget produktu "{{ $product->name }}"</h4>
                        <div class="card-text">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {!! Form::open(['action' => ['ProductsController@update', $product->id]]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Nosaukums:') !!}
                                {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Apraksts:') !!}
                                {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('price', 'Cena:') !!}
                                {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
                            </div>

                            <button class="btn btn-success" type="submit">Rediget</button>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
