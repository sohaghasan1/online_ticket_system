<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function departureLocation(){
        return $this->belongsTo(Location::class,'departure_location_id','id');
    }

    public function apartureLocation(){
        return $this->belongsTo(Location::class,'apertaure_location_id','id');
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
