<?php

namespace App\Models;
use App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lead extends Model
{
    use  HasFactory;

   
    protected $fillable = [
        'name',
        'email',
        'empresa',
        'cnpj',
        'categoria',
        'user_id',
        'password',
        
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    protected $casts = [
        'email_verified_at' => 'datetime',
           ];


           
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Registros(){
        return $this->hasMany(Registro::class, 'lead_id');

    }
}
