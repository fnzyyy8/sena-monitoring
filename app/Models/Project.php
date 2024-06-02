<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'title',
        'area_code',
        'price',
        'description',
        'created_at'
    ];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_code', 'code');
    }
}
