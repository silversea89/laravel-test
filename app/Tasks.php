<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'Classification','Student_id','Title', 'Toolman_id','Status','DateTime','DeadDateTime','BuyAddress', 'MeetAddress', 'Pay', 'Content',"Progress"
    ];

    protected $primaryKey = "Tasks_id";

    public function get_by_toolman(String $toolman)
    {
        $Toolman_id = $toolman;

        if ($this->Toolman_id == null && $this->student_id != $Toolman_id) {
            $this->Toolman_id = $Toolman_id;
            $this->Status = "Processing";
            $this->save();
        }
    }
}
