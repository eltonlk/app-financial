@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4>Adicionar Banco</h4>

        <a href="{{ route('admin.banks.index') }}" class="btn waves-effect grey">Voltar</a>

        {!! Form::model($bank, [ 'route' => [ 'admin.banks.update', $bank->id ], 'method' => 'put', 'files' => true ]) !!}
            @include('admin.banks._form')

            {!! Form::submit('Alterar Banco', [ 'class' => 'btn waves-effect']) !!}
        {!! Form::close() !!}
    </div>
@endsection
