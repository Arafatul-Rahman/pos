<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserUserInfo extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id','name', 'surname','designation','address','mobile','office_phone','fax','dob','gender','about','image','emailVerification','valid'
    ];

    public function scopeValid($query)
    {
        return $query->where('valid', 1);
    }
}
