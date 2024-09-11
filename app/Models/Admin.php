<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'nama','email','telepon','nip','username',
        'password',
    ];
    protected $table = 'admin';
    // public function antrians()
    // {
    //     return $this->hasMany(Antrian::class);
    // }
}
