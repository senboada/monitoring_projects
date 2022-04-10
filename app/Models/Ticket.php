<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserHistory;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cod_user_history',
        'title',
        'description',
        'status',
        'created_by',
    ];

    /**
     * Get the project that owns the user history.
     */
    public function userhistory()
    {
        return $this->belongsTo(UserHistory::class,'cod_user_history');
    }
}
