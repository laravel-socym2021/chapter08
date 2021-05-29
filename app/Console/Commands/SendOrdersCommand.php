<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\UseCases\SendOrdersUseCase;
use Carbon\CarbonImmutable;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Psr\Log\LoggerInterface;

class SendOrdersCommand extends Command
{
    /** @var string */
    protected $signature = 'app:send-orders {date}';

    /** @var string */
    protected $description = '購入情報を送信する';

    /** @var SendOrdersUseCase */
    private $useCase;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(SendOrdersUseCase $useCase, LoggerInterface $logger)
    {
        parent::__construct();

        $this->useCase = $useCase;
        $this->logger = $logger;
    }

    /**
     * @throws GuzzleException
     */
    public function handle(): int
    {
        // ② バッチ処理開始ログ
        $this->logger->info(__METHOD__ . ' ' . 'start');
        $date = $this->argument('date');
        $targetDate = CarbonImmutable::createFromFormat('Ymd', $date);

        // ③ バッチコマンド引数を出力
        $this->logger->info('TargetDate:' . $date);
        $count = $this->useCase->run($targetDate);

        // ④ バッチ処理終了ログ
        $this->logger->info(__METHOD__ . ' ' . 'done sent_count:' . $count);

        return 0;
    }
}
