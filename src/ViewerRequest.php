<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 17/1/23
 * Time: 上午1:27
 */

namespace Yingou\HitSpy;


use Symfony\Component\HttpFoundation\Request;

class ViewerRequest extends Request
{

    public function getUserAgent()
    {
        return $this->headers->get('User-Agent');
    }

    public function getReferer()
    {
        return $this->headers->get('Referer');
    }


}