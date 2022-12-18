<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Songs;

class CustomDBController extends Controller
{
    public function index()
    {
        $songs = Songs::where('userid', Auth::id())->get();
        return view('auth.home', ['songs' =>  $songs]);
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {

                $name = $request->name;
                $data = array(
                    'name' => $request->name,
                    'artist' => $request->artist,
                    'collab_artists' => $request->collab_artists,
                    'album' => $request->album,
                    'release_year' => $request->release_year,
                    'genre' => $request->genre
                );

                DB::table('songs')->where('id', $request->id)->update($data);
            }
            if($request->action == "delete")
            {
                DB::table('songs')->where('id', $request->id)->delete();

            }

            return request()->json($request);

        }

    }

    public function AddSong()
    {
        return view('auth.addsong');
    }

    public function customAddSong(Request $request)
    {
        Songs::create([
            'userid' => Auth::id(),
            'name' => $request->name,
            'artist' => $request->artist,
            'collab_artists' => $request->collab_artists,
            'album' => $request->album,
            'release_year' => $request->release_year,
            'genre' => $request->genre
        ]);
        return redirect("home");
    }
}
