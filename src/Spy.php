<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 2017/1/21
 * Time: 下午10:18
 */

namespace Yingou\HitSpy;


class Spy
{
    protected static $instance;
    protected $container;

    public function __construct()
    {
        if (self::$instance) {
            throw new \Exception('cannot construct twice');
        }
        $this->container=new SpyContainer([]);
        self::$instance = $this;
    }

    public static function app()
    {
        return self::$instance;
    }
}