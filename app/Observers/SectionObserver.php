<?php

namespace App\Observers;

use App\Models\Section;

class SectionObserver
{

    protected $userID;

    public function __construct()
    {
        $this->userID = auth()->user()->id;
    }

    public function creating(Section $section): void
    {
        $section->created_by = $this->userID;
    }

    public function updating(Section $section): void
    {
        $section->updated_by = $this->userID;
    }

    /**
     * Handle the Section "created" event.
     */
    public function created(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "updated" event.
     */
    public function updated(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "deleted" event.
     */
    public function deleted(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "restored" event.
     */
    public function restored(Section $section): void
    {
        //
    }

    /**
     * Handle the Section "force deleted" event.
     */
    public function forceDeleted(Section $section): void
    {
        //
    }
}
