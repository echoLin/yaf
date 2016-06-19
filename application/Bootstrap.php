<?php
class Bootstrap extends Yaf_Bootstrap_Abstract{
    public function _initConfig(){
        $config = Yaf_Application::app()->getConfig();
        //var_dump($config);
        Yaf_Registry::set('config', $config);
    }

    public function _initSmarty(Yaf_Dispatcher $dispatcher){
        $smarty = new Smarty_Adapter(null, Yaf_Registry::get('config')->get('smarty'));
        $dispatcher->setView($smarty);
    }
}