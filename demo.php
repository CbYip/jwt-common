<?php
/**
 * Author: Carl Yip
 * Date: 19-7-1
 * Time: 下午2:46
 */
require_once "src/Jwt.php";


$jwt = new Jwt([
    'user' => 'test',
    'admin' => false
], 'mysecret');
var_dump($jwt->encrypt());