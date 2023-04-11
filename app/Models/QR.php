<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QR extends Model
{
    use HasFactory;

    protected $table = 'q_r_s';

    protected $guarded = ['id'];

    protected $dateFormat = 'U';

    protected $casts = [
        'created_at' => 'datetime:U',
        'updated_at' => 'datetime:U',
        'deleted_at' => 'datetime:U',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function socmed(): BelongsTo
    {
        return $this->belongsTo(Socmed::class, 'id', 'qr_id');
    }
}
