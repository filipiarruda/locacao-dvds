<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Dvd;

class UpdateDvdAvailable implements ShouldQueue
{
    use Queueable;


    protected $dvdId;
    protected $fieldValue;


    /**
     * Create a new job instance.
     */
    public function __construct($dvdId, $fieldValue)
    {
        $this->dvdId = $dvdId;
        $this->fieldValue = $fieldValue;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $dvd = Dvd::find($this->dvdId);

        if ($dvd) {
            $dvd->available = $this->fieldValue;
            $dvd->save();
        }
    }
}
