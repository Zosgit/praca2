<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreArea extends Model
{
    use HasFactory;
    protected $table = 'store_areas';
    protected $fillable = ['code','longdesc'];
}
