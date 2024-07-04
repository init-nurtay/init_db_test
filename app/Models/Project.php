<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client() {
        return $this->hasOne(Client::class);
    }

    public function document() {
        return $this->hasOne(Document::class);
    }

    public function lead() {
        return $this->hasOne(Lead::class);
    }

    public function country() {
        return $this->hasOne(Lead::class);
    }
}
