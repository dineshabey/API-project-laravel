<?php
namespace App\Helpers\Utility;

use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
/**
 * Class PremiumCalcHelper.
 */
class AdyapanaPlusPremiumCalcHelper
{
    public static $div_percentage_low = 8;
    public static $div_percentage_medium = 10;
    public static $div_percentage_high = 12;
    

    private static $wop_base_parameter = 5;
    private static $initial_policy_fee = 300;
    private static $renewal_policy_fee = 120;

    private static $min_age_at_entry = 18;
    private static $max_age_at_entry = 55;

    public static $MIN_TERM = 10;
    public static $MAX_TERM = 22;
    public static $MAX_MATURITY_AGE = 70;
    
    private static $min_monthly_premium = 3000;
    private static $min_quartely_premium = 6000;
    private static $min_half_yearly_premium = 12000;
    private static $min_yearly_premium = 24000;
   

    private static $DEF_MEDICAL_GRID = [
                                            '(1) MER (Medical Examination Report) + UFR (Urine Full Report)',
                                            '(2) FBST (Fasting Blood Sugar Test)',
                                            '(3) LIPID (Lipid Profile)',
                                            '(4) ECG (Electro Cradio Graph)',
                                            '(5) FBC (Full Blood Count) + ESR',
                                            '(6) Liver Profile (SGOT + SGPT + GGT + Alkaline Phosphatase, Serum Bilirubin - Direct & Indirect)',
                                            '(7) Serum Creatinine + Blood Urea',
                                            '(8) HIV Antibody Test + HBsAg',
                                            '(9) HbA1c (Glycosylated Hemoglobin)',
                                            '(10) TMT (Tread Mill Test)',
                                            '(11) WA USG',
                                            '(12) PSA'
                                         ];
                                    

    public static function get_financial_risk($age,$risk,$is_male=false){
        if($age<=35){

            if($risk>15000000){
                return [0,1,2,3,4,5,6,7,8];
            }else{
                return [];
            }
        }else if($age<=40){
            if($risk <= 12000000){
                return [];
            }else if($risk <= 15000000){
                return [0,1,2,3,4,5,6,7,8,9];
            }else{
                return [0,1,2,3,4,5,6,7,8,9];
            }
        }else if($age<=45){
            if($risk <= 10000000){
                return [];
            }else if($risk <= 12000000){
                return [0,1,2,3,4,5,6,7,8];
            }else if($risk <= 15000000){
                return [0,1,2,3,4,5,6,7,8,9];
            }else{
                return [0,1,2,3,4,5,6,7,8,9];
            }
        }else if($age<=50){
            if($risk <= 5000000){
                return [];
            }else{
                return [0,1,2,3,4,5,6,7,8,9];
            }
        }else if($age<=55){
            if($risk <= 1500000){
                return [];
            }else if($risk <= 3000000){
                return [0,1,2,3,4,5];
            }else if($risk <= 5000000){
                return [0,1,2,3,4,5,6,7];
            }else{
                return [0,1,2,3,4,5,6,7,8,9];
            }
        }else if($age<=60){
            if($risk <= 1000000){
                return [];
            }else if($risk <= 3000000){
                return [0,1,2,3,4,5];
            }else if($risk <= 5000000){
                return [0,1,2,3,4,5,6,7];
            }else{
                return [0,1,2,3,4,5,6,7,8,9];
            }
        }else{
            if($risk <= 1000000){
                return [0,1,2,3];
            }else if($risk <= 3000000){
                return [0,1,2,3,4,5];
            }else if($risk <= 5000000){
                return [0,1,2,3,4,5,6,7];
            }else{
                return [0,1,2,3,4,5,6,7,8,9];
            }
        }
    }

