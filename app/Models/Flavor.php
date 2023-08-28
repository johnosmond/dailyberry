<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flavor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function scopeFlavor($query, $flavor): Builder
    {
        return $query->where('flavor', 'LIKE', '%' . $flavor . '%');
    }

    public function scopeSort($query, $sort, $dir) {
        return $query->orderBy($sort, $dir);
    }

    public function flavorDates() {
        return $this->hasMany(FlavorDate::class);
    }
}
