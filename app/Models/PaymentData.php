<?php

namespace App\Models;

use App\Enums\CurrencyType;
use App\Enums\PaymentType;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentData extends Model
{
    use HasFactory, CastsEnums;

    protected $table = 'payment_data';

    protected $fillable = ['pet_owner_id', 'payment_id', 'customer_token', 'payment_method', 'currency', 'card_holder_name', 'card_no', 'card_expiry'];

    protected $casts = [
        'payment_method' => PaymentType::class,
        'currency' => CurrencyType::class,
    ];

    public function pet_owner()
    {
        return $this->belongsTo(PetOwner::class, 'pet_owner_id', 'pet_owner_id');
    }
}
