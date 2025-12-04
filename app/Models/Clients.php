<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Clients extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name',
        'telephone',
        'notes',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
