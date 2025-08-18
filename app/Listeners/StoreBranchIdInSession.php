<?php

namespace App\Listeners;

use App\Events\BranchSelected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class StoreBranchIdInSession
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BranchSelected $event): void
    {
       
       
        Session::put('branch_id', $event->branchId);
    }
}