    public static function get_medical_risk($age,$risk,$is_male=false){
       
        if($age<=45){

            if($risk<=3000000){
                return [];
            }else if($risk<=4000000){
                return [0,1]; //A
            }else if($risk<=5000000){
                return [0,1,2,3,4,5,6,7,8];//K
            }else if($risk<=20000000){
                return [0,1,2,3,4,5,6,7,8,10];//M
            }else{
                if($is_male)
                    return [0,1,2,3,4,5,6,7,8,9,10,11];//N + PSA
                else    
                    return [0,1,2,3,4,5,6,7,8,9,10];//N
            }
            
        }else if($age<=50){
            if($risk <= 200000){ 
                return [0,1];//A
            }else if($risk <= 300000){
                return [0,1,2,3]; //B
            }else if($risk <= 400000){
                return [0,1,2,3,4,8]; //C
            }else if($risk <= 750000){
                return [0,1,2,3,4,5,6,8]; //D
            }else if($risk <= 1000000){
                return [0,1,2,4,5,6,8,9]; //E
            }else if($risk <= 1500000){
                return [0,1,2,3,4,5,6,8,9]; //F
            }else if($risk <= 5000000){
                return [0,1,2,3,4,5,6,7,8,9]; //G
            }else if($risk <= 20000000){
                return [0,1,2,3,4,5,6,7,8,9,10]; //H
            }else{
                if($is_male){
                    return [0,1,2,3,4,5,6,7,8,9,10,11]; //N + PSA
                }else{
                    return [0,1,2,3,4,5,6,7,8,9,10]; //N
                }
                
            }
        }else if($age<=55){
            if($risk <= 200000){
                return [0,1,2,3]; //B
            }else if($risk <= 300000){
                return [0,1,2,3,4,8]; //C
            }else if($risk <= 500000){
                return [0,1,2,3,4,5,6,8]; //D
            }else if($risk <= 750000){
                return [0,1,2,4,5,6,8,9]; //E
            }else if($risk <= 1000000){
                return [0,1,2,3,4,5,6,8,9]; //F
            }else if($risk <= 1500000){
                if($is_male){
                    return [0,1,2,3,4,5,6,8,9,11]; //I
                }else{
                    return [0,1,2,3,4,5,6,8,9]; //I
                }
            }else if($risk <= 4000000){
                if($is_male){
                    return [0,1,2,3,4,5,6,7,8,9,11]; //L
                }else{
                    return [0,1,2,3,4,5,6,7,8,9]; //L
                }
            }else{
                if($is_male){
                    return [0,1,2,3,4,5,6,7,8,9,10,11]; //N + PSA
                }else{
                    return [0,1,2,3,4,5,6,7,8,9,10]; //N
                }
            }
        }else if($age<=60){
            if($risk <= 100000){
                return [0,1,2,3]; //B
            }else if($risk <= 300000){
                return [0,1,2,3,4,8]; //C
            }else if($risk <= 400000){
                return [0,1,2,3,4,5,6,8]; //D
            }else if($risk <= 500000){
                return [0,1,2,4,5,6,8,9]; //E
            }else if($risk <= 1000000){
                return [0,1,2,4,5,6,8,9]; //J
            }else if($risk <= 1500000){
                if($is_male){
                    return [0,1,2,3,4,5,6,8,9,11]; //I
                }else{
                    return [0,1,2,3,4,5,6,8,9]; //I
                }
            }else if($risk <= 3000000){
                if($is_male){
                    return [0,1,2,3,4,5,6,7,8,9,11]; //L
                }else{
                    return [0,1,2,3,4,5,6,7,8,9]; //L
                }
            }else{
                if($is_male){
                    return [0,1,2,3,4,5,6,7,8,9,10,11]; //N + PSA
                }else{
                    return [0,1,2,3,4,5,6,7,8,9,10]; //N
                }
            }
        }else{
            if($is_male){
                return [0,1,2,3,4,5,6,7,8,9,10,11]; //N + PSA
            }else{
                return [0,1,2,3,4,5,6,7,8,9,10]; //N
            }
        }
    }

    public static function get_medical_requirements($age,$financial_risk,$medical_risk,$is_male=false){
        $med_m = [];
        $med_f = self::get_financial_risk($age,$financial_risk,$is_male);
        
        if($medical_risk > 0)
            $med_m = self::get_medical_risk($age,$medical_risk,$is_male);
        
        $res = array_unique (array_merge ($med_f, $med_m));
        sort($res);
        $ret=[];
        foreach($res as $i){
            $ret[] = self::$DEF_MEDICAL_GRID[$i];
        }
        return $ret;

    }

    public static function get_policy_fee_by_frequency($frequency_char='Y'){
        $val = 0;
        switch ($frequency_char) {
            case 'M':
                $val = self::$renewal_policy_fee/12;
                break;
            case 'Q':
                $val = self::$renewal_policy_fee/4;
                break;
            case 'H':
                $val = self::$renewal_policy_fee/2;
                break;
            case 'Y':
            $val = self::$renewal_policy_fee/1;
                break;
            default:
            $val = 0;
        }
        return $val;
    }

    public static function get_mode_factor($frequency_char='Y'){
        $factor = 0;
        switch ($frequency_char) {
            case 'M':
                $factor = 1;
                break;
            case 'Q':
                $factor = 3;
                break;
            case 'H':
                $factor = 6;
                break;
            case 'Y':
                $factor = 12;
                break;
            default:
            $factor = 12;
        }
        return $factor;
    }

    public static function get_occupation_extra_by_code($occ_code){
        $occ_val = DB::table('tbl_occupation_extras')->where('occ_code', $occ_code)->first();
        return ($occ_val);
    }
    public static function get_occupation_list(){
        $occ_val = DB::table('tbl_occupation_extras')
                    ->select('occ_name as label','occ_code as code')
                    ->get();
        return ($occ_val);
    }
    
    public static function get_child_rider_rate($rider_code,$type,$age,$term,$option=0){
        if($rider_code == 'HB-CHILD'){
            if($option == '1'){
                return 7000;
            }else if($option == '2'){
                return 12000;
            }else{
                return 0;
            }
            
        }
        return 0;
    }

    public static function get_rider_rate($rider_code,$type,$age,$term,$option=0){
        if($rider_code == 'PTD'){
            return 0;
        }
        else if($rider_code == 'PA'){
            return 2.4;
        }
        else if($rider_code == 'WI'){
            return 0.05;
        }
        else if($rider_code == 'AFP'){
            $key = 'term_'.$term;
            return $rate = DB::table('tbl_rate_afp')
                        ->select('term_'.$term)
                        ->where('age', $age)
                        ->first()->$key;
            
        }
        else if($rider_code == 'CI'){
            $key = 'term_'.$term;
            return $rate = DB::table('tbl_rate_ci')
                        ->select('term_'.$term)
                        ->where('age', $age)
                        ->first()->$key;
        }
        else if($rider_code == 'CI-SPOUSE'){
            $key = 'term_'.$term;
            return $rate = DB::table('tbl_rate_ci')
                        ->select('term_'.$term)
                        ->where('age', $age)
                        ->first()->$key;
            
        }
        else if($rider_code == 'FR-SPOUSE'){
            $key = 'term_'.$term;
            return $rate = DB::table('tbl_rate_afp')
                        ->select('term_'.$term)
                        ->where('age', $age)
                        ->first()->$key;
            
        }
        else if($rider_code == 'HB'){
            if($option == 'Yes'){ //Family Yes
                $key = 'term_'.$term;
                return $rate = DB::table('tbl_rate_hb_f')
                            ->select('term_'.$term)
                            ->where('age', $age)
                            ->first()->$key;

            }else{ //Individual
                
                $key = 'term_'.$term;
                return $rate = DB::table('tbl_rate_hb_i')
                            ->select('term_'.$term)
                            ->where('age', $age)
                            ->first()->$key;
            }
            
        }


        return 0;

    }

