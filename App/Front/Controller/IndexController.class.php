<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class IndexController extends PlatformController{
    public function IndexAction(){
        $article = Factory::getModelInstance('ArticleModel');
        $recommendArt = $article->getRecommendArt(5);
        $this->assign('recommendArt', $recommendArt);
        $latestArt = $article->getLatestArt(8);
        $this->assign('latestArt', $latestArt);
        $rmdArtByHits = $article->getRmdArtByHits(8);
        $this->assign('rmdArtByHits', $rmdArtByHits);
        
        $master = Factory::getModelInstance('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);
        
        $this->display('index.html');
    }
}
