﻿function chere($txt){
        $mit  = array("á","é","í","ó","ö","ü","ű","ú","Á","É","Í","Ó","Ö","Ü","Ű","Ú","ä","Ä","ß","§" );
  $mire = array("&#225;","&#233;","&#237;","&#243;","&#246;","&#252;","ű","&#250;","&#193;","&#201;","&#205;","&#211;","&#214;","&#220;","Ű","&#218;","&#228;","&#196;","&#223;","&#167;");
        return(str_replace($mit,$mire,$txt))        ;
}