    public static function check_rider_validations($data){

        $main_dob = $data['member_main']['dob'];
        $main_age_exact = DateHelper::get_exact_age($main_dob);
        $main_age_nearest = DateHelper::get_nearest_age($main_dob);
        $main_gender = $data['member_main']['gender'];
        $main_occupation_code = $data['member_main']['occupation'];
        //$occupation_extras = self::get_occupation_extra_by_code($main_occupation_code); //DEC = -1 , REST -2
        
        $frequency = $data['additional_info']['frequency'];
        $basic_mode_premium = (double)$data['additional_info']['monthly_basic_premium'];
        $policy_term = (int)$data['additional_info']['policy_term'];

        $maturity_age = $main_age_nearest + $policy_term ;
        $primary_need =  $data['additional_info']['primary_need'];

        $bsa = $basic_mode_premium  * 5  * 12 / self::get_mode_factor($frequency);

        $has_spouse = ($data['member_main']['has_spouse'] == 'Yes'? true : false ); 
        
        //Main min age at entry validation
        if( $main_age_exact < self::$min_age_at_entry ){
            return 'Minimum age at entry should be greater than or equal to '.self::$min_age_at_entry;
        }
        //Main max age at entry validation
        if( $main_age_exact > self::$max_age_at_entry ){
            return 'Minimum age at entry should be lesser than or equal to '.self::$max_age_at_entry;
        }

        //Minimum mode premium validaton
        if( ($frequency == 'M' ) && ((double)$basic_mode_premium) < self::$min_monthly_premium ){
            return 'Monthly premium should be greater than or equal to '.self::$min_monthly_premium;
        }else if( ($frequency == 'Q' ) && ((double)$basic_mode_premium) < self::$min_quartely_premium ){
            return 'Quartely premium should be greater than or equal to '.self::$min_quartely_premium;
        }else if( ($frequency == 'H' ) && ((double)$basic_mode_premium) < self::$min_half_yearly_premium ){
            return 'Half Yearly premium should be greater than or equal to '.self::$min_half_yearly_premium;
        }else if( ($frequency == 'Y' ) && ((double)$basic_mode_premium) < self::$min_yearly_premium ){
            return 'Annual premium should be greater than or equal to '.self::$min_yearly_premium;
        }else if(!in_array($frequency,array('M','Q','H','Y'))){
            return 'Invalid mode premium';
        }

        //Policy Term validation
        if(($policy_term > self::$MAX_TERM || $policy_term < self::$MIN_TERM )){
            return 'Policy term should be a value between '.self::$MIN_TERM.' and '.self::$MAX_TERM;
        }
        else if(($policy_term > (self::$MAX_MATURITY_AGE - $main_age_nearest))){
            return 'Maximum policy term cannot exceed '.(self::$MAX_MATURITY_AGE - $main_age_nearest);
        }

        //Max rider sumassured validation
        if($frequency){
            
            //Rider declaration
            $riders['PTD_SA'] = 0;
            $riders['PTD'] = 0;

            $riders['PA_SA'] = 0;
            $riders['PA'] = 0;

            $riders['AFP_SA'] = 0;
            $riders['AFP'] = 0;

            $riders['CI_SA'] = 0;
            $riders['CI'] = 0;

            

            $riders['HB_SA'] = 0;
            $riders['HB'] = 0;
            $riders['HB_OPTION'] = 0;

            $riders['WI_SA'] = 0;
            $riders['WI'] = 0;
            $riders['WI_OPTION'] = 0;

            $riders['CI-SPOUSE_SA'] = 0;
            $riders['CI-SPOUSE'] = 0;

            $riders['FR-SPOUSE_SA'] = 0;
            $riders['FR-SPOUSE'] = 0;

            $riders['HB-CHILD_SA'] = 0;
            $riders['HB-CHILD'] = 0;



            foreach($data['member_main']['riders'] as $rider){
                if($rider['enabled'] === false && $rider['code'] == 'PTD'){
                    return $rider['code'] .' rider cannot be removed';
                }
                if($rider['enabled'] === true && $rider['code'] == 'PTD'){
                    $rider['sum_assured'] = min($bsa,25000000);
                    $riders['PTD_SA'] = (int)$rider['sum_assured'];
                    $riders['PTD'] = 1;
                    
                }

                if($rider['enabled'] === true && $rider['code'] == 'PA'){

                    if((int)$rider['sum_assured'] <=  0){
                        return $rider['code'] .' Sum Assured cannot be zero';
                    }else if( ((int)$rider['sum_assured'] > min($bsa * ( $policy_term + 5 ),20000000)) ){
                        return $rider['code'] .' Sum Assured cannot exceed '.number_format(min( $bsa * ( $policy_term + 5 ) ,20000000));
                    }
                    else{
                        $riders['PA_SA'] = (int)$rider['sum_assured'];
                        $riders['PA'] = 1;
                    }
                }

                if($rider['enabled'] === true && $rider['code'] == 'AFP'){

                    if((int)$rider['sum_assured'] <=  0){
                        return $rider['code'] .' Sum Assured cannot be zero';
                    }else if( ((int)$rider['sum_assured'] > ($bsa * ( $policy_term + 5 ))) ){
                        return $rider['code'] .' Sum Assured cannot exceed '.number_format($bsa * ( $policy_term + 5 ));
                    }
                    else{
                        $riders['AFP_SA'] = (int)$rider['sum_assured'];
                        $riders['AFP'] = 1;
                    }
                }
                
                if($rider['enabled'] === true && $rider['code'] == 'CI'){

                    if((int)$rider['sum_assured'] <=  0){
                        return $rider['code'] .' Sum Assured cannot be zero';
                    }else if( ((int)$rider['sum_assured'] > ($basic_mode_premium * 12 / self::get_mode_factor($frequency)) *  ( $policy_term + 5 ) ) ){
                        return $rider['code'] .' Sum Assured cannot exceed '.number_format( ($basic_mode_premium * 12 / self::get_mode_factor($frequency)) * ( $policy_term + 5 ));
                    }
                    else{
                        $riders['CI_SA'] = (int)$rider['sum_assured'];
                        $riders['CI'] = 1;
                    }
                }
                
                if($rider['enabled'] === true && $rider['code'] == 'HB'){

                    $riders['HB_SA'] = 0;
                    $riders['HB'] = 1;
                    $riders['HB_OPTION']= (int)$rider['drp_val'];
                    
                }

                if($rider['enabled'] === false && $rider['code'] == 'WI'){
                    return $rider['code'] .' rider cannot be removed';
                }
                if($rider['enabled'] === true && $rider['code'] == 'WI'){
                    $riders['WI'] = 1;
                }
                 
            }

            if($has_spouse){

                $spouse_dob = $data['member_spouse']['dob'];
                $spouse_age_exact = DateHelper::get_exact_age($spouse_dob);
                $spouse_age_nearest = DateHelper::get_nearest_age($spouse_dob);

                $spouse_occupation_code = $data['member_spouse']['occupation'];
                //$occupation_extras_spouse = self::get_occupation_extra_by_code($spouse_occupation_code); //DEC = -1 , REST -2

                //Spouse min age at entry validation
                if( $spouse_age_exact < self::$min_age_at_entry ){
                    return 'Spouse: Minimum age at entry should be greater than or equal to '.self::$min_age_at_entry;
                }
                //Spouse max age at entry validation
                if( $spouse_age_exact > self::$max_age_at_entry ){
                    return 'Spouse: Maximum age at entry should be lesser than or equal to '.self::$max_age_at_entry;
                }

                foreach($data['member_spouse']['riders'] as $rider){

                    if($rider['enabled'] === true && $rider['code'] == 'CI-SPOUSE'){

                        if($riders['CI'] == 0){
                            return 'Main life\'s '.$rider['code'] .' cover not selected';
                        }

                        if((int)$rider['sum_assured'] <=  0){
                            return $rider['code'] .' Sum Assured cannot be zero';
                        }else if( ((int)$rider['sum_assured'] > min(20000000,$riders['CI_SA'])) ){
                            return $rider['code'] .' Sum Assured cannot exceed '.number_format( min(20000000,$riders['CI_SA']) );
                        }
                        else{
                            $riders['CI-SPOUSE_SA'] = (int)$rider['sum_assured'];
                            $riders['CI-SPOUSE'] = 1;
                        }
                    }
                    if($rider['enabled'] === true && $rider['code'] == 'FR-SPOUSE'){

                        if((int)$rider['sum_assured'] <=  0){
                            return $rider['code'] .' Sum Assured cannot be zero';
                        }else if( ((int)$rider['sum_assured'] > min(( ($basic_mode_premium * 12 / self::get_mode_factor($frequency)) *  ( $policy_term + 5 ) ),1000000)) ){
                            return $rider['code'] .' Sum Assured cannot exceed '.number_format(min(( ($basic_mode_premium * 12 / self::get_mode_factor($frequency)) *  ( $policy_term + 5 ) ),1000000));
                        }
                        else{
                            $riders['FR-SPOUSE_SA'] = (int)$rider['sum_assured'];
                            $riders['FR-SPOUSE'] = 1;
                        }
                    }
    
                }
            }


            //Child rider validation
            $children_info = [];
            $children_riders=[];
            $premium_info_children = [];
            $child_count = count($data['member_child']);
            $verify_child_count = 0;
            if( $child_count > 0){
                for($i=0; $i < $child_count ; $i++ ){
                    $ch_dob = $data['member_child'][$i]['dob'];
                    $ch_age_nearest = DateHelper::get_nearest_age($ch_dob);
                    $ch_age_exact_months = DateHelper::get_exact_age($ch_dob,true);
                    $ch_age_exact_years = DateHelper::get_exact_age($ch_dob);
                    $ch_rider_term = $policy_term;
                    if( ($ch_age_nearest + $policy_term) > 22){
                        $ch_rider_term = ($policy_term - ($ch_age_nearest + $policy_term -22));
                    }
                    $ch_gender =  ($data['member_child'][$i]['title']=='Master'?'Male':'Female');
                    

                    //HB-CHILD - If rider enabled
                    
                    if($data['child_riders'][0]['enabled'] === true){
                        $riders['HB-CHILD'] = 1;

                        
                        for($j=0; $j< $child_count; $j++){
                            //If rider enabled
                            if($data['child_riders'][0]['child'][$j]['checked'] === true && $j==$i){

                                if($ch_age_exact_years > 22 ){
                                    return 'Child age cannot be greater than to 18 years';
                                }
                                $verify_child_count++;
                            }
                        }
                    } 
                    
                }
            }
            
            if(($riders['HB-CHILD'] == 1 ) && ($child_count != $verify_child_count)){
                return 'All children should be selected for FR-CHILD cover';
            }


        }
        return false;
    }
    
