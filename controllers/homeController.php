<?php

class HomeController {

    // Create two private variable
    private $_articleManager;
    private $_view;

    // 
    public function __construct($url){

        // 
        if(isset($url) && count($url) > 1){

            // 
            throw new \Exception("Page was not found", 1);

        }else{
            $this->articles();
        }
    }

    // 
    private function articles(){

        // 
        $this->_articleManager = new ArticleManager();
        $articles = $this->articleManager->getArticles();
        require_once('homeView.php');

    }
}

?>