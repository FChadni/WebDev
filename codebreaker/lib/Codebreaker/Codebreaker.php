<?php

namespace Codebreaker;

class Codebreaker
{
    public function __construct() {
        $code = $this->getCode();
        $this->plaintext = $code['plaintext'];
        $this->encoded = $code['encoded'];
        $this->decode = $code['decode'];
        $this->decodedCode = $this->encoded;

        $this->letters();
    }

    public function post($post) {
        $this->message = "";

        if (isset($post['exit'])) {
            $this->reset = true;
            return "../";
        }

        if (isset($post['shuffle'])) {
            $this->Checked = array();

            // create list of letters that were checked
            for ($i = 0; $i < 26; $i++) {
                $letter = $this->letters[$i];
                if (isset($post[$letter])) {
                    $this->Checked[] = $letter;
                }
            }

            $this->shuffleLetters();

            if ($this->plaintext == $this->decodedCode) {
                return "../winPage.php";
            }

            return "../codebreaker.php";

        }

        else if (isset($post['giveup'])) {
            return "../losePage.php";
        }

        else if (isset($post['newgame'])) {
            // reset all values
            $code = $this->getCode();
            $this->plaintext = $code['plaintext'];
            $this->encoded = $code['encoded'];
            $this->decode = $code['decode'];
            $this->decodedCode = $this->encoded;

            $this->letters();

            return "../codebreaker.php";

        }
    }

//    public function newGame(){
//        $code = $this->getCode();
//        $this->plaintext = $code['plaintext'];
//        $this->encoded = $code['encoded'];
//        $this->decode = $code['decode'];
//        $this->decodedCode = $this->encoded;
//
//        $this->letters();
//    }

//    public function shuffleOrSwap(){
//        $this->Checked = array();
//
//        // create list of letters that were checked
//        for ($i = 0; $i < 26; $i++) {
//            $letter = $this->letters[$i];
//            if (isset($post[$letter])) {
//                $this->Checked[] = $letter;
//            }
//        }
//
//        $this->shuffleLetters();
//
//        if ($this->plaintext == $this->decodedCode) {
//            return "../winPage.php";
//        }
////        return "../codebreaker.php";
//    }

    public function setUser($user) {
        $this->user = $user;
    }
    public function getUser() {
        return $this->user;
    }

    public function setMessage($message) {
        $this->user = $message;
    }
    public function getMessage() {
        return $this->message;
    }

    public function getPlaintext(){
        return $this->plaintext;
    }
    public function getEncoded(){
        return $this->encoded;
    }
    public function getDecodeList() {
        return $this->decodeList;
    }
    public function getDecodedCode(){
        return $this->decodedCode;
    }

    public function isReset() {
        return $this->reset;
    }

    public function letters() {
        $this->letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

        $this->decodeList = array();
        for ($i = 0; $i < 26; $i++) {
            $letter = $this->letters[$i];
            $this->decodeList[$letter] = $letter;
        }
    }

    public function shuffleLetters() {
        // if letters were checked
        if (count($this->Checked) > 1) {
            $this->checkedList = $this->Checked;
            $decode1 = $this->decodeList;
            // if only two letters were checked
            if (count($this->Checked) == 2) {
                // swap letters
                $decode2 = $decode1[$this->Checked[0]];
                $this->decodeList[$this->Checked[0]] = $decode1[$this->Checked[1]];
                $this->decodeList[$this->Checked[1]] = $decode2;

            } else {
                shuffle($this->checkedList);

                for ($i = 0; $i < count($this->Checked); $i++) {
                    $decode3 = $decode1[$this->checkedList[$i]];
                    $this->decodeList[$this->Checked[$i]] = $decode3;
                }

            }

            $Str = "";
            for ($i = 0; $i < strlen($this->encoded); $i++) {
                $letter = $this->encoded[$i];
                if (in_array($letter, $this->letters)) {
                    $Str .= $this->decodeList[$letter];
                }
                else {
                    $Str .= $letter;
                }
            }
            $this->decodedCode = $Str;
        }
        else {
            $this->message = "Must select at least two letters";
        }
    }

//    public function setUser($user) {
//        $this->user = $user;
//    }
//    public function getUser() {
//        return $this->user;
//    }
//
//    public function setMessage($message) {
//        $this->user = $message;
//    }
//    public function getMessage() {
//        return $this->message;
//    }
//
//    public function getPlaintext(){
//        return $this->plaintext;
//    }
//    public function getEncoded(){
//        return $this->encoded;
//    }
//    public function getDecodeList() {
//        return $this->decodeList;
//    }
//    public function getDecodedCode(){
//        return $this->decodedCode;
//    }
//
//    public function isReset() {
//        return $this->reset;
//    }

