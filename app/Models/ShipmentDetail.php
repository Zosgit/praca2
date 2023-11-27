<?php

namespace App\Models;
use App\Models\Product;
use App\Models\User;
use App\Models\Shipment;
use App\Models\Status;
use App\Models\LogicalArea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentDetail extends Model
{
    use HasFactory;
    protected $table = 'shipment_details';
    protected $fillable = ['ship_id', 'product_id', 'prod_code', 'prod_desc',
                            'serial_nr', 'expiration_at', 'logical_area_id',
                            'quantity', 'remarks', 'status_id', 'created_by'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->belongsTo(Firm::class, 'prod_code', 'id');
    }
    public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class, 'ship_id', 'id');
    }
    public function logicalArea(): BelongsTo
    {
        return $this->belongsTo(LogicalArea::class, 'logical_area_id', 'id');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public static function booted(){

        static::creating(function($model)
            {
            $model->created_by = auth()->id();
            $model->status_id = 401;
            });
        }
}
