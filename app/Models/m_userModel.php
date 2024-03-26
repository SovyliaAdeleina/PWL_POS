<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_userModel extends Model
{
    protected $table ="m_user";
    public $timestamps = false;
    protected $primarykey = 'user_id';
    
    protected $fillable =[
        'user_id',
        'level_id',
        'username',
        'nama',
        'password',
    ];
}
