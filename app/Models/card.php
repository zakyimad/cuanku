<?php

namespace App\Models;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    public function income()
    {
        return $this->hasMany(Income::class);
    }
}
