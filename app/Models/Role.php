<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'tbl_roles';
    protected $fillable = [
        'role_name',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'id_role';
    
    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}
