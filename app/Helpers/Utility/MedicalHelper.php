<?php
namespace App\Helpers\Utility;
/**
 * Class MedicalHelper.
 */
class MedicalHelper
{
    private static $DEF_MEDICAL_GRID = [
        '(1) FMR',
        '(2) UFR',
        '(3) FBST',
        '(4) HbA1c',
        '(5) Lipid',
        '(6) ECG',
        '(7) ESR',
        '(8) LFT',
        '(9) FBC',
        '(10) HIV',
        '(11) RP',
        '(12) CXR',
        '(13) HBsAg',
        '(14) AFP',
        '(15) 2D Echo',
        '(16) TMT'
     ];

    public static function get_medical_requirement_cetegory( $age,$risk,$is_male=false){
       
        if($age<=35){

            if($risk<=7500000){
                return "NML";
            }else if($risk<=10000000){
                return "C";
            }else if($risk<=12500000){
                return "D";
            }else{
                return "E";
            }
        }else if($age<=40){
            if($risk<=5000000){
                return "NML";
            }else if($risk<=6000000){
                return "A";
            }else if($risk<=7500000){
                return "B";
            }else if($risk<=10000000){
                return "D";
            }else{
                return "E";
            }
        }else if($age<=45){
            if($risk<=4000000){
                return "NML";
            }else if($risk<=5000000){
                return "A";
            }else if($risk<=6000000){
                return "B";
            }else if($risk<=7500000){
                return "C";
            }else{
                return "E";
            }
        }else if($age<=50){
            if($risk<=3000000){
                return "NML";
            }else if($risk<=4000000){
                return "B";
            }else if($risk<=5000000){
                return "C";
            }else if($risk<=6000000){
                return "D";
            }else{
                return "E";
            }
        }else if($age<=55){
            if($risk<=1500000){
                return "NML";
            }else if($risk<=2000000){
                return "A";
            }else if($risk<=2500000){
                return "B";
            }else if($risk<=3000000){
                return "C";
            }else if($risk<=4000000){
                return "D";
            }else if($risk<=5000000){
                return "D";
            }else{
                return "E";
            }
        }else if($age<=60){
            if($risk<=1000000){
                return "NML";
            }else if($risk<=1500000){
                return "A";
            }else if($risk<=2000000){
                return "B";
            }else if($risk<=2500000){
                return "C";
            }else if($risk<=3000000){
                return "C";
            }else if($risk<=4000000){
                return "D";
            }else{
                return "E";
            }
        }else{
            return '';
        }
    }
    
    public static function get_medical_requirement_detail($medicalChar){
        if($medicalChar == 'A'){
            return [self::$DEF_MEDICAL_GRID[0],
                    self::$DEF_MEDICAL_GRID[1],
                    self::$DEF_MEDICAL_GRID[2],
                    self::$DEF_MEDICAL_GRID[3],
                    self::$DEF_MEDICAL_GRID[4],
                    self::$DEF_MEDICAL_GRID[5]];
        }else if($medicalChar == 'B'){
            return [self::$DEF_MEDICAL_GRID[0],
                    self::$DEF_MEDICAL_GRID[1],
                    self::$DEF_MEDICAL_GRID[2],
                    self::$DEF_MEDICAL_GRID[3],
                    self::$DEF_MEDICAL_GRID[4],
                    self::$DEF_MEDICAL_GRID[5],
                    self::$DEF_MEDICAL_GRID[6],
                    self::$DEF_MEDICAL_GRID[7]];
        }else if($medicalChar == 'C'){
            return [self::$DEF_MEDICAL_GRID[0],
                    self::$DEF_MEDICAL_GRID[1],
                    self::$DEF_MEDICAL_GRID[2],
                    self::$DEF_MEDICAL_GRID[3],
                    self::$DEF_MEDICAL_GRID[4],
                    self::$DEF_MEDICAL_GRID[5],
                    self::$DEF_MEDICAL_GRID[6],
                    self::$DEF_MEDICAL_GRID[7],
                    self::$DEF_MEDICAL_GRID[8],
                    self::$DEF_MEDICAL_GRID[9],
                    self::$DEF_MEDICAL_GRID[10]];
        }else if($medicalChar == 'D'){
            return [self::$DEF_MEDICAL_GRID[0],
                    self::$DEF_MEDICAL_GRID[1],
                    self::$DEF_MEDICAL_GRID[2],
                    self::$DEF_MEDICAL_GRID[3],
                    self::$DEF_MEDICAL_GRID[4],
                    self::$DEF_MEDICAL_GRID[5],
                    self::$DEF_MEDICAL_GRID[6],
                    self::$DEF_MEDICAL_GRID[7],
                    self::$DEF_MEDICAL_GRID[8],
                    self::$DEF_MEDICAL_GRID[9],
                    self::$DEF_MEDICAL_GRID[10],
                    self::$DEF_MEDICAL_GRID[11],
                    self::$DEF_MEDICAL_GRID[12],
                    self::$DEF_MEDICAL_GRID[13]];
        }else if($medicalChar == 'E'){
            return [self::$DEF_MEDICAL_GRID[0],
                    self::$DEF_MEDICAL_GRID[1],
                    self::$DEF_MEDICAL_GRID[2],
                    self::$DEF_MEDICAL_GRID[3],
                    self::$DEF_MEDICAL_GRID[4],
                    self::$DEF_MEDICAL_GRID[6],
                    self::$DEF_MEDICAL_GRID[7],
                    self::$DEF_MEDICAL_GRID[8],
                    self::$DEF_MEDICAL_GRID[9],
                    self::$DEF_MEDICAL_GRID[10],
                    self::$DEF_MEDICAL_GRID[11],
                    self::$DEF_MEDICAL_GRID[12],
                    self::$DEF_MEDICAL_GRID[13],
                    self::$DEF_MEDICAL_GRID[14],
                    self::$DEF_MEDICAL_GRID[15]];
        }else{
            return [];
        }
    }

}