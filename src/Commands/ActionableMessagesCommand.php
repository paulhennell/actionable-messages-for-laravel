<?php

namespace PaulHennell\ActionableMessages\Commands;

use Illuminate\Console\Command;

class ActionableMessagesCommand extends Command
{
    public $signature = 'actionable-messages-for-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
