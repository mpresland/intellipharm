<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function scopeWithFirstname($query, $firstname)
    {
        return $query->where('firstname', $firstname);
    }

    public function scopeWithSurname($query, $surname)
    {
        return $query->where('surname', $surname);
    }

    public function scopeWithEmail($query, $email)
    {
        return $query->where('email', $email);
    }
}
