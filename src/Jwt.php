<?php
/**
 * Author: Carl Yip
 * Date: 19-7-1
 * Time: 下午2:35
 */

class Jwt
{
    /**
     * 头部
     *
     * @var
     */
    protected $header = [
        'alg'  => 'HS256',
        'type' => 'JWT'
    ];

    /**
     * 负载
     *
     * @var
     */
    protected $payload;

    /**
     * 密钥
     *
     * @var
     */
    protected $secret;

    /**
     * 签名
     *
     * @var
     */
    protected $signature;

    /**
     * 架构函数
     *
     * @param mixed  $buffer
     * @param string $secret 密钥
     */
    public function __construct($buffer, $secret)
    {
        if (is_string($buffer)) {
            list($this->header, $this->payload, $this->signature) = explode('.', $buffer);
        } else {
            $this->payload = $buffer;
        }
        if ($secret) $this->secret = $secret;
    }

    /**
     * 加密方法
     *
     * @throws \Exception
     * @return string
     */
    public function encrypt(): string
    {
        $this->header  = base64_encode(json_encode($this->header));
        $this->payload = base64_encode(json_encode($this->payload));
        $signature     = hash('sha256', $this->header . $this->payload . $this->secret);
        return $this->header . '.' . $this->payload . '.' . $signature;
    }

    /**
     * 解密方法
     *
     * @return mixed
     */
    public function decrypt()
    {
        //根据签名验证token是否伪造
        $signature = hash('sha256', $this->header . $this->payload . $this->secret);
        if ($signature != $this->signature)
            return 'Token is forged';
        $payload = json_decode(base64_decode($this->payload), true);
        return $payload;
    }
}