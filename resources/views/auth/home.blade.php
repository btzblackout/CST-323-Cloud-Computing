@extends('dashboard')
@section('content')
<main class="home-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Home</h3>
                    <div class="card-body">
                        <div class = row>
                            <div class = col-sm-6>
                                <p id = "label">First Name: </p>
                                <p id = "label">Email: </p>
                            </div>
                            <div class = col-sm-6>
                                <p id = "data">{{ $name->name }}</p>
                                <p id = "data">{{$name->email}}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
