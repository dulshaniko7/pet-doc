<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static APPROVED()
 * @method static static REJECTED()
 * @method static static PAYMENT_PENDING()
 * @method static static IN_PROGRESS()
 * @method static static DONE()
 */
final class AppointmentStatusType extends Enum
{
    const PENDING = 'pending';
    const APPROVED = 'approved';
    const REJECTED = 'rejected';
    const PAYMENT_PENDING = 'payment-pending';
    const IN_PROGRESS = 'in-progress';
    const DONE = 'done';
}
