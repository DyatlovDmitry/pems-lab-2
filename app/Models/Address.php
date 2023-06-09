<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'city',
        'name_given_by_customer',
        'street',
        'house',
        'floor',
        'apartment',
        'intercom_code',
        'added_at',
    ];

    // Определение связи многие-к-одному с моделью Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
