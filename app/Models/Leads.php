<?php

namespace App\Models;

use App\Enum\Lead\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'status'];


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }



    public function getStatusColor()
    {
        return match ($this->status) {
            'Новый' => 'primary',
            'Связались' => 'info',
            'Квалифицирован' => 'warning',
            'Неквалифицирован' => 'success',
            'Впроцессе' => 'secondary',
            'Потерян' => 'danger',
        };
    }
}
