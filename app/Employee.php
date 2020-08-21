<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = ['user_id', 'first_name', 'last_name', 'company_id', 'email', 'phone'];

    protected $guarded = ['user_id', 'company_id'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
