<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentCourseAllocate extends Model
{
    use HasFactory;

    protected $table = 'course_allocate';
    protected $fillable = [
        'department_id',
        'college_id',
        'batch_id',
        'course_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }
    public function course()
    {
        return $this->belongsTo(course::class, 'course_id');
    }
}
