<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }
}
