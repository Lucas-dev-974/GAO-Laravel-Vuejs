<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributionModel extends Model
{
    use HasFactory;

    protected $table = 'attribution';
    protected $fillable = ['horaire', 'date'];

    public function client()
    {
        return $this->belongsTo(ClientModel::class, 'id_client');
    }
    public function ordinateur()
    {
        return $this->belongsTo(OrdinateurModel::class, 'id_ordinateur');
    }
}
