<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsToMany; 
use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\Team;
use App\Models\User;
use Spatie\Permission\Models\Permission; 

class Role extends SpatieRole
{
    /**
     * Hubungan dengan model Team.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Define a many-to-many relationship with the User model.
     * This relationship uses the 'model_has_roles' pivot table and includes
     * the 'team_id' column from the pivot table.
     */

/******  5de3bb79-2662-404f-9138-973fd841c99d  *******/

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id')
                    ->withPivot('team_id'); // Mengambil kolom team_id dari pivot table
    }

    public function permissions(): BelongsToMany
{
    return $this->belongsToMany(Permission::class);
}

}