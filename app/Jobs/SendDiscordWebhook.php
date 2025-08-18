<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendDiscordWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public string $message;

    /**
     * Create a new job instance.
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Http::post('https://discord.com/api/webhooks/1396656463962837023/KikZkLJcDLzSZKwlgyz4yfW94j4GTRNhevx78gxfRNpjESeB_KoucKJETU8gzcTtgiek', [
            'content' => $this->message,
        ]);
    }
}