    public static function get_HB_CHILD_sum_assured_by_plan_id($plan_id){
        $val = 0;
        switch ($plan_id) {
            case '1':
                $val = 50000;
                break;
            case '2':
                $val = 100000;
                break;
            default:
            $val = 0;
        }
        return $val;
    }

    public static function get_HB_sum_assured_by_plan_id($plan_id){
        $val = 0;
        switch ($plan_id) {
            case '1':
                $val = 2000;
                break;
            case '2':
                $val = 4000;
                break;
            case '3':
                $val = 6000;
                break;
            case '4':
                $val = 8000;
                break;
            case '5':
                $val = 10000;
                break;
            default:
            $val = 0;
        }
        return $val;
    }

    //Round up helper
    public static function round_up ($value, $places=0) {
        if ($places < 0) { $places = 0; }
        $mult = pow(10, $places);
        return ceil($value * $mult) / $mult;
    }

    //Excel NPV function implementation
    public static function excel_npv($rate, $value, $n){
        $npv=0;
        for ($i=$n;$i>=0;$i-=1) {
	        $npv = ($value + $npv) / (1 + $rate);
	    }
        return $npv;
    }

    
    public static function calculate_funds($tmpSumAssured, $tmpAnualPremium, $tmpTerm, $tmpAge, $tmpDRate)
	{
		$mortCharge = 3;
        $fundMGT = 1;
        $tabarru_discount_rate_yearly  = 0.02;
        $tabarru_discount_rate_monthly = pow((1 + $tabarru_discount_rate_yearly),(1/12))-1;
		
		$funds = array();
        $fund = array();
        $allocatedInvestment = 0;
        $allocatedPremium = 0;
        
        $rateMortality = self::get_mortality_charge();
        

		for ($count=1; $count <=4 ; $count++) { 
			
			$counter = 0;

			for ($I=1; $I <= $tmpTerm; $I++) 
			{ 
				for ($X=1; $X <= 12 ; $X++) 
				{ 
                    
					$counter = $counter + 1;

					//Populate Years Column
					$fund[$counter][1]= $I;

					//Populate Months Column
					$fund[$counter][2]= $X;

					//Populate the type Column (M/Q/HY/Y)
					if ($count == 1)
					{
						$calType = "M";
						$calDivider = 12;
						$fund[$counter][14]= $X;
					}
					elseif ($count == 2)
					{
						$calType = "Q";
						$calDivider = 4;
						if ($X == 1)
						{
							$fund[$counter][14]= $X;
						}
						elseif ($X == 4)
						{
							$fund[$counter][14]= $X;
						} 
						elseif ($X == 7)
						{
							$fund[$counter][14]= $X;
						} 
						elseif ($X == 10)
						{
							$fund[$counter][14]= $X;
						} 
						else
						{
							$fund[$counter][14]= 0;
						} 
					}
					elseif ($count == 3)
					{
						$calType = "H";
						$calDivider = 2;
						if ($X == 1)
						{
							$fund[$counter][14]= $X;
						}
						elseif ($X == 7)
						{
							$fund[$counter][14]= $X;
						}
						else
						{
							$fund[$counter][14]= 0;
						} 
					}
					elseif ($count == 4)
					{
						$calType = "Y";
						$calDivider = 1;
						if ($X == 1)
						{
							$fund[$counter][14]= $X;
						}
						else
						{
							$fund[$counter][14]= 0;
						} 
					}

					//Populate Age Column
					$fund[$counter][3]=$tmpAge + $fund[$counter][1] - 1;

					//Populate Adjusted Age Column
					$fund[$counter][4]=$fund[$counter][3] + $mortCharge;

					//Populate Premium Column
					if ($fund[$counter][14] != 0)
					{
						$fund[$counter][5] = $tmpAnualPremium / $calDivider;
					}
					else
					{
						$fund[$counter][5] = 0;
					}

					//Populate Allocation Percentage Column
					switch ($I)
					{
					case 1:
					{
						$fund[$counter][6] = 0.20;
						break;
					}
					case 2:
					{
						$fund[$counter][6] = ($tmpTerm <= 14 ? 0.55 : 0.40); 
						break;
					}
					default:
						$fund[$counter][6] = 0.98;
					}						

					//Populate Allocated Premium Column
					if ($fund[$counter][14] != 0)
					{
						$fund[$counter][7] = $fund[$counter][5] * $fund[$counter][6];
					}
					else
					{
						$fund[$counter][7] = 0;
                    }
                    
                    if ($fund[$counter][14] != 0)
					{
                        $fund[$counter][4] = (pow(1.05,$fund[$counter][1]-1) * 300 / $calDivider);
					}
					else
					{
						$fund[$counter][4] = 0;
                    }

					//Set StartFund to Zero
					if ($counter == 1)
					{
						$fund[$counter][8] = 0;
					}

					//Populate Sum Assured Column
					$fund[$counter][12] = $tmpSumAssured;

					//Populate Sum At Risk Column
					if (($fund[$counter][12] - $fund[$counter][8]) <= 0 )
					{
						$fund[$counter][13] = 0;
					}
					else
					{
                        //$fund[$counter][13] = $fund[$counter][12] - $fund[$counter][8];
                        $fund[$counter][13] = $fund[$counter][12] + self::excel_npv($tabarru_discount_rate_monthly,$fund[$counter][5],($tmpTerm*12 - ($counter+1)));
					}
	
                    //Populate Cost Of Cover Column
                    if ($fund[$counter][14] != 0)
					{
                        $tmpAgeIndex = $fund[$counter][3] + $fund[$counter][1]-1;
                        $fund[$counter][9] = ( $tmpAgeIndex>70?0:$rateMortality[$tmpAgeIndex]) / 1000 * (1/$calDivider) * $fund[$counter][13];
					}
					else
					{
						$fund[$counter][9] = 0;
                    }
					//$fund[$counter][9] = $fund[$counter][4];//( $rateMortality[$fund[$counter][3] + $fund[$counter][1]-1]) / 1000 * (1/$calDivider) * $fund[$counter][13];
                    
					//Populate Income Column
					//$fund[$counter][10] = ( $fund[$counter][7] + $fund[$counter][8] - $fund[$counter][9] )*((1+( ($tmpDRate/100) - ($fundMGT/100) ))^(1/12)-1);

                    
                    //---$fund[$counter][10] = ( $fund[$counter][7] + $fund[$counter][8] - $fund[$counter][9] - $fund[$counter][4] )*(pow((1+( ($tmpDRate/100) - ($fundMGT/100) )),(1/12))-1);

					//Populate End Fund Column
					//----$fund[$counter][11] = $fund[$counter][7] + $fund[$counter][8] - $fund[$counter][9] + $fund[$counter][10];

                    $fund[$counter][11] = ( $fund[$counter][8] + $fund[$counter][7] - $fund[$counter][4] - $fund[$counter][9] ) * (pow(1+(($tmpDRate/100)),(1/12)));
                    //$fund[$counter][15] = ($fund[$counter][8] + $fund[$counter][7] - $fund[$counter][4] - $fund[$counter][9] );
                    //$fund[$counter][16] = (pow(1+(($tmpDRate/100)),(1/12)));
                    //Populate Start Fund Column
					if (($counter + 1) <= ($tmpTerm * 12))
					{
						$fund[$counter+1][8] = $fund[$counter][11];
                    }
                    $allocatedInvestment += $fund[$counter][7];
                    $allocatedPremium += $fund[$counter][5];
                }
                
                $funds[$count][$I] = [$I,$allocatedPremium,$allocatedInvestment, $fund[$counter][11],$fund[$counter][13] + $fund[$counter][11] ];
                $allocatedInvestment = 0;
                
			}
            //$funds[$count] = $fund;
		}
		return $funds;
	}
    /*
    D = (1+ Dividend Rate) ^ (1/365) -1
    F = (1+ Fund management fee %)^( 1/365) -1
    fund_value =  fund[counter][8] * (1 - F) * (1 + D) + Allocated premium % - Fixed expenses(Admin charges) - Mortality charge 
    */


