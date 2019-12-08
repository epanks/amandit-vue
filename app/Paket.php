<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $guarded = [];
    protected $table = 'paket';
    protected $fillable = [
        'kdsatker', 'nmpaket', 'pagurmp', 'trgoutput', 'satoutput', 'trgoutcome', 'satoutcome', 'kdoutput', 'TahunFisik', 'pagurmawal'
    ];
}
