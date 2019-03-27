@extends('_layouts.main')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card b">
                <div class="card-header">
                    <div class="float-right mt-2">
                        <div class="badge badge-danger">{{ $occurrence->last_detail->state }}</div>
                        <div class="badge badge-info">Última
                            Atualização: {{ $occurrence->last_detail->created_at }}</div>
                    </div>
                    <h4 class="my-2">
                        #IF<strong>{{ $occurrence->county->name }}</strong>, {{ $occurrence->locality }}
                    </h4>
                </div>
                <div class="row">
                    <div class="col-6">
                        <table class="table">
                            <tr>
                                <td><strong>Natureza</strong></td>
                                <td>{{ $occurrence->type->name }} (Código: {{ $occurrence->type->code }})</td>
                            </tr>
                            <tr>
                                <td><strong>Operacionais Terrestres</strong></td>
                                <td>{{ $occurrence->last_detail->NumeroOperacionaisTerrestresEnvolvidos }}</td>
                            </tr>
                            <tr>
                                <td><strong>Veículos Terrestres</strong></td>
                                <td>{{ $occurrence->last_detail->NumeroMeiosTerrestresEnvolvidos }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table">
                            <tr>
                                <td><strong>Começo</strong></td>
                                <td>{{ $occurrence->started_at }}</td>
                            </tr>
                            <tr>
                                <td><strong>Operacionais Aéreos</strong></td>
                                <td>{{ $occurrence->last_detail->NumeroOperacionaisAereosEnvolvidos }}</td>
                            </tr>
                            <tr>
                                <td><strong>Veículos Aéreos</strong></td>
                                <td>{{ $occurrence->last_detail->NumeroMeiosAereosEnvolvidos }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="card b">
                        <div class="card-header">
                            <h4 class="my-2">Comentários</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                @foreach ($occurrence->comments as $comment)
                                    <tr>
                                        <td class="text-center" style="width: 15%;">
                                            <a href="">
                                                <strong>{{ $comment->user->name }}</strong>
                                            </a>
                                        </td>
                                        <td class="text-right">
                                            <em>{{ $comment->created_at->diffForHumans() }}</em>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="padding-right: 10vw" class="comment-text">
                                            {!! nl2br(e($comment->text)) !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <div class="col-xl-12">
                                    <hr>
                                    <h4>Escrever um novo comentário</h4>
                                    <form class="form-horizontal"
                                          action="{{ route('admin.occurrences.storeComment', [$occurrence]) }}"
                                          method="post">
                                        @csrf
                                        <div class="form-group">
                                            <textarea class="form-control" id="text" name="text" rows="5"
                                                      placeholder="Novo comentário sobre a ocorrência"></textarea>
                                        </div>
                                        <div class="form-group pull-right">
                                            <button class="btn btn-sm btn-primary" type="submit">Publicar comentário
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card b">
                        <div class="card-header">
                            <h4 class="my-2">Localização</h4>
                        </div>
                        <div class="card-body">
                            <div class="map" id="map" data-latitude="{{ $occurrence->lat }}"
                                 data-longitude="{{ $occurrence->lon }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection