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
            @if ($occurrence->last_detail->important)
                <div class="card b">
                    <div class="card-header">
                        <h4 class="my-2">Mais detalhes</h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td><strong>Aviões Médios</strong></td>
                                    <td>{{ $occurrence->last_detail->NumAvioesMediosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Aviões Pesados</strong></td>
                                    <td>{{ $occurrence->last_detail->NumAvioesPesadosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Bombeiros Operacionais</strong></td>
                                    <td>{{ $occurrence->last_detail->NumBombeirosOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Esf Operacionais</strong></td>
                                    <td>{{ $occurrence->last_detail->NumEsfOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>FAA Operacionais</strong></td>
                                    <td>{{ $occurrence->last_detail->NumFAAOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Feb Operacionais</strong></td>
                                    <td>{{ $occurrence->last_detail->NumFebOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>GNRGips Operacionais</strong></td>
                                    <td>{{ $occurrence->last_detail->NumGNRGipsOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>GNROutros Operacionais</strong></td>
                                    <td>{{ $occurrence->last_detail->NumGNROutrosOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PSP Operacionais</strong></td>
                                    <td>{{ $occurrence->last_detail->NumPSPOperEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Helicópetros Ligeiros/Médios</strong></td>
                                    <td>{{ $occurrence->last_detail->NumHelicopterosLigeirosMediosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Helicópetros Outros</strong></td>
                                    <td>{{ $occurrence->last_detail->NumHelicopterosOutrosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>COS</strong></td>
                                    <td>{{ $occurrence->last_detail->COS }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Entidades No TO</strong></td>
                                    <td>{{ $occurrence->last_detail->EntidadesNoTO }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Ponto Situação</strong></td>
                                    <td>{{ $occurrence->last_detail->PontoSituacao }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table">
                                <tr>
                                    <td><strong>Outros aviões</strong></td>
                                    <td>{{ $occurrence->last_detail->NumAvioesOutrosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Operacionais Aéreos</strong></td>
                                    <td>{{ $occurrence->last_detail->NumeroOperacionaisAereosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Bombeiros</strong></td>
                                    <td>{{ $occurrence->last_detail->NumBombeirosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Esf</strong></td>
                                    <td>{{ $occurrence->last_detail->NumEsfEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>FAA</strong></td>
                                    <td>{{ $occurrence->last_detail->NumFAAEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Feb</strong></td>
                                    <td>{{ $occurrence->last_detail->NumFebEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>GNRGips</strong></td>
                                    <td>{{ $occurrence->last_detail->NumGNRGipsEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>GNROutros</strong></td>
                                    <td>{{ $occurrence->last_detail->NumGNROutrosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PSP</strong></td>
                                    <td>{{ $occurrence->last_detail->NumPSPEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Helicópetros Outros</strong></td>
                                    <td>{{ $occurrence->last_detail->NumHelicopterosPesadosEnvolvidos }}</td>
                                </tr>
                                <tr>
                                    <td><strong>N/A</strong></td>
                                    <td>{{ "" }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PCO</strong></td>
                                    <td>{{ $occurrence->last_detail->PCO }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Descrição POSIT</strong></td>
                                    <td>{{ $occurrence->last_detail->POSITDescricao }}</td>
                                </tr>
                                <tr>
                                    <td><strong>PPI Ativados</strong></td>
                                    <td>{{ $occurrence->last_detail->PPIAtivados }}</td>
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