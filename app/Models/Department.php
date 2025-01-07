<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nette\Utils\Strings;

class Department extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function daftar(): HasMany
    {
        return $this->hasMany(Pengurus::class);
    }
}
