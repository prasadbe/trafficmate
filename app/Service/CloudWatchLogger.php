<?php

namespace App\Service;
use App\Service\Logger as LoggerInterface;
use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Maxbanton\Cwh\Handler\CloudWatch;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
class CloudWatchLogger implements LoggerInterface {

    protected $config;
    protected $logger;
    public function __construct(Setting $config) {
        $this->config = $config;
        $logFile = "testapp_local.log";
        $appName = "TestApp01";
        $facility = "local0";

        $cwClient = new CloudWatchLogsClient($this->config->getConfig());
        // Log group name, will be created if none
        $cwGroupName = env('APP_LOG_NAME', 'php-app-logs');
        // Instance ID as log stream name
        $cwStreamNameApp = env('APP_LOG_STREAM_NAME', 'TestAuthenticationApp');
        // Days to keep logs, 14 by default
        $cwRetentionDays = 90;

        $cwHandlerAppNotice = new CloudWatch($cwClient, $cwGroupName, $cwStreamNameApp, $cwRetentionDays, 10000, [ 'application' => 'php-testapp01' ],Logger::NOTICE);

        $this->logger = new Logger('PHP Logging');

        $formatter = new LineFormatter(null, null, false, true);
        $syslogFormatter = new LineFormatter("%channel%: %level_name%: %message% %context% %extra%",null,false,true);
        $infoHandler = new StreamHandler(__DIR__."/".$logFile, Logger::INFO);
        $infoHandler->setFormatter($formatter);

        $warnHandler = new SyslogHandler($appName, $facility, Logger::WARNING);
        $warnHandler->setFormatter($syslogFormatter);
        $cwHandlerAppNotice->setFormatter($formatter);

        $this->logger->pushHandler($warnHandler);
        $this->logger->pushHandler($infoHandler);
    }

    public function log($text, $type = 'warning')
    {
        if($type == 'info') {
            return $this->logger->info($text);
        } else {
            return$this->logger->warning($text);
        }
    }

}
