<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'service_id',
        'payment_id',
        'service_count',
        'paid',
        'status',
        'invoice_details',
        'transaction_id',
        'transaction_result',
    ];

    const STATUS_FAILED = 0;
    const STATUS_PENDING = 1;
    const STATUS_SUCCESS = 2;

    public function service()
    {
        $this->belongsTo(Service::class, 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setInvoiceDetailsAttribute($value)
    {
        $this->attributes['invoice_details'] = serialize($value);
    }

    public function getInvoiceDetailsAttribute()
    {
        return unserialize($this->attributes['invoice_details']);
    }

    public function setTransactionResultAttribute($value)
    {
        $this->attributes['transaction_result'] = serialize($value);
    }

    public function getTransactionResultAttribute($value)
    {
        return unserialize($this->attributes['transaction_result']);
    }


}