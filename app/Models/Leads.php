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

    public function getStatusLabelInRussianAttribute()
    {
        return Status::getRussianLabels()[$this->status];
    }

    public function getStatusColor()
    {
        return match ($this->status) {
            'new' => 'warning',
            'closed' => 'primary',
            'completed' => 'success',
            'in_progress' => 'info',
            'frozen' => 'info',
            default => 'secondary',
        };
    }
}
