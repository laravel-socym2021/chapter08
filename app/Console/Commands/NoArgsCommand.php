<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NoArgsCommand extends Command
{
    const PATH = '/tmp/no-args-command';

    /** @var string */
    protected $signature = 'no-args-command';

    /** @var string */
    protected $description = '引数無しコマンド';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        file_put_contents(self::PATH, 'no-args');

        return 0;
    }
}
