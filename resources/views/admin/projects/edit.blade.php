@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            <h1>
               Modifica Progetto
            </h1>
        </div>
    </div>

    @include('partials.success')

    @include('partials.errors')

    <div class="row mb-4">
        <div class="col">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo di un progetto*</label>
                    <input type="text" 
                           name="title"
                           class="form-control" 
                           id="title" 
                           maxlength="255"
                           required
                           value={{ old('title', $project->title) }}
                           placeholder="Inserisci titolo di un progetto..">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione progetto*</label>
                    <textarea class="form-control" 
                              name="description"
                              id="description" 
                              rows="10" 
                              maxlength="4096"
                              required
                              placeholder="Inserisci la descrizione di un progetto..">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Immagine in evidenza</label>

                    @if($project->img)
                        <div class="form-check mb-2">
                            <input type="checkbox" 
                                   name="delete_img"
                                   id="delete_img"
                                   class="form-check-input">
                            <label for="delete_img" class="form-check-label">
                                Cancella immagine in evidenza
                            </label>
                        </div>

                        <div class="mb-2">
                            <img src=" {{ asset('storage/'.$project->img )}}" style="height: 200px;">
                        </div>
                    @endif 
                    <input type="file" 
                           name="img"
                           class="form-control" 
                           id="img" 
                           accept="image/"
                           placeholder="Inserisci l'immagine in evidenza..">

                <div>
                    <button type="submit" class="btn btn-warning">
                        Aggiorna
                    </button>
                </div>
                </div>

                
            </form>
        </div>
    </div>
</div>

@endsection