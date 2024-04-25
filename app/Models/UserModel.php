<?php

namespace App\Models;
use App\Models\LevelModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{
    // Jobsheet 10 - Praktikum 1 No 7
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    // use HasFactory;
    // // pengerjaan Jobsheet 3 Praktikum 6 
    // protected $table = 'm_user';            // mendefinisikan tabel yang digunakan
    // protected $primaryKey = 'user_id';     // mendefinisikan primary key tabel yang digunakan

    // // pengerjaan jobsheet 4 praktikum 1 
    // // protected $fillable = ['level_id','username','nama','password'];

    // // pengerjaan jobsheet 4 praktikum 1 
    // // protected $fillable = ['level_id','username','nama'];

    // // pengerjaan jobsheet 4 praktikum 2.4  untuk bisa mengerjakan
    // protected $fillable = ['level_id','username','nama','password'];

    // // pengerjaan jobsheet 4 praktikum 2.7 
    // public function level():BelongsTo
    // {
    //     return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    // }
}