    /**
     * Get a random coded message
     * @return array An array with keys 'plaintext', 'encoded', and 'decode', where
     *   $result['decode'] is an array of encoded letter to decoded letter.
     */
    public function getCode() {
        $r = rand() % count($this->codes);
        return $this->codes[$r];
    }

    private $codes = [
        [
            'plaintext' => 'EVERY DAY ABOVE GROUND IS A GOOD DAY.',
            'encoded' => 'XQXZM FKM KDLQX TZLPWF UA K TLLF FKM.',
            'decode' => ['A'=>'S', 'B'=>'P', 'C'=>'M', 'D'=>'B', 'E'=>'W', 'F'=>'D', 'G'=>'T', 'H'=>'F', 'I'=>'C', 'J'=>'L', 'K'=>'A', 'L'=>'O', 'M'=>'Y', 'N'=>'H', 'O'=>'K', 'P'=>'U', 'Q'=>'V', 'R'=>'Z', 'S'=>'X', 'T'=>'G', 'U'=>'I', 'V'=>'J', 'W'=>'N', 'X'=>'E', 'Y'=>'Q', 'Z'=>'R']
        ],
        [
            'plaintext' => 'SAY HELLO TO THE BAD GUY!',
            'encoded' => 'PVT ZWXXN IN IZW JVG HYT!',
            'decode' => ['A'=>'Z', 'B'=>'Q', 'C'=>'R', 'D'=>'X', 'E'=>'I', 'F'=>'P', 'G'=>'D', 'H'=>'G', 'I'=>'T', 'J'=>'B', 'K'=>'J', 'L'=>'M', 'M'=>'K', 'N'=>'O', 'O'=>'W', 'P'=>'S', 'Q'=>'C', 'R'=>'V', 'S'=>'F', 'T'=>'Y', 'U'=>'N', 'V'=>'A', 'W'=>'E', 'X'=>'L', 'Y'=>'U', 'Z'=>'H']
        ],
        [
            'plaintext' => 'HE\'S SUCH A GOOD LAWYER, THAT BY TOMORROW MORNING, YOU GONNA BE WORKING IN ALASKA.',
            'encoded' => 'TR\'A AGWT Q KCCV NQFDRH, MTQM OD MCYCHHCF YCHBEBK, DCG KCBBQ OR FCHJEBK EB QNQAJQ.',
            'decode' => ['A'=>'S', 'B'=>'N', 'C'=>'O', 'D'=>'Y', 'E'=>'I', 'F'=>'W', 'G'=>'U', 'H'=>'R', 'I'=>'Q', 'J'=>'K', 'K'=>'G', 'L'=>'F', 'M'=>'T', 'N'=>'L', 'O'=>'B', 'P'=>'Z', 'Q'=>'A', 'R'=>'E', 'S'=>'P', 'T'=>'H', 'U'=>'X', 'V'=>'D', 'W'=>'C', 'X'=>'J', 'Y'=>'M', 'Z'=>'V']
        ],
        [
            'plaintext' => 'THE WORLD IS YOURS!',
            'encoded' => 'ZHD EKROY SP JKURP!',
            'decode' => ['A'=>'Z', 'B'=>'Q', 'C'=>'V', 'D'=>'E', 'E'=>'W', 'F'=>'G', 'G'=>'C', 'H'=>'H', 'I'=>'F', 'J'=>'Y', 'K'=>'O', 'L'=>'J', 'M'=>'P', 'N'=>'X', 'O'=>'L', 'P'=>'S', 'Q'=>'B', 'R'=>'R', 'S'=>'I', 'T'=>'K', 'U'=>'U', 'V'=>'M', 'W'=>'A', 'X'=>'N', 'Y'=>'D', 'Z'=>'T']
        ],
        [
            'plaintext' => 'NOTHING EXCEEDS LIKE EXCESS. YOU SHOULD KNOW THAT, TONY.',
            'encoded' => 'BKHZSBT OEPOOCA RSIO OEPOAA. YKQ AZKQRC IBKU HZXH, HKBY.',
            'decode' => ['A'=>'S', 'B'=>'N', 'C'=>'D', 'D'=>'Q', 'E'=>'X', 'F'=>'M', 'G'=>'R', 'H'=>'T', 'I'=>'K', 'J'=>'V', 'K'=>'O', 'L'=>'J', 'M'=>'P', 'N'=>'B', 'O'=>'E', 'P'=>'C', 'Q'=>'U', 'R'=>'L', 'S'=>'I', 'T'=>'G', 'U'=>'W', 'V'=>'F', 'W'=>'Z', 'X'=>'A', 'Y'=>'Y', 'Z'=>'H']
        ]
    ];

    private $user = "";                         // name of player
    public $message;                           // error message
    private $reset = false;
    private $plaintext;
    private $encoded;
    private $decode;
    private $decodeList;
    private $decodedCode;
    private $letters = array();
    public $Checked = array();
    private $checkedList = array();
}