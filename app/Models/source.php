<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Source extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function income()
    {
        return $this->hasMany(Expense::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
