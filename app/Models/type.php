<?php

namespace App\Models;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
