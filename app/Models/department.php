<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = [
        'department'
    ];

    public function loginMails(): HasOne
    {
        return $this->hasOne(loginMails::class);
    }
}
