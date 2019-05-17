<?php

namespace ssphp\Standard\Log;

/**
 *  Logger Interface
 * 
 *  @author qishaobo
 */
interface LoggerInterface
{
    
    /**
     * debug
     *
     * @param  array $message 
     *
     * @return void
     */
    public function debug(array $message);
    
    /**
     * warning
     *
     * @param  array $message 
     *
     * @return void
     */
    public function warning(array $message);
    
    /**
     * info
     *
     * @param  array $message 
     *
     * @return void
     */
    public function info(array $message);
    
    /**
     * error
     *
     * @param  array $message 
     *
     * @return void
     */
    public function error(array $message);
    
    /**
     * db
     *
     * @param  array $message 
     *
     * @return void
     */
    public function db(array $message);
    
    /**
     * dbError
     *
     * @param  array $message 
     *
     * @return void
     */
    public function dbError(array $message);
    
    /**
     * server
     *
     * @param  array $message 
     *
     * @return void
     */
    public function server(array $message);
    
    /**
     * serverError
     *
     * @param  array $message 
     *
     * @return void
     */
    public function serverError(array $message);
    
    /**
     * task
     *
     * @param  array $message 
     *
     * @return void
     */
    public function task(array $message);
    
    /**
     * monitor
     *
     * @param  array $message 
     *
     * @return void
     */
    public function monitor(array $message);
    
    /**
     * statistic
     *
     * @param  array $message 
     *
     * @return void
     */
    public function statistic(array $message);
    
    /**
     * request
     *
     * @param  array $message 
     *
     * @return void
     */
    public function request(array $message);
    
    /**
     * 检查日志字段是否完整
     *
     * @param  array  $message 
     * @param  array  $logFields 
     *
     * @return bool          
     */
    public function checkLogFields(array $message, array $logFields);

    /**
     * 记录日志
     *
     * @param  array $message 
     *
     * @return array
     */
    public function log(array $message, string $logType, string $logLevel);
}
