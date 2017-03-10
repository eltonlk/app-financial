@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4>Listagem de Bancos</h4>

        <a href="{{ route('admin.banks.create') }}" class="btn waves-effect">Adicionar</a>

        @include('shared.filter')

        <table class="bordered striped highlight responsive-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banks as $bank)
                    <tr>
                        <td>{{ $bank->id }}</td>
                        <td><img src="{{ asset('storage/banks/images/' . $bank->logo) }}" width="24" /></td>
                        <td>{{ $bank->name }}</td>
                        <td>
                            <a href="{{ route('admin.banks.edit', $bank->id) }}">Editar</a>
                            |
                            <destroy-action id="bank_{{ $bank->id }}" action="{{ route('admin.banks.destroy', $bank->id) }}" csrf-token="{{ csrf_token() }}"></destroy-action>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $banks->links() !!}
    </div>
@endsection
