<?php

namespace App\Observers;

use App\Models\Student;

class StudentObserver
{

    protected $userID;

    public function __construct()
    {
        $this->userID = auth()->user()->id;
    }

    public function creating(Student $student): void
    {
        $student->created_by = $this->userID;
    }

    public function updating(Student $student): void
    {
        $student->updated_by = $this->userID;
    }

    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}
