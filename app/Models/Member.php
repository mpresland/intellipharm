<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function scopeWithFirstnameContaining($query, $firstname)
    {
        return $query->where('firstname', 'like', '%'.$firstname.'%');
    }

    public function scopeWithSurnameContaining($query, $surname)
    {
        return $query->where('surname', 'like', '%'.$surname.'%');
    }

    public function scopeWithEmailContaining($query, $email)
    {
        return $query->where('email', 'like', '%'.$email.'%');
    }
}
