<?php
    class Helper{
        public static function generateToken($size = 32){
            $symbols = [0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'];
            $symbolsLength = count($symbols);
            $token = '';
            for($i = 0; $i<$size; $i++){
                $token .= $symbols[rand(0,$symbolsLength-1)];
            }
            return $token;
        }
    }