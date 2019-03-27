@extends('_layouts.main')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card b">
                <div class="card-header">
                    <div class="float-right mt-2">
                        <div class="badge badge-danger">{{ $occurrence->state }}</div>
                        <div class="badge badge-info">Última
                            Atualização: {{ $occurrence->created_at }}</div>
                    </div>
                    <h4 class="my-2">
                        <strong>{{ $occurrence->county->name }}</strong>, {{ $occurrence->locality }}
                        <small>Número: {{ $occurrence->prociv_id }}</small>
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
                                <td>{{ $occurrence->NumeroOperacionaisTerrestresEnvolvidos }}</td>
                            </tr>
                            <tr>
                                <td><strong>Veículos Terrestres</strong></td>
                                <td>{{ $occurrence->NumeroMeiosTerrestresEnvolvidos }}</td>
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
                                <td>{{ $occurrence->NumeroOperacionaisAereosEnvolvidos }}</td>
                            </tr>
                            <tr>
                                <td><strong>Veículos Aéreos</strong></td>
                                <td>{{ $occurrence->NumeroMeiosAereosEnvolvidos }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @if ($occurrence->important)
                <div class="card b">
                    <div class="card-header">
                        <h4 class="my-2">Mais detalhes</h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td><strong>Aviões Médios</strong></td>
                                    <td>{{ $occurrence->NumAvioesMediosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Aviões Pesados</strong></td>
                                    <td>{{ $occurrence->NumAvioesPesadosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Bombeiros Operacionais</strong></td>
                                    <td>{{ $occurrence->NumBombeirosOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Esf Operacionais</strong></td>
                                    <td>{{ $occurrence->NumEsfOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>FAA Operacionais</strong></td>
                                    <td>{{ $occurrence->NumFAAOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Feb Operacionais</strong></td>
                                    <td>{{ $occurrence->NumFebOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>GNRGips Operacionais</strong></td>
                                    <td>{{ $occurrence->NumGNRGipsOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>GNROutros Operacionais</strong></td>
                                    <td>{{ $occurrence->NumGNROutrosOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PSP Operacionais</strong></td>
                                    <td>{{ $occurrence->NumPSPOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Helicópetros Ligeiros/Médios</strong></td>
                                    <td>{{ $occurrence->NumHelicopterosLigeirosMediosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Helicópetros Outros</strong></td>
                                    <td>{{ $occurrence->NumHelicopterosOutrosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>COS</strong></td>
                                    <td>{{ $occurrence->COS }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Entidades No TO</strong></td>
                                    <td>{{ $occurrence->EntidadesNoTO }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Ponto Situação</strong></td>
                                    <td>{{ $occurrence->PontoSituacao }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td><strong>Outros aviões</strong></td>
                                    <td>{{ $occurrence->NumAvioesOutrosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Operacionais Aéreos</strong></td>
                                    <td>{{ $occurrence->NumeroOperacionaisAereosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Bombeiros</strong></td>
                                    <td>{{ $occurrence->NumBombeirosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Esf</strong></td>
                                    <td>{{ $occurrence->NumEsfEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>FAA</strong></td>
                                    <td>{{ $occurrence->NumFAAEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Feb</strong></td>
                                    <td>{{ $occurrence->NumFebEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>GNRGips</strong></td>
                                    <td>{{ $occurrence->NumGNRGipsEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>GNROutros</strong></td>
                                    <td>{{ $occurrence->NumGNROutrosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PSP</strong></td>
                                    <td>{{ $occurrence->NumPSPEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Helicópetros Outros</strong></td>
                                    <td>{{ $occurrence->NumHelicopterosPesadosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>N/A</strong></td>
                                    <td>{{ "" }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PCO</strong></td>
                                    <td>{{ $occurrence->PCO }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Descrição POSIT</strong></td>
                                    <td>{{ $occurrence->POSITDescricao }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PPI Ativados</strong></td>
                                    <td>{{ $occurrence->PPIAtivados }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
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