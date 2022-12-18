<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $fillable = ['userid','name', 'artist', 'collab_artists', 'album', 'release_year', 'genre'];
    public $timestamps = false;
}
