<?php
/**
 * Created by PhpStorm.
 * User: purelightme
 * Date: 2018/8/13
 * Time: 16:40
 */

namespace Purelightme;

class LocalReco4life
{
    public $broadCastAddr = '';
    public $port = 48899;

    public function __construct($broadCastAddr = '')
    {
        if ($broadCastAddr)
            $this->broadCastAddr = $broadCastAddr;
    }

    public function scan()
    {
        $udp = new \swoole_client(SWOOLE_SOCK_UDP);
        if ($udp->connect($this->broadCastAddr,$this->port,3)){
            $udp->sendto($this->broadCastAddr,$this->port,'YZ-RECOSCAN');
            return $udp->recv();
        }
        return false;
    }

    public function control($ip,$number,$flag = 'on')
    {
        $tcp = new \swoole_client(SWOOLE_SOCK_TCP);
        $tcp->connect($ip,8899);
        $tcp->sent('AT+YZSWITCH='.$number.','.$flag.','.date('YMDHi'));
        $tcp->close();
    }

    /**
     * 延迟控制，delay单位为分，最大2000
     * @param $ip
     * @param $number
     * @param string $flag
     * @param int $delay
     */
    public function delayControl($ip,$number,$flag = 'on',$delay = 1)
    {
        $tcp = new \swoole_client(SWOOLE_SOCK_TCP);
        $tcp->connect($ip,8899);
        $tcp->sent('AT+YZDELAY='.$number.','.$flag.','.$delay.','.date('YMDHi'));
        $tcp->close();
    }
}