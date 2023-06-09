<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'blocked',
        'first_name',
        'last_name',
        'phone',
        'email',
        'registration_date',
    ];

    // Определение связи один-ко-многим с моделью Address
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
