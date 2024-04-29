<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class loginMails extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'login_mails';
    protected $fillable = [
        'username',
        'password',
        'name',
        'DOB',
        'phone_number',
        'department_id',
        'college_id',
        'batch_id',
        'user_type'
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
        // not supported
    }

    public function getRememberTokenName()
    {
        return null; // not supported
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_allocate', 'course_id');
    }
}
