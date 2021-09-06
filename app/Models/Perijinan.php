<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perijinan extends Model
{
	protected $table	= 'perijinans';
	protected $fillable	= ['nama_perijinan','singkatan_perijinan','slug_perijinan'];
}
