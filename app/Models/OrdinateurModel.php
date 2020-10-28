<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdinateurModel extends Model
{
    use HasFactory;

    protected $table = 'ordinateur';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function attributions()
    {
        return $this->hasMany(AttributionModel::class, 'id_ordinateur');
    }
}
