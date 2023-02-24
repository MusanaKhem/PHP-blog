<?php

    class ArticleManager extends Model{
        // Create the function which is going to recover all articles in BDD
        public function getArticles(){
            return $this->getAll('articles', 'Article');

            
        }

    }

?>