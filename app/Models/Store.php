<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function flavorDates() {
        return $this->hasMany(FlavorDate::class);
    }

    public function currentSpecialConcrete() {
        return $this->hasOne(CurrentSpecialConcrete::class);
    }

    public function currentSpecialFood() {
        return $this->hasOne(CurrentSpecialFood::class);
    }

    public function currentSpecialSoups() {
        return $this->hasOne(CurrentSpecialSoups::class);
    }
}
