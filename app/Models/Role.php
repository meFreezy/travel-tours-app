<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasUuids;

    // This allows the use of mass assignment e.g. Role::create([]);
    // Alternative is $guarded = [] => what is in the array is NOT fillable aka nothing is not fillable.
    protected $fillable = ['name'];
}
