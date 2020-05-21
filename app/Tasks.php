<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'Classification','student_id','Title', 'toolman_id','Status','DateTime','DeadDateTime','BuyAddress', 'MeetAddress', 'Pay', 'content'
    ];
    protected $primaryKey = "tasks_id";
    public function get_by_toolman(User $user)
    {
        $toolman_id = $user->student_id;

        if ($this->toolman_id == null && $this->student_id != $toolman_id) {
            $this->toolman_id = $toolman_id;
            $this->Status = "Processing";
            $this->save();
        }
    }
}
