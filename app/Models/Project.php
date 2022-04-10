<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Company;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cod_company',
        'title',
        'description',
        'status',
        'created_by',
    ];

    /**
     * Get the company that owns the project.
     */
    public function company()
    {
        return $this->belongsTo(Company::class,'cod_company');
    }
}
