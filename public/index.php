<?php
/**
 * Created by PhpStorm.
 * User: yingouqlj
 * Date: 2017/1/21
 * Time: 下午9:15
 */
use Yingou\HitSpy\Server;

require '../vendor/autoload.php';
date_default_timezone_set("Asia/Shanghai");
$server = new Server();
$server->run();