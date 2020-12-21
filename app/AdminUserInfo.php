<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AdminUserInfo extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'surname','designation','mobile','office_phone','fax','dob','gender','about','image','valid'
    ];

    public function scopeValid($query)
    {
        return $query->where('valid', 1);
    }
}
