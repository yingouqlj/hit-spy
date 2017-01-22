<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 17/1/22
 * Time: 上午1:54
 */

namespace Yingou\HitSpy;


use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use TheIconic\Tracking\GoogleAnalytics\Analytics;

class Server
{
    public $request;

    public function __construct()
    {
        $this->request = ViewerRequest::createFromGlobals();
    }

    public function run()
    {
        $config=new Config();
        $ana=new Analytics();
        $ana->setTrackingId($config->analyticsTrackingId);
        $ana->setProtocolVersion(1);
        $ana->setClientId(md5(microtime(true)));
        $ana->setUserAgentOverride($this->request->headers->get('user-agent'));
        $ana->setDocumentPath('/mypage');
        $url=$ana->sendPageview()->getRequestUrl();
$http=new Client();
$res=$http->request('GET',$url);
var_dump([$url,$res,$this->request]);
    }

}