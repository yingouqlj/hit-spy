<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 2017/1/21
 * Time: 下午10:18
 */

namespace Yingou\HitSpy;


class Server
{
    protected static $instance;
    protected $container;

    public function __construct()
    {
        if (self::$instance) {
            throw new \Exception('cannot construct twice');
        }
        self::$instance = $this;
    }

    public function run()
    {
    }
    public static function app()
    {
        return self::$instance;
    }
}