<?php

namespace App\Models;

use App\Enum\Lead\Status;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Lead extends Model
{
    use HasFactory, BroadcastsEvents;

    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'comment',
        'source',
        'stage',
        ];


//    public function comments()
//    {
//        return $this->morphMany(Comment::class, 'commentable');
//    }

    // public function getStatusLabelInRussianAttribute()
    // {
    //     return Status::getRussianLabels()[$this->status];
    // }

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
