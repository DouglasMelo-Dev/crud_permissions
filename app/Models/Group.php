<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permissions;
use App\Models\Company;
use App\Models\ModulePermission;


class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_group');
    }

    public function permissions()
    {
        return $this->belongsToMany(ModulePermission::class, 'group_permission');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
