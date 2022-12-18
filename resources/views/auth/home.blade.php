@extends('dashboard')
@section('content')
<main class="home-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h3 class="card-header text-center">Home</h3>
                    <div class="card-body">
                        @CSRF
                        <table id = "editable" class = "table table-bordered table-striped">
                            <thead class = "table-dark" >
                                <tr>
                                    <th scope = "col">ID</th>
                                    <th scope = "col">Name</th>
                                    <th scope = "col">Artist</th>
                                    <th scope = "col">Collab Artists</th>
                                    <th scope = "col">Album</th>
                                    <th scope = "col">Release Year</th>
                                    <th scope = "col">Genre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($songs as $song)
                                <tr>
                                    <td>{{ $song->id }}</td>
                                    <td>{{ $song->name }}</td>
                                    <td>{{ $song->artist }}</td>
                                    <td>{{ $song->collab_artists }}</td>
                                    <td>{{ $song->album }}</td>
                                    <td>{{ $song->release_year }}</td>
                                    <td>{{ $song->genre }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('addsong') }}" class="btn btn-xs btn-info pull-right">Add Song</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type = "text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-Token' : $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url:'{{ route("tabledit.action") }}',
            dataType: "json",
            columns:{
                identifier:[0, 'id'],
                editable:[[1, 'name'], [2, 'artist'], [3, 'collab_artists'], [4, 'album'], [5, 'release_year'], [6, 'genre']]
            },
            buttons: {
                edit: {
                    class: 'btn btn-sm btn-secondary',
                    html: '<span class = "fas fa-pencil-alt"></span>',
                    action: 'edit'
                },
                delete:{
                    class: 'btn btn-sm btn-secondary',
                    html: '<span class = "fas fa-trash"></span>',
                    action: 'delete'
                }
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
               if(data.action == 'delete')
               {
                    $('#'+data.id).remove();
                    $('#editable').DataTable().ajax.reload();
               }
            }
        });
    });
</script>
@endsection
