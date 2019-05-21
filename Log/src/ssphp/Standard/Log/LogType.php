<?php

namespace ssphp\Standard\Log;

/**
 * Describes log LogType.
 */
class LogType
{
    public static $base = [
        'logType', // 日志类型
        'logTime', // 日志时间，格式为float64，单位秒
        'traceId', // 跟踪ID，同一过程中的日志具有相同的traceId
    ];

    public static $debug = [
        'extendFields' => ['base'],
        'debug', // 调试信息
        'callStacks', // 调用堆栈
    ];

    public static $warning = [
        'extendFields' => ['base'],
        'warning', // 信息
        'callStacks', // 调用堆栈
    ];

    public static $info = [
        'extendFields' => ['base'],
        'info', // 警告信息
    ];

    public static $error = [
        'extendFields' => ['base'],
        'error', // 错误信息
        'callStacks', // 调用堆栈
    ];

    public static $db = [
        'extendFields' => ['base'],
        'dbType', // 数据库类型，例如：mysql、oracle、redis...
        'dsn', // 连接信息
        'query', // 请求内容
        'args', // 请求参数，会变化的部分应该记录在此
        'usedTime', // 处理请求花费的时间，格式为float32，单位毫秒
    ];

    public static $dbError = [
        'extendFields' => ['db', 'error'],
    ];

    public static $server = [
        'extendFields' => ['info'],
        'app', // 运行什么应用
        'weight', // 服务的权重
        'node', // 运行在哪个节点（ip:port）
        'proto', // 工作协议，例如：http1.1、http2.0、h2c
        'startTime', // 服务启动时间
    ];

    public static $serverError = [
        'extendFields' => ['error'],
        'app', // 运行什么应用
        'weight', // 服务的权重
        'node', // 运行在哪个节点（ip:port）
        'proto', // 工作协议，例如：http1.1、http2.0、h2c
        'startTime', // 服务启动时间
    ];

    public static $task = [
        'extendFields' => ['base'],
        'serverId', // 服务编号（用于跟踪哪一个服务）
        'app', // 运行什么应用
        'name', // 统计项目
        'succeed', // 是否成功
        'usedTime', // 处理请求花费的时间，格式为float32，单位毫秒
        'memo', // 备注
    ];

    public static $monitor = [
        'extendFields' => ['base'],
        'name', // 监控项目
        'target', // 监控目标
        'targetInfo', // 目标信息，例如：DNS、URL
        'expect', // 预期结果
        'result', // 实际结果
        'succeed', // 是否成功
        'usedTime', // 处理请求花费的时间，格式为float32，单位毫秒
        'memo', // 备注
    ];

    public static $statistic = [
        'extendFields' => ['base'],
        'serverId', // 服务编号（用于跟踪哪一个服务）
        'app', // 运行什么应用
        'name', // 统计项目
        'startTime', // 开始时间
        'endTime', // 结束时间
        'total', // 总次数
        'failed', // 失败次数
        'avgTime', // 平均用时
        'minTime', // 最少用时
        'maxTime', // 最多用时
    ];

    public static $request = [
        'extendFields' => ['base'],
        'serverId', // 服务编号（用于跟踪哪一个服务）
        'app', // 应用名
        'node', // 处理请求的节点，ip:port
        'clientIp', // 真实的用户IP，通过 X-Real-IP 续传
        'fromApp', // 调用方应用
        'fromNode', // 调用方节点，格式 ip:port
        'clientId', // 客户唯一编号，通过 X-Client-ID 续传
        'sessionId', // 会话唯一编号，通过 X-Session-ID 续传
        'requestId', // 请求唯一编号，通过 X-Request-ID 续传
        'host', // 真实用户请求的Host，通过 X-Host 续传
        'scheme', // http scheme, http or https
        'proto', // http proto, 1.1 or 2.0
        'authLevel', // 验证级别，用来校验用户是否有权限访问
        'priority', // 优先级，用来在服务故障时进行自动降级处理
        'method', // 请求的方法
        'path', // 请求的路径，不包括GET参数部分，如果有PATH参数应该记录定义的PATH
        'requestHeaders', // 请求头，排除掉指定不需要信息后的所有头部内容，敏感数据应脱敏
        'requestData', // 请求的数据内容，JSON对象，集合类型仅记录少量内容，敏感数据应脱敏，非对象内容过大应做截取
        'usedTime', // 处理请求花费的时间，格式为float32，单位毫秒
        'responseCode', // 应答代码，200 1000+ 正常应答，201～399，1～199  600～999 特殊应答，<1 异常应答
        'responseHeaders', // 应答头，排除掉指定不需要信息后的所有头部内容，敏感数据应脱敏
        'responseDataLength', // 应答的数据长度
        'responseData', // 指定要记录的数据内容，JSON对象，集合类型仅记录少量内容，敏感数据应脱敏，非对象内容不进行记录
    ];
}
