<?php

namespace App;

use App\InvoiceMeta;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=[
        'amount', 'status', 'user_id'
    ];

    #relaciones
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function appointment()
    {
        return $this->belongsTo('App\Appointment');
    }
    public function metas()
    {
        return $this->hasMany('App\InvoiceMeta');
    }
    #almacenamiento
    public function store($request)
    {
        $invoice = self::create([
            'amount' => 500,
            'status' => 'pending',
            'user_id' => $request->user()->id
        ]);
        
    }
}