    public static function calculate_funds_($bsa,$basic_monthly_premium,$term,$paying_term,$dob,$d_rate){
        $ANNUAL_FUND_MANAGEMENT_FEE= 0.008;
        $funds  = [];
        $fund   = [];
        $rate_fixed_expenses = self::get_fixed_expenses();
        $rate_mortality = self::get_mortality_charge();
        
        $daily_divident_rate =        round(pow((1+$d_rate/100),(1/365))-1,6);
        $daily_fund_management_rate = round(pow((1+$ANNUAL_FUND_MANAGEMENT_FEE),(1/365))-1,6);
        
        for($C=1;$C<=4;$C++){
            $fund = [];
            $start_date = new DateTime();
            $end_date = new DateTime();
            $end_date->add(new DateInterval('P'.$term.'Y'));
    
            $day_counter=1;
            $frequency_factor = 1;
            $next_installement_date = new DateTime();
            $next_month = new DateTime();
            
            $next_year = new DateTime();
            

            $cummulative_month_counter =1;
            $month_counter = 1;
            $year_counter = 1;
            
            $started_year = $start_date->format('Y');

            $loyality_divident = 0;

            $fund[$day_counter][1] = 0; //Month
            $fund[$day_counter][2] = 0; //Age
            $fund[$day_counter][3] = 0; //Policy Year
            $fund[$day_counter][4] = 0; // Opening fund
            $fund[$day_counter][5] = 0; // Allocation premium
            $fund[$day_counter][6] = 0; // Fixed expenses
            $fund[$day_counter][7] = 0; //Sum at risk
            $fund[$day_counter][8] = 0; // Mortality charge
            $fund[$day_counter][9] = 0; //Closing fund
            
            //$policy_year = 1;
    
            if($C==1){
                //Monthly
                $frequency_factor = 1;
            }elseif($C==2){
                //Quartaly
                $frequency_factor = 3;
            }elseif($C==3){
                //Half Yearly
                $frequency_factor = 6;
            }elseif($C==4){
                //Yearly
                $frequency_factor = 12;
            }elseif($C==5){
                //Yearly
                $frequency_factor = 0;
            }

            $installment_amount = $basic_monthly_premium * $frequency_factor;
    
            //Loop date period (increment=> day) 
            while($start_date < $end_date){

                //current age
                $dt_dob = new DateTime($dob);
                $age = floor($start_date->diff($dt_dob)->format('%a')/365.25);

                $fund[$day_counter][5] = 0; // Allocation premium
                $fund[$day_counter][6] = 0; // Fixed expenses
                $fund[$day_counter][8] = 0; // Mortality charge
                $fund[$day_counter][7] = 0;

                $fund[$day_counter][0] = $start_date->format('Y-m-d');
                $fund[$day_counter][1] = $month_counter;
                $fund[$day_counter][2] = $age;
                

                $loyality_divident = 0;

                if($start_date->format('Y-m-d') == $next_year->format('Y-m-d')){ //Every next year
                    if($day_counter > 1){
                        $next_year->add(new DateInterval('P1Y'));
                        //Loyality divident (every 10th anivasary basic monthly premium*12)
                       
                        if( ($year_counter % 10 == 0)  && ($paying_term >= 15) && ($year_counter <= $paying_term) ){
                            $loyality_divident = $basic_monthly_premium * 12;
                        }
                        $funds[$C][$year_counter + 1 ] = [$year_counter, $age +1 ,$fund[$day_counter-1][9],$fund[$day_counter-1][9]*self::get_surrendar_rate($paying_term,$year_counter)];
                        $year_counter++;
                    }
                }
                $fund[$day_counter][3] = $year_counter;

                $allocation_rate = 0;
                if($year_counter <= $paying_term){
                    $allocation_rate = self::get_allocation_rate($paying_term,$year_counter);
                }

                if($day_counter == 1){
                    $next_installement_date->add(new DateInterval('P'.$frequency_factor.'M'));
                    $next_month->add(new DateInterval('P1M'));
                    $next_year->add(new DateInterval('P1Y'));
                    

                    $fund[$day_counter][4] = 0; //Opening balance
                    $fund[$day_counter][5] = ($allocation_rate == 0?0:(self::round_up($installment_amount - ($installment_amount * $allocation_rate),2)));
                    $fund[$day_counter][7] = $bsa;

                }else if($start_date->format('Y-m-d') == $next_installement_date->format('Y-m-d')){ // policy installment date

                    $next_installement_date->add(new DateInterval('P'.$frequency_factor.'M'));
                    $fund[$day_counter][5] = ($allocation_rate == 0?0:(self::round_up($installment_amount - ($installment_amount * $allocation_rate),2)));
                   
                }

                if($start_date->format('Y-m-d') == $next_month->format('Y-m-d')){ //Every next month ( accumlative month)
                    $next_month->add(new DateInterval('P1M'));
                }

                if($start_date->format('t') == $start_date->format('d')){
                    
                    $fund[$day_counter][7] = MAX(round($bsa - $fund[$day_counter][4],2),0);
                    $fund[$day_counter][6] = $rate_fixed_expenses[$cummulative_month_counter][$paying_term];
                    if($cummulative_month_counter == 1)
                        $fund[$day_counter][8] = self::round_up($bsa * $rate_mortality[$age],2) ;//mortality charge
                    else
                        $fund[$day_counter][8] = self::round_up($fund[$day_counter][7] * $rate_mortality[$age],2) ;//mortality charge

                    
                    $cummulative_month_counter++;
                    $month_counter++;
                    if($month_counter>12){
                        $month_counter =1;
                    }
                        
                }

                $daily_income = ($fund[$day_counter][4] * (1-$daily_fund_management_rate) * (1+$daily_divident_rate)) ;
                $fund[$day_counter][9] =  ROUND($daily_income + $loyality_divident + $fund[$day_counter][5]  - $fund[$day_counter][6]  - $fund[$day_counter][8],6);//End fund
                
                $fund[$day_counter + 1][4] = $fund[$day_counter][9];
                $fund[$day_counter][10] = $daily_income;


                $start_date->add(new DateInterval('P1D'));
                $day_counter++;
                //End day by day loop
               
            }
            $funds[$C][count($funds[$C])+1][2] = $fund[count($fund)][4];
            
            /*
            if($C==4){
             echo "<table width='50%' border=1>";
              foreach($fund as $i){
                  
                  if(isset($i[0]))
                       echo "<tr><td>$i[0]</td><td>$i[3]</td><td>$i[1]</td><td>$i[5]</td><td>$i[2]</td><td>$i[4]</td><td>$i[7]</td><td>$i[8]</td><td>$i[9]</td><td>$i[7]</td><td>$i[6]</td></tr>";
                    
                    //echo $i[4]."<br>";
               }
            echo "<table>";exit;
            } 
            */
            
            //echo "<pre>";
            //if($C==2)
            //  {print_r($fund);exit;}
        }
        return $funds;
    
    }
    
