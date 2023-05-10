<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'prompt',
        'response',
        'user_id',
        'response_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
