<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Clients;
use App\Models\Services;

class Appointments extends Model
{
    protected $table = 'appointments';

    protected $fillable = [
        'client_id',
        'service_id',
        'user_id',
        'start_time',
        'end_time',
        'status',
        'notes',
    ];

    // Relacionamentos
    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function service()
    {
        return $this->belongsTo(Services::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
