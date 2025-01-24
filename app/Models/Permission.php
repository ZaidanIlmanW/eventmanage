<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 
use App\Models\User;
use App\Models\Role;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'permission_user', 'permission_id', 'user_id');
    }
}

