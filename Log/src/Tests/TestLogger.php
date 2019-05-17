<?php

include __DIR__ . "/../ssphp/Standard/Log/LogLevel.php";
include __DIR__ . "/../ssphp/Standard/Log/LogType.php";
include __DIR__ . "/../ssphp/Standard/Log/LoggerInterface.php";
include __DIR__ . "/../ssphp/Standard/Log/AbstractLogger.php";

use ssphp\Standard\Log\AbstractLogger;
use ssphp\Standard\Log\LogLevel;
use ssphp\Standard\Log\LogType;

class TestLogger extends AbstractLogger
{
    public $level = 'info';

    public function log(array $message, string $logType, string $level = 'info')
    {
        //检查日志级别
        if (LogLevel::$$level < LogLevel::${$this->level}) {
            return [
                'code' => '0x000000',
                'data' => '日志级别不用登记',
            ];
        }

        //检查日志包含字段
        $logFields = $this->getFields($logType);
        $message = array_merge($message, $this->baseContent($logType));
        
        if (!$this->checkLogFields($message, $logFields)) {
            return [
                'code' => '0x000001',
                'message' => '日志内容缺少必填字段',
            ];
        }

        //记录日志（省略）
        return [
            'code' => '0x000000',
        ];
    }

    public function checkLogFields(array $message, array $logFields)
    {
        if (empty($message)) {
            return false;
        }

        foreach ($logFields as $type) {
            if (!isset($message[$type])) {
                return false;
            }
        }

        return true;
    }

    /**
     * 日志内容包含的基本字段
     *
     * @return   array
     */
    private function baseContent($logType)
    {
        return [
            'logTime' => microtime(true),
            'traceId' => '',
            'logType' => $logType,
        ];
    }


    /**
     * 查询日志内容包含字段
     *
     * @param    string     $type
     *
     * @return   array
     */
    private function getFields($type)
    {
        static $logFields;

        if (isset($logFields[$type])) {
            return $logFields[$type];
        }

        if (!isset(LogType::${$type})) {
            return $logFields[$type] = [];
        }

        $fields = $this->handleFields($type);

        return $logFields[$type] = $fields;
    }

    /**
     * 递归日志类型字段
     *
     * @param  string $type
     *
     * @return array
     */
    private function handleFields($type)
    {
        if (!isset(LogType::${$type})) {
            return [];
        }

        $fields = LogType::${$type};
        if (empty($fields['extendFields'])) {
            return $fields;
        }

        $extendFields = $fields['extendFields'];
        unset($fields['extendFields']);
        foreach ($extendFields as $field) {
            $fields = call_user_func('array_merge', $fields, $this->handleFields($field));
        }

        return $fields;
    }

    public function test()
    {
        return $this->info(["info" => "ok"]);
    }
}

$logger = new TestLogger();
var_dump($logger->test());
