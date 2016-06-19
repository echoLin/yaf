<?php
class IndexController extends Yaf_Controller_Abstract {

   public function indexAction() {
        $this->getView()->assign("content", "Hello World!");
        //默认视图就是view/index/index.tpl,所以这里的display可有可无
        $this->getView()->display('index/index.tpl');
        //若是使用了display，一定要return false
        return false;
   }

   public function LinkinAction($xmuId, $password){
        if(empty($xmuId) || empty($password)){
            echo json_encode(array('errno' => 1, 'errmsg' => '参数不完整'), JSON_UNESCAPED_UNICODE);
            return false;
        }
        $userModel = new UserModel();
        $ret = $userModel->linkin($xmuId, $password);
        if(is_bool($ret)){
            echo json_encode(array('errno' => 1, 'errmsg' => '绑定失败，请检查学号和密码'), JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('errno' => 0, 'errmsg' => '绑定成功'),JSON_UNESCAPED_UNICODE);
        }
        return false;
   }
}
?>