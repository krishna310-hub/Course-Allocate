<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class college extends Model
{
    use HasFactory;

    protected $table = 'colleges';
    protected $fillable = [
        'college'
    ];

    public function loginMails(): HasOne
    {
        return $this->hasOne(loginMails::class);
    }
}
