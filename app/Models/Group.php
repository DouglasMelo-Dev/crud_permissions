<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_group')->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'group_permission', 'group_id', 'module_permission_id')
                    ->withTimestamps();
    }
}
