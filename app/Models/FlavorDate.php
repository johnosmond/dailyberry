<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlavorDate extends Model
{
    use HasFactory;

    public function flavor() {
        return $this->belongsTo(Flavor::class);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }
}
