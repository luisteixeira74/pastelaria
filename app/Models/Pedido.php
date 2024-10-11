<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'cliente_id',
       'produto_id',
       'pedido_token'
   ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
