<?php

namespace App\Observers;

use App\Models\Classes;

class ClassesObserver
{
    protected $userID;

    public function __construct()
    {
        $this->userID = auth()->user()->id;
    }

    public function creating(Classes $classes): void
    {
        $classes->created_by = $this->userID;
    }

    public function updating(Classes $classes): void
    {
        $classes->updated_by = $this->userID;
    }

    /**
     * Handle the Classes "created" event.
     */
    public function created(Classes $classes): void
    {
       //
    }

    /**
     * Handle the Classes "updated" event.
     */
    public function updated(Classes $classes): void
    {
       //
    }

    /**
     * Handle the Classes "deleted" event.
     */
    public function deleted(Classes $classes): void
    {
        //
    }

    /**
     * Handle the Classes "restored" event.
     */
    public function restored(Classes $classes): void
    {
        //
    }

    /**
     * Handle the Classes "force deleted" event.
     */
    public function forceDeleted(Classes $classes): void
    {
        //
    }
}
