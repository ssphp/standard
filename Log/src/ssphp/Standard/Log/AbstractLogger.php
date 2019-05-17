<?php

namespace ssphp\Standard\Log;

abstract class AbstractLogger implements LoggerInterface
{
    /**
     * debug
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function debug(array $message)
    {
        return $this->log($message, 'debug', 'debug');
    }
    
    /**
     * warning
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function warning(array $message)
    {
        return $this->log($message, 'warning', 'warning');
    }
    
    /**
     * info
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function info(array $message)
    {
        return $this->log($message, 'info', 'info');
    }
    
    /**
     * error
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function error(array $message)
    {
        return $this->log($message, 'error', 'error');
    }
    
    /**
     * db
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function db(array $message)
    {
        return $this->log($message, 'db', 'info');
    }
    
    /**
     * dbError
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function dbError(array $message)
    {
        return $this->log($message, 'dbError', 'error');
    }
    
    /**
     * server
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function server(array $message)
    {
        return $this->log($message, 'server', 'info');
    }
    
    /**
     * serverError
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function serverError(array $message)
    {
        return $this->log($message, 'serverError', 'error');
    }
    
    /**
     * task
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function task(array $message)
    {
        return $this->log($message, 'task', 'info');
    }
    
    /**
     * monitor
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function monitor(array $message)
    {
        return $this->log($message, 'monitor', 'info');
    }
    
    /**
     * statistic
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function statistic(array $message)
    {
        return $this->log($message, 'statistic', 'info');
    }
    
    /**
     * request
     *
     *
     * @param  array $message 
     *
     * @return array
     */
    public function request(array $message)
    {
        return $this->log($message, 'request', 'info');
    }
}
