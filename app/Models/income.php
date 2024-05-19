<?php

namespace App\Models;

use App\Models\Card;
use App\Models\User;
use App\Models\Source;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title','like','%' . $filters['search'] .'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title','like','%' . $search .'%');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
