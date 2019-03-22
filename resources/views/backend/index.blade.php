@extends('_layouts.main')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- START card-->
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left"><em
                            class="fa fa-dashboard fa-3x"></em></div>
                <div class="col-8 py-3 bg-primary rounded-right">
                    <div class="h2 mt-0">{{ $activeCounter }}</div>
                    <div class="text-uppercase">Ocorrências em curso</div>
                </div>
            </div>
        </div>
    </div>
@endsection