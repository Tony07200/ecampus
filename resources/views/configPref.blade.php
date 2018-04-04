@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid conteneur_config">
        <div class="row ">
            @include('navBarConfig')
            <div class="col-lg-9 col-12 contenu_config">
                <!-- DEBUT VOS PREFERENCES -->
                <div id="box-preferences-personnel">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center" id="bandeau_naviguation">
                            <h1><img src="{{asset('images/preferences.png')}}" alt="Bandeau des preferences" class="img-fluid">Votre compte : Gestion des préférences personnelles</h1>
                        </div>
                        <div class="col-md-10  box_de_preference nopadding">
                            <p class="title text-center">Connexion et sécurité</p>
                        </div>
                        <div class="col-md-10   box_de_preference nopadding">
                            <p class="title text-center"> Informations personnelles et confidentialité</p>
                        </div>
                        <div class="col-md-10  box_de_preference nopadding">
                            <p class="title text-center ">Préférences de compte</p>
                        </div>
                    </div>
                </div>
                <!--FIN DE VOS PREFERENCES -->
            </div>
        </div>
    </div>

@endsection
