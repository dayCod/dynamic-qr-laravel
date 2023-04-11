<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socmed extends Model
{
    use HasFactory;

    protected $table = 'socmeds';

    protected $guarded = ['id'];

    protected $dateFormat = 'U';

    protected $casts = [
        'created_at' => 'datetime:U',
        'updated_at' => 'datetime:U',
        'deleted_at' => 'datetime:U',
    ];
}
