<?php
class UserController extends Yaf_Controller_Abstract {

   public function userAction() {
        $userModel = new UserModel();
        $list = $userModel->getUserlist();
        $this->getView()->assign('list', $list);
        $this->getView()->display('cms/userlist.tpl');
        return false;
   }
}
?>