<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


/**
 * @method static static SUPER_ADMIN()
 * @method static static ADMIN()
 * @method static static DOCTOR()
 * @method static static HOSPITAL()
 * @method static static PET_OWNER()
 */

/**
 * @method static static SUPER_ADMIN()
 * @method static static ADMIN()
 * @method static static DOCTOR()
 * @method static static HOSPITAL()
 * @method static static PET_OWNER()
 */
final class RoleType extends Enum
{
    const SUPER_ADMIN = 'super-admin';
    const ADMIN = 'admin';
    const DOCTOR = 'doctor';
    const HOSPITAL = 'hospital';
    const PET_OWNER = 'pet-owner';
}
