<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static VISA()
 * @method static static MASTER()
 * @method static static AMEX()
 * @method static static EZCASH()
 * @method static static MCASH()
 * @method static static GENIE()
 * @method static static VISHWA()
 * @method static static PAYAPP()
 * @method static static HNB()
 * @method static static FRIMI()
 * @method static static TEST()
 */

/**
 * @method static static VISA()
 * @method static static MASTER()
 * @method static static AMEX()
 * @method static static EZCASH()
 * @method static static MCASH()
 * @method static static GENIE()
 * @method static static VISHWA()
 * @method static static PAYAPP()
 * @method static static HNB()
 * @method static static FRIMI()
 * @method static static TEST()
 */
final class PaymentType extends Enum
{
    const VISA = 'VISA';
    const MASTER = 'MASTER';
    const AMEX = 'AMEX';
    const EZCASH = 'EZCASH';
    const MCASH = 'MCASH';
    const GENIE = 'GENIE';
    const VISHWA = 'VISHWA';
    const PAYAPP = 'PAYAPP';
    const HNB = 'HNB';
    const FRIMI = 'FRIMI';
    const TEST = 'TEST';
}
