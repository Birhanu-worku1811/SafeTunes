<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Model implements Authenticatable
{
    use HasFactory, LogsActivity;

    public function getAuthIdentifierName(): string
    {
        return 'id'; // Change 'id' to the actual name of your identifier column if different
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier(): mixed
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->password; // Change 'password' to the actual name of your password column if different
    }

    /**
     * Get the remember token for the user.
     *
     * @return string|null
     */
    public function getRememberToken(): ?string
    {
        return null; // If your application uses remember tokens, implement logic to return the token value
    }

    /**
     * Set the remember token for the user.
     *
     * @param  string|null  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // If your application uses remember tokens, implement logic to set the token value
    }

    /**
     * Get the column name for the remember token.
     *
     * @return string
     */
    public function getRememberTokenName(): string
    {
        return ''; // If your application uses remember tokens, return the column name
    }

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        // TODO: Implement getActivitylogOptions() method.
        return LogOptions::defaults()
            ->logOnly(['name', 'email']);
    }
}
