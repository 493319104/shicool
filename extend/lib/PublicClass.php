<?php
namespace lib;

class PublicClass
{
    public function userNameEncrypt($userName)
    {
        if (empty($userName) || !preg_match("/^[a-zA-Z\d\_]*$/i", $userName)) {
            return array('code' => 0, 'codeinfo' => '用户名格式错误');
        }
        if (strlen($userName) > 15 || strlen($userName) < 3) {
            return array('code' => 0, 'codeinfo' => '用户名必须为6-20数字字母下划线');
        }
        return array('code' => 1);
    }
    /**
     * 验证密码
     * @param $password
     * @param $password_str
     * @param $db_password
     * @return bool
     */
    public function passwordEncrypt($password, $password_str, $db_password)
    {
        $password = md5($password . $password_str);
        if ($password == $db_password) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * 生成密码
     * @param $password
     * @return array|string
     */
    public function createPassword($password)
    {
        if (empty($password) || !preg_match("/^[a-zA-Z\d]*$/i", $password)) {
            return array('code' => 0, 'codeinfo' => '密码格式错误');
        }
        if (strlen($password) > 20 || strlen($password) < 6) {
            return array('code' => 0, 'codeinfo' => '密码必须为6-20数字字母');
        }
        $password_str = mt_rand(10, 99);
        for ($i = 2; $i > 0; $i--) {
            $password_str .= chr(mt_rand(65, 90));
        }
        $password = md5($password . $password_str);
        return array('code' => 1, 'password' => $password, 'password_str' => $password_str);
    }
    public function phoneEncrypt($phonenumber)
    {
        if (preg_match("/^1[34578]{1}\d{9}$/", $phonenumber)) {
            return array('code' => 1);
        }else{
            return array('code' => 0, 'codeinfo' => '手机号码格式错误');
        }
    }
    public function emailEncrypt($email)
    {
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match( $pattern, $email ))
        {
            return array('code' => 1);
        } else {
            return array('code' => 0, 'codeinfo' => '邮箱格式错误');
        }
    }
}