<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'usertype_plain',
        'firstname',
        'middlename',
        'lastname',
        'account_verification_status',
        'account_verification_status_plain'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    /**
     * Decrypt the name attribute when retrieving it from the database.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return $value; // Handle decryption failure or return original value
        }
    }

    /**
     * Encrypt the firstname attribute before saving it to the database.
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = Crypt::encryptString($value);
    }

    /**
     * Decrypt the firstname attribute when retrieving it from the database.
     *
     * @param  string  $value
     * @return string
     */
    public function getFirstnameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return $value; // Handle decryption failure or return original value
        }
    }

    /**
     * Encrypt the middlename attribute before saving it to the database.
     *
     * @param  string  $value
     * @return void
     */
    public function setMiddlenameAttribute($value)
    {
        $this->attributes['middlename'] = Crypt::encryptString($value);
    }

    /**
     * Decrypt the middlename attribute when retrieving it from the database.
     *
     * @param  string  $value
     * @return string
     */
    public function getMiddlenameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return $value; // Handle decryption failure or return original value
        }
    }

    /**
     * Encrypt the lastname attribute before saving it to the database.
     *
     * @param  string  $value
     * @return void
     */
    public function setLastnameAttribute($value)
    {
        $this->attributes['lastname'] = Crypt::encryptString($value);
    }

    /**
     * Decrypt the lastname attribute when retrieving it from the database.
     *
     * @param  string  $value
     * @return string
     */
    public function getLastnameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return $value; // Handle decryption failure or return original value
        }
    }

    /**
     * Encrypt the account_verification_status attribute before saving it to the database.
     *
     * @param  string  $value
     * @return void
     */
    public function setAccountVerificationStatusAttribute($value)
    {
        $this->attributes['account_verification_status'] = Crypt::encryptString($value);
    }

    /**
     * Decrypt the account_verification_status attribute when retrieving it from the database.
     *
     * @param  string  $value
     * @return string
     */
    public function getAccountVerificationStatusAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return $value; // Handle decryption failure or return original value
        }
    }

    /**
     * Encrypt the usertype attribute before saving it to the database.
     *
     * @param  string  $value
     * @return void
     */
    public function setUsertypeAttribute($value)
    {
        $this->attributes['usertype'] = Crypt::encryptString($value);
    }

    /**
     * Decrypt the usertype attribute when retrieving it from the database.
     *
     * @param  string  $value
     * @return string
     */
    public function getUsertypeAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return $value; // Handle decryption failure or return original value
        }
    }



    public function pwdInformation()
    {
        return $this->hasOne(PwdInformation::class);
        
    }
    
    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function interviews()
    {
    return $this->hasMany(Interview::class);
    }


    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class);
    }


    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    // public function employerpic()
    // {
    //     return $this->hasOne(Employer::class, 'user_id');
    // }

    public function languageInputs()
    {
        return $this->hasMany(LanguageInput::class);
    }
    


    public function workExperiences(): HasMany
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function adminProfile()
    {
        return $this->hasOne(AdminProfile::class);
    }
    
  

}
