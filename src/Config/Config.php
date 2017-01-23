<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 17/1/22
 * Time: 上午3:26
 */

namespace Yingou\HitSpy\Config;



use Symfony\Component\HttpFoundation\Response;
use Yingou\HitSpy\ViewerRequest;

class Config
{
    public $analyticsTrackingId = ''; //google analytics tid
    /* @var $request ViewerRequest */
    public $request;

    public function getUserAgent()
    {
        return $this->request->getUserAgent();
    }

    public function getIp()
    {
        return $this->request->getClientIp();
    }

    public function getTrackingId()
    {
        return $this->analyticsTrackingId;
    }

    public function getClientId()
    {
        return md5(microtime(true) . rand(0, 100));
    }

    public function getReferer()
    {
        return $this->request->getReferer();
    }

    public function response()
    {
        $image = imagecreatetruecolor(1, 1);
        $image = imagerotate($image, 90, 0);
        ob_start();
        ImagePNG($image);
        $imageString = ob_get_clean();
        $res = new Response($imageString, 200);
        imagedestroy($image);
        $res->headers->set('content-type','image/png');
        return $res;
    }
}