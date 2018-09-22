<?php

namespace app\controllers;

use RedBeanPHP\R as R;
use wcms\libs\Pagination;

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
        
        //debug($posts);
        $this->setMeta('Индекс пейдж', "Это описание индекс пейдж", "Это кейвордс");
        $this->setData(compact('posts', 'pagination'));
    }
}
