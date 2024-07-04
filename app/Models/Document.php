<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project() {
        return $this->hasOne(Project::class);
    }

    public function client() {
        return $this->hasOne(Client::class);
    }

    public function service() {
        return $this->hasOne(Service::class);
    }
}
