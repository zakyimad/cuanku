<?php

namespace App\Models;

use App\Models\Card;
use App\Models\Type;
use App\Models\Subtype;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
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

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function subtype()
    {
        return $this->belongsTo(Subtype::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
