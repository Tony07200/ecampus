@extends('layouts.layout')


@section('contenu')
    <!-- CONTENU -->
    <div class="container-fluid conteneur_config">
        <div class="row ">
            @include('navBarConfig')
            <div class="col-lg-9 col-12 contenu_config">
                <!--****************  INFORMATIONS PERSONNELS   ************************************************** -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3><img src="{{asset('images/infos_perso.png')}}" alt="Bandeau des preferences"
                                 class="img-fluid logo-config">Vos informations personnelles : Modification de vos données
                            personnelles</h3>
                    </div>

                    <div class="card-deck">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ma description</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-text">{{$user->description}}
                                </div>


                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-info" data-toggle="modal" data-target="#description">
                                    Modifier
                                </button>
                            </div>
                        </div>
                        <div class="card">
                            <form action="{{URL::route('update_info')}}" method="post">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Mon Profil</h3>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <h5>Nom</h5>

                                                    <input id="name" type="text"
                                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                           name="name" value="{{strtoupper($user->name)}}">
                                                </li>
                                                <li class="list-group-item">

                                                    <h5>Prenom</h5>
                                                    <input id="firstname" type="text"
                                                           class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                           name="firstname" value="{{ucfirst($user->firstname)}}">

                                                </li>
                                                <li class="list-group-item">

                                                    <h5>Date de Naissance</h5>
                                                    <input id="birthdate" type="text"
                                                           class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                                           name="birthdate" value="{{$user->birthdate}}">

                                                </li>
                                                <li class="list-group-item">
                                                    <h5>Email</h5>
                                                    <input id="email" type="text"
                                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                           name="email" value="{{$user->email}}">

                                                </li>
                                                <li class="list-group-item">
                                                    <h5>Paypal</h5>

                                                    <input id="paypal" type="text"
                                                           class="form-control{{ $errors->has('paypal') ? ' is-invalid' : '' }}"
                                                           name="paypal" value="{{$user->paypal}}">
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>

                                <div class="card-footer text-right mt-3">
                                    <input type="submit" value="Modifier" name="submit_profil"
                                           class="btn btn-info">
                                </div>
                        </div>
                        </form>
                        <div class="card ">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ma Photo</h3>
                                </div>
                                <div class="card-body">
                                    <img src="{{asset('images/Users')}}/{{$user->image_profil}}"
                                         alt="Avatar Romaric"
                                         class="rounded border img-fluid">
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#photo">Modifier
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--****************  FIN DE INFORMATIONS PERSONNELS   ************************************************** -->

@endsection
