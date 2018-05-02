@extends('layouts.layout')

@section('contenu')

    <div class="container-fluid pt-4 pb-4 bandeau-sombre">
        <div class="container">
            <h1><i class="far fa-file-alt"></i> Formulaire d'ajout de tutoriel</h1>
            <p><b><u> {{ $user->firstname }}</u></b>, vous allez ajouter un nouveau tutoriel à votre profil !</p>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un nouveau <b>tutoriel</b> à votre profil</div>

                    <div class="card-body">
                        <form method="POST" action="{{URL::route('store-tuto')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="type" value="tutorial">
                            <div class="form-group">
                                <label for="selecteur_tuto">Selectionner une catégorie </label>
                                <select class="custom-select {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                        name="category_id" id="selecteur_tuto">
                                    <option selected disabled>Choisir une categorie..</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="title">Titre de votre tutoriel</label>
                                <input type="text" name="title"
                                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title"
                                       placeholder="Titre du tutoriel" nb_max="50"
                                       title="Maximum 50 caractères">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description de votre tutoriel</label>
                                <input type="text" name="description"
                                       class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                       placeholder="Un descriptif rapide de votre tutoriel.." nb_max="150"
                                       id="description_tuto" title="Maximum 150 caractères">
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="imgpublication">Image de votre tutoriel</label>
                                <input type="file" name="imgpublication" class="form-control" id="imgpublication">
                            </div>
                            <div class="form-group">
                                <label for="price">Prix de votre tutoriel</label>
                                <input type="text" name="price" value="0" id="price"
                                       placeholder="Prix du tutoriel (Si gratuit ne pas remplir)"
                                       class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                       title="Oui, mais combien ?">
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="prerequis">Prérequis de votre tutoriel</label>
                                <input type="text" name="required" id="required" title="Maximum 100 caractères"
                                       class="form-control{{ $errors->has('required') ? ' is-invalid' : '' }}"
                                       placeholder="Prerequis du tutoriel">
                                @if ($errors->has('required'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('required') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="objectifs">Objectifs de votre tutoriel</label>
                                <input type="text" name="goals" id="objectifs" title="Maximum 100 caractères"
                                       class="form-control{{ $errors->has('goals') ? ' is-invalid' : '' }}"
                                       placeholder="Objectifs du tutoriel">
                                @if ($errors->has('goals'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('goals') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<label for="liste_fichier">Liste de fichiers présents dans le tutoriel</label>--}}
                            {{--<input type="file" name="files" id="files"  class="form-control">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="editor_tutorial">Saisir le contenu de votre tutoriel</label>
                                <input type="hidden" name="content">
                                <div name="editor_tutorial" id="editor_tutorial"
                                          class="form-control" style="height: 300px;"></div>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 offset-md-4">
                                    <button type="reset" class="btn btn-danger" value="Effacer">Effacer</button>
                                    <button type="submit" class="btn btn-primary" value="Enregistrer">Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_tuto')
    <script>
        //Editor View AddTutorial
        var quill = new Quill('#editor_tutorial', {
            modules: {
                toolbar: [
                    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                    ['bold', 'italic', 'underline', 'strike','link'],        // toggled buttons
                    ['code-block'],

                    [{ 'list': 'bullet' }],

                    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                    [{ 'align': [] }]
                ]
            },
            placeholder: 'Le contenu de votre tutoriel...',
            theme: 'snow'  // or 'bubble'
        });

        quill.on('text-change', function () {
            var content = document.querySelector('input[name=content]');
            content.value = quill.root.innerHTML;
            console.log(content);
        });
    </script>
@endpush