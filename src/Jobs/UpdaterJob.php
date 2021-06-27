<?php

namespace Rollswan\LaravelProjectUpdater\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Rollswan\LaravelProjectUpdater\Helpers\ResponseHelper;

class UpdaterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $configCommands;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($configCommands)
    {
        $this->configCommands = $configCommands;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $noErrorFound = true;

        foreach ($this->configCommands as $configCommand => $command) {
            // Execute config command
            exec('cd '. base_path() . ' && ' . $command, $result, $resultCode);

            // Notify error result
            if ($resultCode !== 0) {
                $noErrorFound = false;

                // Error response
                ResponseHelper::postToWebhook("An error was encountered while trying to update the server: {$result[0]}");
                return ResponseHelper::make(500, "Error trying to run command: {$command}");
            }
        }

        // Check if no error found
        if ($noErrorFound) {
            // Success response
            ResponseHelper::postToWebhook('The server was successfully updated.');
            return ResponseHelper::make(200, "Update successful.");
        }
    }
}
