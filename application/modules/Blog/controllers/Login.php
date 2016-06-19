<?php
class LoginController extends Yaf_Controller_Abstract {
    public function indexAction($name){
        var_dump($name);
        $this->getView()->assign("name", $name);
    }
    public function loginAction(){
        $this->getView()->assign("name", "login");
    }
}
?>