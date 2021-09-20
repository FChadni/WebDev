<?php


namespace Codebreaker;


class IndexController
{
    public function __construct(Codebreaker $codebreaker, $post){

        $this->codebreaker = $codebreaker;

        //$name = strip_tags($post['name']);
        $message = "Please enter a name!";
        if(isset($post['name'])){
            if($post['name'] == ""){
                $codebreaker->setMessage($message);
                $this->redirect = "$this->root/index.php";
            } else{
                $codebreaker->setUser(strip_tags($post['name']));
                $this->redirect = "$this->root/codebreaker.php";
            }
        }
//        else if(isset($post['newgame'])){
//            $codebreaker->newGame();
//            $this->redirect = "$this->root/codebreaker.php";
//        }
//        else if(isset($post['giveup'])){
//            $this->redirect = "$this->root/losePage.php";
//        }
//        else if(isset($post['exit'])){
//            $this->reset = true;
//            $this->redirect = "$this->root/index.php";
//        }
//        else if(isset($post['shuffle'])){
//            $codebreaker->Checked = array();
//
//            // create list of letters that were checked
//            for ($i = 0; $i < 26; $i++) {
//                $letter = $codebreaker->letters[$i];
//                if (isset($post[$letter])) {
//                    $codebreaker->Checked[] = $letter;
//                }
//            }
//            $codebreaker->shuffleLetters();
//
//            if($codebreaker->getPlaintext() == $codebreaker->getDecodedCode()){
//                $this->redirect = "$this->root/winPage.php";
//            }
//            $this->redirect = "$this->root/codebreaker.php";
//        }
    }

    public function getRedirect(){
        return $this->redirect;
    }

    public function isReset(){
        return $this->reset;
    }
    private $codebreaker;
    private $redirect;
    private $reset=false;
    private $root = "/~begumfa1/exam/";
}