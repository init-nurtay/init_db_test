<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lead() {
        return $this->hasOne(Lead::class);
    }

    public function country() {
        return $this->hasOne(Country::class);
    }
}
