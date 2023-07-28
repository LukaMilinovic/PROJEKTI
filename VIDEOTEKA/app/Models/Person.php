<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Person extends Model
{
    use HasFactory;

    protected function fullName(): Attribute{
        return Attribute::make(
            get: fn () => ($this->name . " " . $this->surname)
            ,
        );
    }
}
