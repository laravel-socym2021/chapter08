<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\UseCases\ExportOrdersUseCase;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;

class ExportOrdersCommand extends Command
{
    /** @var string */
    protected $signature = 'app:export-orders {date} {--output=}';

    /** @var string */
    protected $description = '購入情報を出力する';

    /** @var ExportOrdersUseCase */
    private $useCase;

    public function __construct(ExportOrdersUseCase $useCase)
    {
        parent::__construct();

        $this->useCase = $useCase;
    }

    public function handle(): int
    {
        $date = $this->argument('date');
        $targetDate = CarbonImmutable::createFromFormat('Ymd', $date);

        $tsv = $this->useCase->run($targetDate);

        // ① outputオプションの値を取得
        $outputFilePath = $this->option('output');
        // ② nullであれば未指定なので、標準出力に出力
        if (is_null($outputFilePath)) {
            echo $tsv;
            return 0;
        }

        // ③ ファイルに出力
        file_put_contents($outputFilePath, $tsv);
        return 0;
    }
}
