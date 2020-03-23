<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function scopeWithFirstnameContaining($query, $firstname)
    {
        return $this->addFieldContainsScope($query, 'firstname', $firstname);
    }

    public function scopeWithSurnameContaining($query, $surname)
    {
        return $this->addFieldContainsScope($query, 'surname', $surname);
    }

    public function scopeWithEmailContaining($query, $email)
    {
        return $this->addFieldContainsScope($query, 'email', $email);
    }

    private function addFieldContainsScope($query, $field, $value = null)
    {
        if ($value) {
            return $query->where($field, 'like', '%'.$value.'%');
        }
    }
}
