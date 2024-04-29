<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class batch extends Model
{
    use HasFactory;

    protected $table = 'batches';
    protected $fillable = [
        'batch'
    ];

    public function loginMails(): HasOne
    {
        return $this->hasOne(loginMails::class);
    }
}
