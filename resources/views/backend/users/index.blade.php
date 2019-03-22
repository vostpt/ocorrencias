@extends('_layouts.main')

@section('content')
    <h2>Lista de utilizadores</h2>
    <div class="table-responsive">
        <table class="table table-striped my-4 w-100" id="occurrences-table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="#"><i class="fa fa-edit"></i></a>
                        <a href="#"><i class="fa fa-comment"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection