<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    //Relaciones
public function permissions()
{
    return $this->hasMany('App\Permission');
}
public function users()
{
    return $this->belongsToMany('App\User');
}
    //almacenamiento
public function store($request)
{
    $slug= Str::slug($request->name,'-');
    alert('exito','el rol se ha aguardado','success')->showConfirmButton();

    return self::create($request->all() + [
        'slug'=> $slug,
    ]);
}
public function my_update($request)
{
    $slug= Str::slug($request->name, '-');
    self::update($request->all() + [
        'slug'=> $slug,
    ]);
    alert('exito','el rol se ha actualizado','success')->showConfirmButton();
}
//validacion

//Recuperacion
    
}
