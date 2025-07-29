<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // not neeeded
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'is_active',
        'is_admin',
        'username',
    ]; // fillable is a whitelist of attributes that can be mass assigned

    // on the other hand, guarded is a blacklist of attributes that cannot be mass assigned
    // protected $guarded = [
    //     'is_admin',
    // ];
    // both of these properties can be used to protect against mass assignment vulnerabilities

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // one user can have many tasks
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    // one user can have many roles
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }


    // assessor of full name (equivalent to a getter)
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->attributes['first_name'] . " " . $this->attributes['last_name'],
            //get: fn ($value) => $this->first_name . " " . $this->last_name, // this will work the same
        );
    }

    // mutator for username (equivalent to a setter)
    protected function username(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::slug($value),
            // set: fn ($value) => strtolower(trim($value)) // make it lowercase and trim
            // set: fn ($value) => $value // keep the original value
        );
    }

    // hash the password with bcrypt before saving it to the database
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => bcrypt($value)
        );
    }
}
