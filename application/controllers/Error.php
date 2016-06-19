<?php
class ErrorController extends Yaf_Controller_Abstract {

   public function errorAction($exception) {
        $this->getView()->assign("content", $exception->getMessage());
        //默认视图就是view/index/index.tpl,所以这里的display可有可无
        $this->getView()->display('error.tpl');
        //若是使用了display，一定要return false
        return false;
   }
}
?>