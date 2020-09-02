<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable =[
        'name', 'slug','descripcion'
    ];

    //relaciones
    public function role()
    {
        return $this->belongsTo('app\Role');
    }
    public function users()
    {
        return $this->belongsToMany('app\User')->withTimestamps();
    }

}
