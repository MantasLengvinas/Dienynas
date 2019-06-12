<?php 

class Mark{
    public function typeColor($id){
        switch($id){
            case 0:
            $color = 'color_kontr';
            break;
            case 1:
                $color = 'color_sav';
            break;
            case 2:
                $color = 'color_klases';
            break;
            case 3:
                $color = 'color_kaupiamasis';
            break;
            case 4: 
                $color = 'color_praktinis';
            break;
            case 5:
                $color = 'color_namu';
            break;
            case 6:
                $color = 'color_iskaita';
            break;
        }
        return $color;
    }
}