@extends('layouts.layout')

@section('pageTitle', 'Documents')

@section('content')

    @include('layouts.modals.imageModal')

    @include('layouts.modals.seasonsModal', ['id' => 'huntersList', 'name' => 'Liste Sociétaires'])
    @include('layouts.modals.seasonsModal', ['id' => 'wineBoxesList', 'name' => 'Caisses de vin'])
    @include('layouts.modals.seasonsModal', ['id' => 'lessorsList', 'name' => 'Liste Bailleurs'])
    @include('layouts.modals.headerModal', ['id' => 'huntersAttendanceList', 'name' => 'Liste Présence'])

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Etiquettes Sociétaires</div>
                <div class="panel-body text-center" style="height:350px">
                    <div class="">
                        <a href="#" class="pop">
                            <img src="{{ asset('img/huntersEtiquettes.PNG') }}" alt="Aperçu Etiquettes Sociétaires" class="img-responsive center-block" style="max-height: 250px;"  >
                        </a>
                    </div>
                    <br>
                    <a href="{{ route('huntersEtiquettes') }}" class="btn btn-primary" target="_blank">Toutes les étiquettes</a>
                    <a href="{{ route('huntersEtiquettesSelection') }}" class="btn btn-primary">Séléction d'étiquettes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Liste Sociétaires</div>
                <div class="panel-body text-center" style="height:350px">
                    <div class="">
                        <a href="#" class="pop">
                            <img src="{{ asset('img/huntersList.PNG') }}" alt="Aperçu Liste Sociétaires" class="img-responsive center-block" style="max-height: 250px;"  >
                        </a>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#huntersListModal">Télécharger</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Liste Présence</div>
                <div class="panel-body text-center" style="height:350px">
                    <div class="">
                        <a href="#" class="pop">
                            <img src="{{ asset('img/huntersAttendanceList.PNG') }}" alt="Aperçu Liste Présence" class="img-responsive center-block" style="max-height: 250px;"  >
                        </a>
                    </div>
                    <br>
                    <!-- <a href="{{ route('huntersAttendanceList') }}" class="btn btn-primary">Télécharger</a> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#huntersAttendanceListModal">Télécharger</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Caisses de vin</div>
                <div class="panel-body text-center" style="height:350px">
                    <div class="">
                        <a href="#" class="pop">
                            <img src="{{ asset('img/wineBoxesList.PNG') }}" alt="Aperçu Caisses de vin" class="img-responsive center-block" style="max-height: 250px;"  >
                        </a>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wineBoxesListModal">Télécharger</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Liste Bailleurs</div>
                <div class="panel-body text-center" style="height:350px">
                    <div class="">
                        <a href="#" class="pop">
                            <img src="{{ asset('img/lessorsList.PNG') }}" alt="Aperçu Liste Bailleurs" class="img-responsive center-block" style="max-height: 250px;"  >
                        </a>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lessorsListModal">Télécharger</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Etiquettes Bailleurs</div>
                <div class="panel-body text-center" style="height:350px">
                    <div class="">
                        <a href="#" class="pop">
                            <img src="{{ asset('img/lessorsEtiquettes.PNG') }}" alt="Aperçu Etiquettes Bailleurs" class="img-responsive center-block" style="max-height: 250px;"  >
                        </a>
                    </div>
                    <br>
                    <a href="{{ route('lessorsEtiquettes') }}" class="btn btn-primary" target="_blank">Toutes les étiquettes</a>
                    <a href="{{ route('lessorsEtiquettesSelection') }}" class="btn btn-primary">Séléction d'étiquettes</a>
                </div>
            </div>
        </div>
    </div>





@endsection

@section('script')
    <script>
    $(function() {
        $('.pop').on('click', function() {
            document.getElementById("title").innerHTML = '';
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            document.getElementById("title").innerHTML = $(this).find('img').attr('alt');
            $('#imagemodal').modal('show');
        });
    });
    </script>

@endsection