    public static function get_fund_index_by_frequency($frequency_char){
        $index = 0;
        switch ($frequency_char) {
            case 'M':
                $index = 1;
                break;
            case 'Q':
                $index = 2;
                break;
            case 'H':
                $index = 3;
                break;
            case 'Y':
                $index = 4;
                break;
            default:
            $index = 4;
        }
        return $index;
    }
    
    //Allocation rate change update for 01/01/2020
    public static function get_allocation_rate($paying_term,$policy_year,$is_single_prem=false){
        if($is_single_prem){
            return ($policy_year<2?(15/100):1);
            
        }else{

            if($paying_term < 10){
                if($policy_year < 2){
                    return 42.5/100;
                }else if($policy_year < 3){
                    return 17.5/100;
                }else if($policy_year < 4){
                    return 12.5/100;
                }else if($policy_year < 5){
                    return 7.5/100;
                }else if($policy_year < 11){
                    return 5/100;
                }else{
                    return 2/100;
                }
            }else if($paying_term < 15){
                if($policy_year < 2){
                    return 55/100;
                }else if($policy_year < 3){
                    return 25/100;
                }else if($policy_year < 4){
                    return 15/100;
                }else if($policy_year < 5){
                    return 10/100;
                }else if($policy_year < 12){
                    return 5/100;
                }else{
                    return 2/100;
                }
            }else{
                if($policy_year < 2){
                    return 70/100;
                }else if($policy_year < 3){
                    return 40/100;
                }else if($policy_year < 4){
                    return 20/100;
                }else if($policy_year < 11){
                    return 5/100;
                }else{
                    return 2/100;
                }
            }

        }
        return 0;

    }
    
