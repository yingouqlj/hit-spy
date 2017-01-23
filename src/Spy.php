<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 2017/1/21
 * Time: 下午10:18
 */

namespace Yingou\HitSpy;


use Yingou\HitSpy\Config\Config;

class Spy
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

    public static function app()
    {
        return self::$instance;
    }

    public function makeAnalyticsUrl(Config $config)
    {
        $ana = new AnalyticsMaker();
        $ana->setTrackingId($config->analyticsTrackingId);
        $ana->setProtocolVersion(1);
        $ana->setClientId($config->getClientId());
        $ana->setUserAgentOverride($config->getUserAgent());
        $ana->setIpOverride($config->getIp());
        $ana->setDocumentPath($config->request->getRequestUri());
        if(!empty($config->getReferer())) $ana->setDocumentReferrer($config->getReferer());
        return $ana->sendPageview()->getRequestUrl();
    }

}