<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    protected $fillable =[
        'name', 'slug','description', 'role_id'
    ];

    //relaciones
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function users()
    {
        return $this->belongsToMany('app\User')->withTimestamps();
    }

    public function store($request)
    {
        $slug = str::slug($request->name, '-');
        alert('exito', 'El permiso ha sido creado', 'success')->showConfirmButton();
        return self::create($request->all() + [
            'slug' => $slug,
        ]);
    }

    public function my_update($request)
    {
        $slug = str::slug($request->name, '-');
        return self::update($request->all() + [
            'slug' => $slug,
        ]);
        alert('Exito', 'El permiso se ha actualizado', 'success')->showConfirmButton();

    }



}
