<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name',
        'duration',
        'price',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
