@extends('app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pievienot produktu</h4>
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

                            {!! Form::open(['action' => 'ProductsController@store']) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Nosaukums:') !!}
                                {!! Form::text('name', '', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Apraksts:') !!}
                                {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('price', 'Cena:') !!}
                                {!! Form::text('price', '', ['class' => 'form-control']) !!}
                            </div>

                            <button class="btn btn-success" type="submit">Pievienot</button>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
