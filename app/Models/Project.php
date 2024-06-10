<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'area_id',
        'contract_id',
        'price',
        'description',
        'created_at'
    ];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'id');
    }

    public function idShow(): Attribute
    {
        return Attribute::make(
            get: function () {
                return str_replace('-', '/', $this->id);
            }
        );
    }

    public function priceShow(): Attribute
    {
        return Attribute::make(
            get: function () {
                return "Rp " . number_format($this->price,2);
            }
        );
    }
}
