<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
/**
 * Class User
 *
 * @property int $id
 * @property string $identification
 * @property string $names
 * @property string $surnames
 * @property string $birthday
 * @property string|null $email
 * @property string $phone
 * @property string $address
 * @property string $password
 * @property string $state
 * @property Carbon $email_verified_at
 * @property string $profile_photo_url
 *
 */
class User extends Authenticatable
{
    /*public static string $STATEACTIVE="A";
    public static string $STATEINACTIVE="I";*/
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'identification',
        'names',
        'surnames',
        'birthday',
        'email',
        'phone',
        'address',
        'password',
        'state',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected function identification(): Attribute {
        return new Attribute(get:fn($value)=>substr($value,2));
    }

    protected function document(): Attribute {
        return new Attribute(get:fn()=>substr($this->getRawOriginal('identification'),0,2));
    }

    protected function name(): Attribute {
        return new Attribute(get:fn()=>$this->names);
    }

    protected function names(): Attribute {
        return new Attribute(get:fn($value)=>mb_convert_case($value,MB_CASE_TITLE),set: fn($value)=>mb_convert_case($value,MB_CASE_LOWER));
    }

    protected function surnames(): Attribute {
        return new Attribute(get:fn($value)=>mb_convert_case($value,MB_CASE_TITLE),set: fn($value)=>mb_convert_case($value,MB_CASE_LOWER));
    }

    protected function fullname(): Attribute {
        return new Attribute(get: fn() => $this->names.' '.$this->surnames);
    }

    protected function email(): Attribute {
        return new Attribute(get:fn($value)=>mb_convert_case($value,MB_CASE_LOWER),set: fn($value)=>mb_convert_case($value,MB_CASE_LOWER));
    }

    protected function address(): Attribute {
        return new Attribute(get:fn($value)=>mb_convert_case($value,MB_CASE_TITLE),set: fn($value)=>mb_convert_case($value,MB_CASE_LOWER));
    }

    protected function role(): Attribute {
        return new Attribute(get:fn()=>$this->roles()->first());
    }
}