    /*
    public static function get_allocation_rate($paying_term,$policy_year,$is_single_prem=false){
        if($is_single_prem){
            return ($policy_year<2?(15/100):1);
            
        }else{

            if($paying_term < 10){
                if($policy_year < 2){
                    return 37.5/100;
                }else if($policy_year < 11){
                    return 5/100;
                }else{
                    return 2/100;
                }
            }else if($paying_term < 15){
                if($policy_year < 2){
                    return 50/100;
                }else if($policy_year < 3){
                    return 15/100;
                }else if($policy_year < 11){
                    return 5/100;
                }else{
                    return 2/100;
                }
            }else{
                if($policy_year < 2){
                    return 70/100;
                }else if($policy_year < 3){
                    return 40/100;
                }else if($policy_year < 4){
                    return 20/100;
                }else if($policy_year < 11){
                    return 5/100;
                }else{
                    return 2/100;
                }
            }

        }
        return 0;

    }
  
    
    public static function get_fixed_expenses($is_single_prem=false){
        if($is_single_prem){
            $res = DB::table('tbl_rate_fund_fixed_expense')
                        ->get();
            $return = [];
            foreach($res as $item){
                $return[$item->pol_month] = $item->single_prem;
                
            }
            return ($return);

        }else{

            $res = DB::table('tbl_rate_fund_fixed_expense')
                        ->get();
            $return = [];
            foreach($res as $item){
                for($i=5; $i<=40 ;$i++){
                    $col='term_'.$i;
                    $return[$item->pol_month][$i] = $item->$col;
                }
                
            }
            return ($return);

        }
    }
    */
    public static function get_mortality_charge(){
        $qrates = DB::table('tbl_qrate')
                    ->get();
        $return = [];
        foreach($qrates as $qrate){
            $return[$qrate->age] = $qrate->qrate;
        }
        return ($return);
    }
    
