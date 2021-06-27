<?php

namespace Rollswan\LaravelProjectUpdater\Controllers;

use App\Http\Controllers\Controller;
use Rollswan\LaravelProjectUpdater\Jobs\UpdaterJob;

class UpdaterController extends Controller
{
    /**
     * Update laravel project and provide notification using webhooks
     *
     */
    public function updateProject()
    {
        // Get config commands
        $configCommands = config('lpu.commands');

        // Dispatch jobs
        UpdaterJob::dispatch($configCommands);
    }
}
