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
        <div class="col-xl-3 col-md-6">
            <!-- START card-->
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-warning-dark justify-content-center rounded-left"><em
                            class="fa fa-fire fa-3x"></em></div>
                <div class="col-8 py-3 bg-warning rounded-right">
                    <div class="h2 mt-0">{{ $activeFires->count() }}</div>
                    <div class="text-uppercase">Incêndios em curso</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-purple-dark justify-content-center rounded-left"><em
                            class="fa fa-fire fa-3x"></em></div>
                <div class="col-8 py-3 bg-purple rounded-right">
                    <div class="h2 mt-0">{{ $todayOccurrences->count() }}</div>
                    <div class="text-uppercase">Ocorrências hoje</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-purple-dark justify-content-center rounded-left"><em
                            class="fa fa-fire fa-3x"></em></div>
                <div class="col-8 py-3 bg-purple rounded-right">
                    <div class="h2 mt-0">{{ $yesterdayOccurrences->count() }}</div>
                    <div class="text-uppercase">Ocorrências ontem</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card b">
                <div class="map" id="map" data-latitude="39.694781" data-longitude="-8.130291"
                     style="height: 70vh;" data-markers="{{ $activeFires->toJson() }}"
                     data-zoom="8" data-kml="/latest.kml"></div>
            </div>
        </div>
    </div>
@endsection