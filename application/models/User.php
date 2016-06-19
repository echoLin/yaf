<?php

class UserModel{

    public function getUserList(){
        $db = Database::getInstance();
        return $db->select('User', '*');
    }

    public function linkin($xmuId, $password){
        $password = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5('Nova'), $password, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
        $rows = array('xmuId' => $xmuId, 'password' => $password);
        $onDup = array('password' => $password);
        $db = Database::getInstance();
        //$info为键冲突时更新的字段
        return $db->insert('User', $rows, NULL, $onDup);
    }
}