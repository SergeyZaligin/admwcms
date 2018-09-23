<?php

namespace app\controllers;

use RedBeanPHP\R as R;
use wcms\libs\Pagination;
use wcms\Cache;
/**
 * MainController
 *
 * @author sergey
 */
class MainController extends AppController
{
    public function indexAction() 
    {
        $total = R::count('test');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 2;
        
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();
        
        $posts = R::findAll('test', "LIMIT $start, $perPage");
        
//        $cache = Cache::instance();
//        $cache->set('test', $posts);
//        $data = $cache->get('test');
        //debug($data);
        $this->setMeta('Индекс пейдж', "Это описание индекс пейдж", "Это кейвордс");
        $this->setData(compact('posts', 'pagination'));
    }
    
    public function testAction() 
    {
        if ($this->isAjax()) {
            echo 'isAjax!!!';
            die;
        }
        $this->setMeta('Test пейдж', "Это описание test пейдж", "Это кейвордс");
    }
}
