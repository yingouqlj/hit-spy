<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 17/1/22
 * Time: 上午1:54
 */

namespace Yingou\HitSpy;


use GuzzleHttp\Client;
use Yingou\HitSpy\Config\Config;

class Server
{
    public $request;
    public $uri;
    protected $config;

    public function __construct()
    {
        $this->request = ViewerRequest::createFromGlobals();
        $this->uri = $this->request->getRequestUri();
    }

    public function run()
    {
       $this->getConfig();
       $spy=new Spy();
       $spy->makeAnalyticsUrl($this->getConfig());
       return $this->getConfig()->response();
    }

    /**
     * @return Config
     * @throws \Exception
     */
    public function getConfig()
    {
        if (isset($this->config)) {
            return $this->config;
        }
        $path = explode('/', $this->uri);
        if (isset($path[0])) {
            $configName = '\Yingou\HitSpy\Config\\' . ucfirst(strtolower($path[1])) . 'Config';
            if (new $configName instanceof Config) {
                $this->config = new $configName();
                $this->config->request = $this->request;
                return $this->config;
            }
        }
        throw new \Exception('no config');
    }
}