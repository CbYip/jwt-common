<?php
/**
 * Author: Carl Yip
 * Date: 19-7-1
 * Time: 下午2:46
 */
require_once "vendor/autoload.php";
use Jwt\Jwt;

$jwt = new Jwt([
    'user' => 'test',
    'admin' => false
], 'mysecret');
var_dump($jwt->encrypt());