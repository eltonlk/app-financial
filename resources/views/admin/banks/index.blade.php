@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4>Listagem de Bancos</h4>

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

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $banks->links() !!}
    </div>
@endsection
