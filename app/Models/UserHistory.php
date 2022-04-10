<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Project;

class UserHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cod_project',
        'title',
        'description',
        'status',
        'created_by',
    ];

    /**
     * Get the project that owns the user history.
     */
    public function project()
    {
        return $this->belongsTo(Project::class,'cod_project');
    }
}
