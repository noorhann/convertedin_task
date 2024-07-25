<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'assigned_to_id',
        'assigned_by_id',
    ];

    /**
     * Get the user that the task is assigned to.
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    /**
     * Get the admin who created the task.
     */
    public function assignedBy()
    {
        return $this->belongsTo(Admin::class, 'assigned_by_id');
    }
}
