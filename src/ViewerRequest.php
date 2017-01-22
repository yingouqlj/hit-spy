<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 17/1/23
 * Time: 上午1:27
 */

namespace Yingou\HitSpy;


use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Component\HttpFoundation\Request;

class ViewerRequest extends Request
{

    public function getUserAgent()
    {
        return $this->headers->get('user-agent');
    }



}