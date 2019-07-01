# jwt-common

#### 介绍
JWT令牌扩展，目前仅支持HS256加密方式。

#### 安装教程
```composer require carlyip/jwt-common```

#### 使用说明
加密
```
<?php
$jwt = new Jwt([
    'user' => 'test',
    'admin' => false
], 'mysecret');
var_dump($jwt->encrypt());
```

解密
```
<?php
$token = 'eyJhbGciOiJIUzI1NiIsInR5cGUiOiJKV1QifQ==.eyJ1c2VyIjoidGVzdCIsImFkbWluIjpmYWxzZX0=.e5856c5e7797bec67ba24a7eb3ab97e4a9214db95b7f9fe5c20d487d996f6705';
$jwt   = new Jwt($token, 'mysecret');
var_dump($jwt->decrypt());
```