<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class ErrorCommand extends Command
{
    /** @var string */
    protected $signature = 'error';

    /** @var string */
    protected $description = 'エラー発生';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        throw new Exception('error!');
    }
}
