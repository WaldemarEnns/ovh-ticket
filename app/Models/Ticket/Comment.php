<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Ticket\Ticket;
use App\Models\Customer;
use App\Models\User;

class Comment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'ticket_id', 'user_id', 'comment', 'emailcommentfile', 'image','cust_id','display','lastseen'
    ];
    
    protected $dates = [
        'lastseen'
    ];
    
    public function ticket()
    {
    return $this->belongsTo(Ticket::class);
    }
    public function cust()
    {
        return $this->belongsTo(Customer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('comments');
            //add option
    }
}
