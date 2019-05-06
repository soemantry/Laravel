<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = ['id','judul', 'kategori', 'tahunTerbit', 'penerbit' ];
}
