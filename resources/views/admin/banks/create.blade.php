@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4>Adicionar Banco</h4>

        <a href="{{ route('admin.banks.index') }}" class="btn waves-effect grey">Voltar</a>

        {!! Form::open([ 'route' => 'admin.banks.store', 'files' => true ]) !!}
            @include('admin.banks._form')

            {!! Form::submit('Criar Banco', [ 'class' => 'btn waves-effect']) !!}
        {!! Form::close() !!}
    </div>
@endsection
