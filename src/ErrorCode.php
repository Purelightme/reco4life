<?php
/**
 * Created by PhpStorm.
 * User: purelightme
 * Date: 2018/8/2
 * Time: 18:25
 */

namespace Purelightme;

class ErrorCode
{
    const RESULT_MSG = [
        self::RESULT_FAIL => '操作失败',
        self::RESULT_SUCCESS => '操作成功',
        self::RESULT_TOKEN_ERROR => 'Token错误',
        self::RESULT_TOKEN_EXPIRED => 'Token失效',
        self::RESULT_TOKEN_HOUR_LIMIT => 'Token超出每小时使用次数',
        self::RESULT_TOKEN_DAY_LIMIT => 'Token超出每天使用次数',
        self::RESULT_AUTH_ERROR => '用户名与API KEY校验失败',
        self::RESULT_DEVICE_FORBIDDEN => '用户没有权限操作对应的设备',
        self::RESULT_DEVICE_OFFLINE => '用户控制的硬件已断开连接',
        self::RESULT_SERVICE_ERROR => '服务异常'
    ];

    const RESULT_FAIL = -1;
    const RESULT_SUCCESS = 1;
    const RESULT_TOKEN_ERROR = 2;
    const RESULT_TOKEN_EXPIRED = 3;
    const RESULT_TOKEN_HOUR_LIMIT = 4;
    const RESULT_TOKEN_DAY_LIMIT = 5;
    const RESULT_AUTH_ERROR = 6;
    const RESULT_DEVICE_FORBIDDEN = 7;
    const RESULT_DEVICE_OFFLINE = 8;
    const RESULT_SERVICE_ERROR = 999;
}