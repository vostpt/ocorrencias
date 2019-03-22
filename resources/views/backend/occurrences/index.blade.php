@extends('_layouts.main')

@section('content')
    <h2>Lista de ocorrências</h2>
    <div class="table-responsive">
        <table class="table table-striped my-4 w-100" id="occurrences-table">
            <thead>
            <tr>
                <th>Número Prociv</th>
                <th>Distrito</th>
                <th>Concelho</th>
                <th>Localidade</th>
                <th>Natureza</th>
                <th>Estado</th>
                <th>OT</th>
                <th>VT</th>
                <th>OA</th>
                <th>VA</th>
                <th>Última Atualização</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($ocurrences as $ocurrence)
                <tr>
                    <td>{{ $ocurrence->prociv_id }}</td>
                    <td>{{ $ocurrence->district }}</td>
                    <td>{{ $ocurrence->county }}</td>
                    <td>{{ $ocurrence->locality }}</td>
                    <td>{{ $ocurrence->nature }}</td>
                    <td>{{ $ocurrence->state }}</td>
                    <td>{{ $ocurrence->NumeroOperacionaisTerrestresEnvolvidos }}</td>
                    <td>{{ $ocurrence->NumeroMeiosTerrestresEnvolvidos }}</td>
                    <td>{{ $ocurrence->NumeroOperacionaisAereosEnvolvidos }}</td>
                    <td>{{ $ocurrence->NumeroMeiosAereosEnvolvidos }}</td>
                    <td>{{ $ocurrence->last_update }}</td>
                    <td>{{ $ocurrence->started_at }}</td>
                    <td>
                        <a href="{{ route('admin.occurrences.single', $ocurrence->id) }}"><i class="fa fa-edit"></i></a>
                        <a href="#"><i class="fa fa-comment"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection