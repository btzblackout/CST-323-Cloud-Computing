@extends('dashboard')
@section('content')
<main class = "addsong-form">
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-4">
                <div class = "card">
                    <h3 class="card-header text-center">Add Song</h3>
                        <div class="card-body">
                            <form action="{{ route('addsong.custom') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                        required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Artist" id="artist" class="form-control"
                                        name="artist" required autofocus>
                                    @if ($errors->has('artist'))
                                    <span class="text-danger">{{ $errors->first('artist') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Collab Artists" id="collab_artists" class="form-control"
                                        name="collab_artists" autofocus>
                                    @if ($errors->has('collab_artists'))
                                    <span class="text-danger">{{ $errors->first('collab_artists') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Album" id="album" class="form-control"
                                        name="album" required autofocus>
                                    @if ($errors->has('album'))
                                    <span class="text-danger">{{ $errors->first('album') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Release Year" id="release_year" class="form-control"
                                        name="release_year" required autofocus>
                                    @if ($errors->has('release_year'))
                                    <span class="text-danger">{{ $errors->first('release_year') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Genre" id="genre" class="form-control"
                                        name="genre" required autofocus>
                                    @if ($errors->has('genre'))
                                    <span class="text-danger">{{ $errors->first('genre') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Add</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