    /*
    public static function get_surrendar_rate($paying_term,$policy_year,$is_single_prem=false){
        if($is_single_prem){
            if($policy_year < 2){
                return 0;
            }else if($policy_year < 3){
                return 50/100;
            }else if($policy_year < 4){
                return 60/100;
            }else{
                return 90/100;
            }
        }else{

            if($paying_term < 10){
                if($policy_year < 4){
                    return 0;
                }else if($policy_year < 5){
                    return 55/100;
                }else if($policy_year < 6){
                    return 60/100;
                }else if($policy_year < 7){
                    return 65/100;
                }else if($policy_year < 8){
                    return 70/100;
                }else if($policy_year < 9){
                    return 75/100;
                }else if($policy_year < 10){
                    return 80/100;
                }else if($policy_year < 11){
                    return 85/100;
                }else{
                    return 90/100;
                }
            }else if($paying_term < 15){
                if($policy_year < 4){
                    return 0;
                }else if($policy_year < 5){
                    return 55/100;
                }else if($policy_year < 6){
                    return 60/100;
                }else if($policy_year < 7){
                    return 65/100;
                }else if($policy_year < 8){
                    return 70/100;
                }else if($policy_year < 9){
                    return 75/100;
                }else if($policy_year < 10){
                    return 80/100;
                }else if($policy_year < 11){
                    return 85/100;
                }else{
                    return 90/100;
                }
            }else{
                if($policy_year < 4){
                    return 0;
                }else if($policy_year < 5){
                    return 55/100;
                }else if($policy_year < 6){
                    return 60/100;
                }else if($policy_year < 7){
                    return 65/100;
                }else if($policy_year < 8){
                    return 70/100;
                }else if($policy_year < 9){
                    return 75/100;
                }else if($policy_year < 10){
                    return 80/100;
                }else if($policy_year < 11){
                    return 85/100;
                }else{
                    return 90/100;
                }
            }

        }

    }
*/
    
    

}