<?php

// namespace App\Models;

// use Illuminate\Contracts\Auth\Authenticatable;
// use App\Models\LevelModel;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
// use Tymon\JWTAuth\Contracts\JWTSubject;

// class UserModel extends Model implements Authenticatable, JWTSubject
// {
//     use HasFactory, AuthenticatableTrait;

//     public function getJWTIdentifier(){
//         return $this->getKey();
//     }

//     public function getJWTCustomClaims(){
//         return [];
//     }

//     protected $table = 'm_user';
//     protected $primaryKey = 'user_id';

//     protected $fillable = ['level_id', 'username', 'nama', 'password'];

//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LevelModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserModel extends Model implements Authenticatable, JWTSubject
{
    use AuthenticatableTrait;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password', 'image'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}
