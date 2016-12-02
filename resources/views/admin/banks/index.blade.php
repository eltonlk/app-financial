@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4>Listagem de Bancos</h4>

        <a href="{{ route('admin.banks.create') }}" class="btn waves-effect">Adicionar</a>

        <table class="bordered striped highlight responsive-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banks as $bank)
                    <tr>
                        <td>{{ $bank->id }}</td>
                        <td>{{ $bank->name }}</td>
                        <td>
                            <a href="{{ route('admin.banks.edit', $bank->id) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $banks->links() !!}
    </div>
@endsection
