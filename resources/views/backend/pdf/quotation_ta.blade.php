<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Quotation No: {{ $quotationData['quote_no'] }} - {{ $quotationData['version'] }}</title>
    <style type="text/css">
        .en-lang-text-pdf
        {
            font-family: Helvetica, Arial, sans-serif !important;
        }
        th {
            background-color: #f7f7f7;
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
            text-align: center;
        }

        td {
            padding-left: 5px !important;
            height: 20px;
            padding-right: 5px !important;

        }

        .bordered td {
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
        }

        body {
            font-family: 'lathaunicode', "freesans";
            font-size: 8px !important;
            line-height: 1.5;
            color: #373a3c;
        }

        table {
            border-collapse: collapse;

        }

        .divTableCell,
        .divTableHead {
            padding: 0px !important;
            border: 0px !important;
        }

        /* DivTable.com */
        .divTable {
            display: table;
            width: 100%;
            float: left;
        }

        .divTableRow {
            display: table-row;
        }

        .divTableHeading {
            background-color: #eee;
            display: table-header-group;
        }

        .divTableCell,
        .divTableHead {
            /*border: 1px solid #999999;*/
            display: table-cell;
            padding: 2px 0px;
            float: left;
        }

        .heading-border {
            border-bottom: 1px solid #999999;
            border-style: solid;
        }

        .divTableBody {
            display: table-row-group;
        }

        ul {
            list-style-type: none;
        }

        .width-100pc {
            width: 100%;
            padding: 2px;
            margin: 2px;
        }

        .wrapper {
            clear: both;
            margin-top: 0px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .inter_tbl_spacing {
            margin-top: 20px;
        }

        .inter_tbl_spacing_il {
            margin-top: 5px;
        }

        .medical_table {
            font-size: 10px !important;
            font-family: 'lathaunicode', "freesans";
            line-height: 1.5;
            color: #373a3c;
        }

        .tbl_illustration {
            font-size: 7px !important;
        }

        .medium_fontsize {
            font-size: 14px !important;
        }

        .large_fontsize {
            font-size: 16px !important;
        }
        /** Medical Report Table  */
        .column {
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

    </style>
</head>
<?php $prem_data = unserialize($quotationData['res_obj']);
/** Common language variables Not Selected Message */
$not_selected = __('quo_pdf.backend.common_messages.not_selected');

?>
<?php
$fund_index = 1;
if ($quotationData['frequency'] == 'M') {
    $fund_index = 1;
} else if ($quotationData['frequency'] == 'Q') {
    $fund_index = 2;
} else if ($quotationData['frequency'] == 'H') {
    $fund_index = 3;
} else if ($quotationData['frequency'] == 'Y') {
    $fund_index = 4;
} else if ($quotationData['frequency'] == 'S') {
    $fund_index = 1;
}
?>
<?php $med_rem3_floater = $quotationData['med_rem3_floater'];  ?>
<?php
$maturity_fund_values = $prem_data['maturity_fund_values'];
?>

<?php
$last_year_rider_total_mode_premium = 0;
$last_fund_value_index = $quotationData['premium_term'];

$total_rider_prem = 0;

if ($prem_data['summary']['frequency'] != 'S') {
    //Main life rider totalup
    foreach ($prem_data['member_main'] as $rider) {
        if ($rider['rider_code'] != 'STD-COVER') {
            if ($rider['term'] >= $maturity_fund_values['low'][$fund_index][$last_fund_value_index][0]) {
                $total_rider_prem += $rider['total_premium'];
            }
        }
    }
    //Spouse life rider totalup
    foreach ($prem_data['member_spouse'] as $rider) {
        if ($rider['term'] >= $maturity_fund_values['low'][$fund_index][$last_fund_value_index][0]) {
            $total_rider_prem += $rider['total_premium'];
        }
    }

    //Children rider totalup
    foreach ($prem_data['member_child'] as $child) {
        foreach ($child as $rider) {
            if ($rider['term'] >= $maturity_fund_values['low'][$fund_index][$last_fund_value_index][0]) {
                $total_rider_prem += $rider['total_premium'];
            }
        }
    }
    $last_year_rider_total_mode_premium = $total_rider_prem * $prem_data['member_main'][0]['mode_factor'] / 12;
}

?>
<body>
<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="width-100pc">
                        <tr>
                            <td width="40%" class="en-lang-text-pdf">
                                <img src="{{public_path('img/backend/brand/logo.png')}}"
                                     style="height: 150px;">
                            </td>
                            <td width="60%" class="en-lang-text-pdf">
                                <b class="header-cols-big large_fontsize">{{ __('quo_pdf.backend.cmp_name') }}</b>
                                <br>
                                <b class="header-cols-sm">{{ __('quo_pdf.backend.cmp_adr1') }}</b>
                                <br> <span class="header-cols-sm">{{ __('quo_pdf.backend.cmp_adr2') }},</span>
                                <br> <span class="header-cols-sm">Tel : 0114793700 / Hot Line : 011-4384384 / Fax : 0114713800</span>

                            </td>
                            <td>
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="wrapper text-center" style="margin-bottom: 10px;">
    <table style="width:100%">
        <tr>
            <td width="70%"><h2><span class="en-lang-text-pdf">{{ __('quo_pdf.backend.title_main_hnb') }}</span> {{ __('quo_pdf.backend.title_main') }} <p class="en-lang-text-pdf">(PrivilegedLife)</p> {{ __('quo_pdf.backend.title_main_1') }}</h2></td>
            <td width="30%" class="text-right"><strong class="en-lang-text-pdf">Quotation No: {{ $quotationData['quote_no'] }}
                    - {{ $quotationData['version'] }} </strong></td>
        </tr>
    </table>
</div>

<?php if (($prem_data['summary']['frequency'] == 'S') && ($prem_data['summary']['monthly_basic_premium'] > $maturity_fund_values['low'][$fund_index][$prem_data['summary']['policy_term'] + 1][2])) {
    ?>
<div class="wrapper text-center">
    <table style="width:100%">
        <tr>
            <td width="50%"><h3 class="en-lang-text-pdf"> Invalid Quotation - Return maturity value is lesser than investment value </h3></td>
        </tr>
    </table>
</div>

<?php
} else if (($prem_data['summary']['frequency'] != 'S') && (($prem_data['summary']['monthly_basic_premium'] * 12 * $quotationData['premium_term']) > $maturity_fund_values['low'][$fund_index][$prem_data['summary']['policy_term'] + 1][2])) {
    ?>
<div class="wrapper text-center">
    <table style="width:100%">
        <tr>
            <td width="100%"><h1 style="font-size:15px; !important"> Invalid Quotation - Return maturity value
                    [ {{ number_format($maturity_fund_values['low'][$fund_index][$prem_data['summary']['policy_term'] +1][2]) }}
                    ] is lesser than investment value
                    [ {{ number_format($prem_data['summary']['monthly_basic_premium'] * 12 * $quotationData['premium_term'])}}
                    ] </h1></td>
        </tr>
    </table>
</div>
<?php
} else {
    ?>

<div class="wrapper">
    <div class="divTable">

        <div class="divTableCell" style="width: 60%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="2">{{ __('quo_pdf.backend.tb1_head_title') }}</th>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb1.name') }}
                    </td>
                    <td class="text-center en-lang-text-pdf" width="50%">
                        {{ $quotationData['title'] }} {{ $quotationData['first_name'] }} {{ $quotationData['last_name'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb1.dob') }}
                    </td>
                    <td class="text-center">
                        {{ $quotationData['dob'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb1.age_l') }}
                    </td>
                    <td class="text-center">
                        {{ $prem_data['age_main'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb1.age_m') }}
                    </td>
                    <td class="text-center">
                        {{$prem_data['age_main'] + $prem_data['summary']['policy_term'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb1.occupation') }}
                    </td>
                    <td class="text-center en-lang-text-pdf">
                        {{ $prem_data['occ_name_main'] }}
                    </td>
                </tr>
            </table>
        </div>

        <?php if ($prem_data['summary']['frequency'] != 'S') {?>
        <div class="divTableCell" style="width: 40%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="2">{{ __('quo_pdf.backend.tb2_head_title') }}</th>
                </tr>
                <tr>
                    <td>
                    {{ __('quo_pdf.backend.tb2.age_spouse') }}
                    </td>
                    <td class="text-center" width="50%">
                        {{ ($prem_data['age_spouse']=="0"?$not_selected:$prem_data['age_spouse'])  }}
                    </td>
                </tr>
                <tr>
                    <td>
                    {{ __('quo_pdf.backend.tb2.age_child1') }}
                    </td>
                    <td class="text-center">
                        <?php
if ((int) $quotationData['ch1_age'] > 0) {
        echo (int) $quotationData['ch1_age'];
    } else {
        echo $not_selected;
    }
        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    {{ __('quo_pdf.backend.tb2.age_child2') }}
                    </td>
                    <td class="text-center">
                        <?php
if ((int) $quotationData['ch2_age'] > 0) {
            echo (int) $quotationData['ch2_age'];
        } else {
            echo $not_selected;
        }
        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    {{ __('quo_pdf.backend.tb2.age_child3') }}
                    </td>
                    <td class="text-center">
                        <?php
if ((int) $quotationData['ch3_age'] > 0) {
            echo (int) $quotationData['ch3_age'];
        } else {
            echo $not_selected;
        }
        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    {{ __('quo_pdf.backend.tb2.age_child4') }}
                    </td>
                    <td class="text-center">
                        <?php
if ((int) $quotationData['ch4_age'] > 0) {
            echo (int) $quotationData['ch4_age'];
        } else {
            echo $not_selected;
        }
        ?>
                    </td>
                </tr>
            </table>
        </div>
        <?php
}
    ?>
    </div>
</div>

<div class="wrapper" style="margin-bottom: 18px;">
    <div class="divTable">
        <div class="divTableCell" style="width: 60%">
            <table class="bordered width-100pc inter_tbl_spacing">
                <tr>
                    <th colspan="2">{{ __('quo_pdf.backend.tb3_head_title') }}</th>
                </tr>
                <tr>
                    <?php if (($prem_data['summary']['frequency']) != 'S') {
        ?>
                    <td>
                        {{ __('quo_pdf.backend.mode_prem_list.mode_basic_annual_prem') }}
                    </td>

                    <?php
} else {
        ?>
                    <td>
                    {{ __('quo_pdf.backend.mode_prem_list.mode_basic_single_prem') }}
                    </td>
                    <?php
}
    ?>

                    <td class="text-right" width="50%">
                        <?php echo (($prem_data['summary']['frequency']) != 'S' ? number_format($prem_data['member_main'][0]['basic_annual_premium']) : number_format($prem_data['summary']['monthly_basic_premium'])); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb3.sum_asrd_mul') }}
                    </td>
                    <td class="text-right">
                        <?php echo (($prem_data['summary']['frequency']) == 'S' ? 'N/A' : $prem_data['summary']['covermultiple']); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb3.basic_sum_asrd') }}
                    </td>
                    <td class="text-right">
                        <?php echo (($prem_data['summary']['frequency']) == 'S' ? number_format($prem_data['summary']['monthly_basic_premium'] * 110 / 100) : number_format($prem_data['summary']['sum_assured'])); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb3.type_of_policy') }}
                    </td>
                    <td class="text-right">
                    <?php
$insurance_need_list = [
        'Protection' => 'பாதுகாப்பு',
        'Savings' => 'சேமிப்பு',
        'Retirement' => 'பணிஓய்வு',
        'Health' => 'ஆரோக்கியம்',
    ];
    ?>
                    {{ $insurance_need_list[$quotationData['primary_need']] }}

                    </td>
                </tr>

            </table>
        </div>

        <div class="divTableCell" style="width: 40%">
            <table class="bordered width-100pc inter_tbl_spacing">
                <tr>
                    <th colspan="2">{{ __('quo_pdf.backend.tb3_head_title') }}</th>
                </tr>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb3.term_of_policy') }}
                    </td>
                    <td class="text-center">
                        {{ $quotationData['policy_term'] }}
                    </td>
                </tr>
                <?php if ($prem_data['summary']['frequency'] != 'S') {?>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb3.bpremium_paying_trm') }}
                    </td>
                    <td class="text-center">
                        {{ $quotationData['premium_term'] }}
                    </td>
                </tr>
                <?php }?>
                <tr>
                    <td>
                        {{ __('quo_pdf.backend.tb3.mode') }}
                    </td>
                    <td class="text-center">
                        <?php
$str_mode = "Monthly";
    if ($quotationData['frequency'] == 'M') {
        echo __('quo_pdf.backend.mode_list.mode_monthly');
    } else if ($quotationData['frequency'] == 'Q') {
        echo __('quo_pdf.backend.mode_list.mode_quarterly');
        $str_mode = "Quarterly";
    } else if ($quotationData['frequency'] == 'H') {
        echo __('quo_pdf.backend.mode_list.mode_half_yearly');
        $str_mode = "Half Yearly";
    } else if ($quotationData['frequency'] == 'Y') {
        echo __('quo_pdf.backend.mode_list.mode_yearly');
        $str_mode = "Yearly";
    } else {
        echo __('quo_pdf.backend.mode_list.mode_single_prem');
        $str_mode = "Single Premium";
    }

    ?>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</div>
<?php
$AD_LIFE_SA = 'N/A';
    $ACC_DTH_SA = 'N/A';

    $SP_AD_LIFE_SA = 'N/A';
    $SP_ACC_DTH_SA = 'N/A';

    $mode_list = [
        'Monthly' => 'மாதாந்த',
        'Quarterly' => 'காலாண்டு',
        'Half Yearly' => 'அரையாண்டு',
        'Yearly' => 'வருடாந்த',
        'Single Premium' => 'ஒற்றை',
    ];

    ?>
<?php if ($prem_data['summary']['frequency'] != 'S') {?>
<div class="wrapper" style="margin-bottom: 18px;">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <?php
$RESTRICTED = '**'; // Restricted rider indicator
        $AD_LIFE_SA = 'N/A';
        $AD_LIFE_PRE = 'N/A';
        $AD_LIFE_OE = '';
        
        $SP_AD_LIFE_PRE = 'N/A';
        $SP_AD_LIFE_OE = '';

        $ACC_DTH_SA = 'N/A';
        $ACC_DTH_PRE = 'N/A';
        $ACC_DTH_OE = '';
       
        $SP_ACC_DTH_PRE = 'N/A';
        $SP_ACC_DTH_OE = '';

        $TPD_SA = 'N/A';
        $TPD_PRE = 'N/A';
        $TPD_OPT = '';
        $TPD_OE = '';
        $SP_TPD_SA = 'N/A';
        $SP_TPD_PRE = 'N/A';
        $SP_TPD_OE = '';

        $PPD_SA = 'N/A';
        $PPD_PRE = 'N/A';
        $PPD_OE = '';
        $SP_PPD_SA = 'N/A';
        $SP_PPD_PRE = 'N/A';
        $SP_PPD_OE = '';

        $CRIT_IL_29_SA = 'N/A';
        $CRIT_IL_29_PRE = 'N/A';
        $CRIT_IL_29_OE = '';
        $SP_CRIT_IL_29_SA = 'N/A';
        $SP_CRIT_IL_29_PRE = 'N/A';
        $SP_CRIT_IL_29_OE = '';

        $HOS_BEN_SA = 'N/A';
        $HOS_BEN_PRE = 'N/A';
        $HOS_BEN_OE = '';
        $SP_HOS_BEN_SA = 'N/A';
        $SP_HOS_BEN_PRE = 'N/A';
        $SP_HOS_BEN_OE = '';

        $SUR_BEN_SA = 'N/A';
        $SUR_BEN_PRE = 'N/A';
        $SUR_BEN_OE = '';
        $SP_SUR_BEN_SA = 'N/A';
        $SP_SUR_BEN_PRE = 'N/A';
        $SP_SUR_BEN_OE = '';

        $MED_REM3_SA = 'N/A';
        $MED_REM3_PRE = 'N/A';
        $MED_REM3_OE = '';
        $MED_REM3_COUNTRIES = 'N/A';
        $MED_REM3_FLOATER = '';
        $SP_MED_REM3_SA = 'N/A';
        $SP_MED_REM3_PRE = 'N/A';
        $SP_MED_REM3_OE = '';

        $MIB_2_SA = 'N/A';
        $MIB_2_PRE = 'N/A';
        $MIB_2_OPT = '';

        $SP_MIB_2_SA = 'N/A';
        $SP_MIB_2_PRE = 'N/A';

        $CANCER_SA = 'N/A';
        $CANCER_PRE = 'N/A';
        $CANCER_OE = '';
        $SP_CANCER_SA = 'N/A';
        $SP_CANCER_PRE = 'N/A';
        $SP_CANCER_OE = '';

        $WOP_DTH_B_SA = 'N/A';
        $WOP_DTH_B_PRE = 'N/A';

        $WOP_DTH_R_SA = 'N/A';
        $WOP_DTH_R_PRE = 'N/A';

        $WOP_TPD_B_SA = 'N/A';
        $WOP_TPD_B_PRE = 'N/A';

        $WOP_TPD_R_SA = 'N/A';
        $WOP_TPD_R_PRE = 'N/A';

        $CH_ARRAY['CH1_CRIT_IL_29_SA'] = 'N/A';
        $CH_ARRAY['CH1_CRIT_IL_29_PRE'] = 'N/A';
        $CH_ARRAY['CH2_CRIT_IL_29_SA'] = 'N/A';
        $CH_ARRAY['CH2_CRIT_IL_29_PRE'] = 'N/A';
        $CH_ARRAY['CH3_CRIT_IL_29_SA'] = 'N/A';
        $CH_ARRAY['CH3_CRIT_IL_29_PRE'] = 'N/A';
        $CH_ARRAY['CH4_CRIT_IL_29_SA'] = 'N/A';
        $CH_ARRAY['CH4_CRIT_IL_29_PRE'] = 'N/A';

        $CH_ARRAY['CH1_HOS_BEN_SA'] = 'N/A';
        $CH_ARRAY['CH1_HOS_BEN_PRE'] = 'N/A';
        $CH_ARRAY['CH2_HOS_BEN_SA'] = 'N/A';
        $CH_ARRAY['CH2_HOS_BEN_PRE'] = 'N/A';
        $CH_ARRAY['CH3_HOS_BEN_SA'] = 'N/A';
        $CH_ARRAY['CH3_HOS_BEN_PRE'] = 'N/A';
        $CH_ARRAY['CH4_HOS_BEN_SA'] = 'N/A';
        $CH_ARRAY['CH4_HOS_BEN_PRE'] = 'N/A';

        $CH_ARRAY['CH1_SUR_BEN_SA'] = 'N/A';
        $CH_ARRAY['CH1_SUR_BEN_PRE'] = 'N/A';
        $CH_ARRAY['CH2_SUR_BEN_SA'] = 'N/A';
        $CH_ARRAY['CH2_SUR_BEN_PRE'] = 'N/A';
        $CH_ARRAY['CH3_SUR_BEN_SA'] = 'N/A';
        $CH_ARRAY['CH3_SUR_BEN_PRE'] = 'N/A';
        $CH_ARRAY['CH4_SUR_BEN_SA'] = 'N/A';
        $CH_ARRAY['CH4_SUR_BEN_PRE'] = 'N/A';

        $CH_ARRAY['CH1_MED_REM3_SA'] = 'N/A';
        $CH_ARRAY['CH1_MED_REM3_PRE'] = 'N/A';
        $CH_ARRAY['CH2_MED_REM3_SA'] = 'N/A';
        $CH_ARRAY['CH2_MED_REM3_PRE'] = 'N/A';
        $CH_ARRAY['CH3_MED_REM3_SA'] = 'N/A';
        $CH_ARRAY['CH3_MED_REM3_PRE'] = 'N/A';
        $CH_ARRAY['CH4_MED_REM3_SA'] = 'N/A';
        $CH_ARRAY['CH4_MED_REM3_PRE'] = 'N/A';

        $rider_prem_total = 0;
        foreach ($prem_data['member_main'] as $rider) {
            if ($rider['rider_code'] == 'AD-LIFE') {
                $AD_LIFE_SA = $rider['sum_assured'];
                $AD_LIFE_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $AD_LIFE_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'ACC-DTH') {
                $ACC_DTH_SA = $rider['sum_assured'];
                $ACC_DTH_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $ACC_DTH_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'TPD') {
                $TPD_SA = $rider['sum_assured'];
                $TPD_PRE = $rider['total_premium'];
                $TPD_OPT = ($rider['option'] == '1' ? '(விபத்து மற்றும் சுகயீனம்)' : '(விபத்து மாத்திரம்)');
                $rider_prem_total += $rider['total_premium'];
                $TPD_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'PPD') {
                $PPD_SA = $rider['sum_assured'];
                $PPD_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $PPD_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'CRIT-IL-29') {
                $CRIT_IL_29_SA = $rider['sum_assured'];
                $CRIT_IL_29_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $CRIT_IL_29_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'HOS-BEN') {
                $HOS_BEN_SA = $rider['sum_assured'];
                $HOS_BEN_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $HOS_BEN_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'SUR-BEN') {
                $SUR_BEN_SA = $rider['sum_assured'];
                $SUR_BEN_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SUR_BEN_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'MED-REM3') {
                $MED_REM3_SA = $rider['sum_assured'];
                $MED_REM3_PRE = $rider['total_premium'];
                $MED_REM3_COUNTRIES = $rider['countries'];
                $rider_prem_total += $rider['total_premium'];
                $MED_REM3_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');
                if($med_rem3_floater == "Yes"){
                    $MED_REM3_FLOATER = "<br>Family Floater";
                }

            } else if ($rider['rider_code'] == 'MIB-2') {
                $MIB_2_SA = $rider['sum_assured'];
                $MIB_2_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $MIB_2_OPT = ($rider['option'] == '1' ? '(இறப்பு)' : '(இறப்பு மற்றும் முழுமையான நிரந்தர இயலாமை)');
            } else if ($rider['rider_code'] == 'CANCER') {
                $CANCER_SA = $rider['sum_assured'];
                $CANCER_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $CANCER_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'WOP-DTH-B') {
                $WOP_DTH_B_SA = $rider['sum_assured'];
                $WOP_DTH_B_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];

            } else if ($rider['rider_code'] == 'WOP-DTH-R') {
                $WOP_DTH_R_SA = $rider['sum_assured'];
                $WOP_DTH_R_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];

            } else if ($rider['rider_code'] == 'WOP-TPD-B') {
                $WOP_TPD_B_SA = $rider['sum_assured'];
                $WOP_TPD_B_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];

            } else if ($rider['rider_code'] == 'WOP-TPD-R') {
                $WOP_TPD_R_SA = $rider['sum_assured'];
                $WOP_TPD_R_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];

            }

        }

        foreach ($prem_data['member_spouse'] as $rider) {
            if ($rider['rider_code'] == 'AD-LIFE') {
                $SP_AD_LIFE_SA = $rider['sum_assured'];
                $SP_AD_LIFE_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_AD_LIFE_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'ACC-DTH') {
                $SP_ACC_DTH_SA = $rider['sum_assured'];
                $SP_ACC_DTH_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_ACC_DTH_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'TPD') {
                $SP_TPD_SA = $rider['sum_assured'];
                $SP_TPD_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_TPD_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'PPD') {
                $SP_PPD_SA = $rider['sum_assured'];
                $SP_PPD_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_PPD_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'CRIT-IL-29') {
                $SP_CRIT_IL_29_SA = $rider['sum_assured'];
                $SP_CRIT_IL_29_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_CRIT_IL_29_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'HOS-BEN') {
                $SP_HOS_BEN_SA = $rider['sum_assured'];
                $SP_HOS_BEN_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_HOS_BEN_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'SUR-BEN') {
                $SP_SUR_BEN_SA = $rider['sum_assured'];
                $SP_SUR_BEN_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_SUR_BEN_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'MED-REM3') {
                $SP_MED_REM3_SA = $rider['sum_assured'];
                $SP_MED_REM3_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_MED_REM3_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            } else if ($rider['rider_code'] == 'MIB-2') {
                $SP_MIB_2_SA = $rider['sum_assured'];
                $SP_MIB_2_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];

            } else if ($rider['rider_code'] == 'CANCER') {
                $SP_CANCER_SA = $rider['sum_assured'];
                $SP_CANCER_PRE = $rider['total_premium'];
                $rider_prem_total += $rider['total_premium'];
                $SP_CANCER_OE = ($rider['oe'] == -0.02 ? $RESTRICTED : '');

            }
        }

        //Child riders

        for ($i = 0; $i < count($prem_data['member_child']); $i++) {
            foreach ($prem_data['member_child'][$i] as $child) {
                if ($child['rider_code'] == 'HOS-BEN') {
                    $CH_ARRAY['CH' . ($i + 1) . '_HOS_BEN_SA'] = $child['sum_assured'];
                    $CH_ARRAY['CH' . ($i + 1) . '_HOS_BEN_PRE'] = $child['total_premium'];
                    $rider_prem_total += $child['total_premium'];
                } else if ($child['rider_code'] == 'SUR-BEN') {
                    $CH_ARRAY['CH' . ($i + 1) . '_SUR_BEN_SA'] = $child['sum_assured'];
                    $CH_ARRAY['CH' . ($i + 1) . '_SUR_BEN_PRE'] = $child['total_premium'];
                    $rider_prem_total += $child['total_premium'];
                } else if ($child['rider_code'] == 'CRIT-IL-29') {
                    $CH_ARRAY['CH' . ($i + 1) . '_CRIT_IL_29_SA'] = $child['sum_assured'];
                    $CH_ARRAY['CH' . ($i + 1) . '_CRIT_IL_29_PRE'] = $child['total_premium'];
                    $rider_prem_total += $child['total_premium'];
                } else if ($child['rider_code'] == 'MED-REM3') {
                    $CH_ARRAY['CH' . ($i + 1) . '_MED_REM3_SA'] = $child['sum_assured'];
                    $CH_ARRAY['CH' . ($i + 1) . '_MED_REM3_PRE'] = $child['total_premium'];
                    $rider_prem_total += $child['total_premium'];
                }
            }

        }

        ?>
                    <table class="bordered width-100pc">
                        <tr>
                            <th colspan="6">{{ __('quo_pdf.backend.tb4_head_title') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center" rowspan="2" colspan="2">{{ __('quo_pdf.backend.tb4.aditional_rider_bnft') }}</th>
                            <th class="text-center" colspan="2">{{ __('quo_pdf.backend.tb4.life_assured') }}</th>
                            <th class="text-center" colspan="2">{{ __('quo_pdf.backend.tb4.spouse') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">{{ __('quo_pdf.backend.tb4.sum_insured') }} {{ __('quo_pdf.backend.tb4.rs') }}</th>
                            <th class="text-center">{{ __('quo_pdf.backend.tb4.annual_premium') }} {{ __('quo_pdf.backend.tb4.rs') }}</th>
                            <th class="text-center">{{ __('quo_pdf.backend.tb4.sum_insured') }} {{ __('quo_pdf.backend.tb4.rs') }}</th>
                            <th class="text-center">{{ __('quo_pdf.backend.tb4.annual_premium') }} {{ __('quo_pdf.backend.tb4.rs') }}</th>
                        </tr>

                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.additional_life_benifit') }}</td>
                            <td class="text-center en-lang-text-pdf">{{$AD_LIFE_OE}}{{ ($AD_LIFE_SA=="N/A"?$AD_LIFE_SA:number_format($AD_LIFE_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($AD_LIFE_PRE=="N/A"?$AD_LIFE_PRE:number_format($AD_LIFE_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_AD_LIFE_OE}}{{ ($SP_AD_LIFE_SA=="N/A"?$SP_AD_LIFE_SA:number_format($SP_AD_LIFE_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_AD_LIFE_PRE=="N/A"?$SP_AD_LIFE_PRE:number_format($SP_AD_LIFE_PRE)) }}</td>
                        </tr>

                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.accidental_death_benifit') }}</td>
                            <td class="text-center en-lang-text-pdf">{{$ACC_DTH_OE}}{{ ($ACC_DTH_SA=="N/A"?$ACC_DTH_SA:number_format($ACC_DTH_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($ACC_DTH_PRE=="N/A"?$ACC_DTH_PRE:number_format($ACC_DTH_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_ACC_DTH_OE}}{{ ($SP_ACC_DTH_SA=="N/A"?$SP_ACC_DTH_SA:number_format($SP_ACC_DTH_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_ACC_DTH_PRE=="N/A"?$SP_ACC_DTH_PRE:number_format($SP_ACC_DTH_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.tot_permanent_disability_benift') }}</td>
                            <td class="text-center en-lang-text-pdf">{{$TPD_OE}}{{ ($TPD_SA=="N/A"?$TPD_SA:number_format($TPD_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($TPD_PRE=="N/A"?$TPD_PRE:number_format($TPD_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_TPD_OE}}{{ ($SP_TPD_SA=="N/A"?$SP_TPD_SA:number_format($SP_TPD_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_TPD_PRE=="N/A"?$SP_TPD_PRE:number_format($SP_TPD_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.permanent_partial_disability_benifit') }} <?php echo $TPD_OPT; ?></td>
                            <td class="text-center en-lang-text-pdf">{{$PPD_OE}}{{ ($PPD_SA=="N/A"?$PPD_SA:number_format($PPD_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($PPD_PRE=="N/A"?$PPD_PRE:number_format($PPD_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_PPD_OE}}{{ ($SP_PPD_SA=="N/A"?$SP_PPD_SA:number_format($SP_PPD_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_PPD_PRE=="N/A"?$SP_PPD_PRE:number_format($SP_PPD_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td rowspan="2">{{ __('quo_pdf.backend.tb4.rider_main.hospitalization_benifit_180_days') }}</td>
                            <td class="en-lang-text-pdf">Private Hospital</td>
                            <td class="text-center en-lang-text-pdf">{{$HOS_BEN_OE}}{{ ($HOS_BEN_SA=="N/A"?$HOS_BEN_SA:number_format($HOS_BEN_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf" rowspan="2">{{ ($HOS_BEN_PRE=="N/A"?$HOS_BEN_PRE:number_format($HOS_BEN_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_HOS_BEN_OE}}{{ ($SP_HOS_BEN_SA=="N/A"?$SP_HOS_BEN_SA:number_format($SP_HOS_BEN_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf" rowspan="2">{{ ($SP_HOS_BEN_PRE=="N/A"?$SP_HOS_BEN_PRE:number_format($SP_HOS_BEN_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td class="en-lang-text-pdf">Government Hospital</td>
                            <td class="text-center en-lang-text-pdf">{{$HOS_BEN_OE}}{{ ($HOS_BEN_SA=="N/A"?$HOS_BEN_SA:number_format( (($prem_data['summary']['max_hb_sa_for_10_percent'] < $HOS_BEN_SA) ? $prem_data['summary']['max_hb_sa_for_10_percent']:$HOS_BEN_SA ) )) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_HOS_BEN_OE}}{{ ($SP_HOS_BEN_SA=="N/A"?$SP_HOS_BEN_SA:number_format( (($prem_data['summary']['max_hb_sa_for_10_percent'] < $SP_HOS_BEN_SA) ? $prem_data['summary']['max_hb_sa_for_10_percent']:$SP_HOS_BEN_SA ) )) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.critical_illness_benifit') }}</td>
                            <td class="text-center en-lang-text-pdf">{{$CRIT_IL_29_OE}}{{ ($CRIT_IL_29_SA=="N/A"?$CRIT_IL_29_SA:number_format($CRIT_IL_29_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CRIT_IL_29_PRE=="N/A"?$CRIT_IL_29_PRE:number_format($CRIT_IL_29_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_CRIT_IL_29_OE}}{{ ($SP_CRIT_IL_29_SA=="N/A"?$SP_CRIT_IL_29_SA:number_format($SP_CRIT_IL_29_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_CRIT_IL_29_PRE=="N/A"?$SP_CRIT_IL_29_PRE:number_format($SP_CRIT_IL_29_PRE)) }}</td>
                        </tr>

                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.surgery_benifit') }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SUR_BEN_OE}}{{ ($SUR_BEN_SA=="N/A"?$SUR_BEN_SA:number_format($SUR_BEN_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SUR_BEN_PRE=="N/A"?$SUR_BEN_PRE:number_format($SUR_BEN_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_SUR_BEN_OE}}{{ ($SP_SUR_BEN_SA=="N/A"?$SP_SUR_BEN_SA:number_format($SP_SUR_BEN_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_SUR_BEN_PRE=="N/A"?$SP_SUR_BEN_PRE:number_format($SP_SUR_BEN_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.supreme_health_benifit_med_rem') }}<span class="en-lang-text-pdf"><?php echo $MED_REM3_FLOATER; ?></span><br/> {{ __('quo_pdf.backend.tb4.covered_countries') }}
                                : <span class="en-lang-text-pdf">{{ $MED_REM3_COUNTRIES }} </span></td>
                            <td class="text-center en-lang-text-pdf">{{$MED_REM3_OE}}{{ ($MED_REM3_SA=="N/A"?$MED_REM3_SA:number_format($MED_REM3_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($MED_REM3_PRE=="N/A"?$MED_REM3_PRE:number_format($MED_REM3_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_MED_REM3_OE}}{{ ($SP_MED_REM3_SA=="N/A"?$SP_MED_REM3_SA:number_format($SP_MED_REM3_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_MED_REM3_PRE=="N/A"?$SP_MED_REM3_PRE:number_format($SP_MED_REM3_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.family_income_benifit') }} <?php echo $MIB_2_OPT; ?></td>
                            <td class="text-center en-lang-text-pdf">{{ ($MIB_2_SA=="N/A"?$MIB_2_SA:number_format($MIB_2_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($MIB_2_PRE=="N/A"?$MIB_2_PRE:number_format($MIB_2_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_MIB_2_SA=="N/A"?$SP_MIB_2_SA:number_format($SP_MIB_2_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_MIB_2_PRE=="N/A"?$SP_MIB_2_PRE:number_format($SP_MIB_2_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{{ __('quo_pdf.backend.tb4.rider_main.cancer_rider_benifit') }}</td>
                            <td class="text-center en-lang-text-pdf">{{$CANCER_OE}}{{ ($CANCER_SA=="N/A"?$CANCER_SA:number_format($CANCER_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CANCER_PRE=="N/A"?$CANCER_PRE:number_format($CANCER_PRE)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{$SP_CANCER_OE}}{{ ($SP_CANCER_SA=="N/A"?$SP_CANCER_SA:number_format($SP_CANCER_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($SP_CANCER_PRE=="N/A"?$SP_CANCER_PRE:number_format($SP_CANCER_PRE)) }}</td>
                        </tr>
                        <!-- Restriction Wording -->
                        <?php if($CRIT_IL_29_OE == '**' || $HOS_BEN_OE == '**') {?>
                        <tr>
                            <td colspan="6"><?php echo $RESTRICTED ?> {{ __('quo_pdf.backend.tb4.restriction_wording_A') }}<span class="en-lang-text-pdf"><strong>"{{ $prem_data['occ_name_main'] }}"</strong></span> {{ __('quo_pdf.backend.tb4.restriction_wording_B') }} </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th colspan="2" rowspan="2">{{ __('quo_pdf.backend.tb4.aditional_rider_bnft') }} - {{ __('quo_pdf.backend.tb4.childrens') }} {{ __('quo_pdf.backend.tb4.aditional_rider_bnft_for') }}</th>
                            <th class="text-center" rowspan="2"></th>
                            <th colspan="2" class="text-center">{{ __('quo_pdf.backend.tb4.sum_insured') }} {{ __('quo_pdf.backend.tb4.rs') }}</th>
                            <th class="text-center" rowspan="2">{{ __('quo_pdf.backend.tb4.annual_premium') }} {{ __('quo_pdf.backend.tb4.rs') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center en-lang-text-pdf">Private Hospital</th>
                            <th class="text-center en-lang-text-pdf">Government Hospital</th>
                        </tr>

                        <tr>
                            <td colspan="2" rowspan="4">{{ __('quo_pdf.backend.tb4.rider_main.hospitalization_benifit_180_days') }}
                            </td>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child1') }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH1_HOS_BEN_SA']=="N/A"?$CH_ARRAY['CH1_HOS_BEN_SA']:number_format($CH_ARRAY['CH1_HOS_BEN_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH1_HOS_BEN_SA']=="N/A"?$CH_ARRAY['CH1_HOS_BEN_SA']:number_format( (($prem_data['summary']['max_hb_sa_for_10_percent'] < $CH_ARRAY['CH1_HOS_BEN_SA']) ? $prem_data['summary']['max_hb_sa_for_10_percent']:$CH_ARRAY['CH1_HOS_BEN_SA'] ) )) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH1_HOS_BEN_PRE']=="N/A"?$CH_ARRAY['CH1_HOS_BEN_PRE']:number_format($CH_ARRAY['CH1_HOS_BEN_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child2') }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH2_HOS_BEN_SA']=="N/A"?$CH_ARRAY['CH2_HOS_BEN_SA']:number_format($CH_ARRAY['CH2_HOS_BEN_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH2_HOS_BEN_SA']=="N/A"?$CH_ARRAY['CH2_HOS_BEN_SA']:number_format( (($prem_data['summary']['max_hb_sa_for_10_percent'] < $CH_ARRAY['CH2_HOS_BEN_SA']) ? $prem_data['summary']['max_hb_sa_for_10_percent']:$CH_ARRAY['CH2_HOS_BEN_SA'] ) )) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH2_HOS_BEN_PRE']=="N/A"?$CH_ARRAY['CH2_HOS_BEN_PRE']:number_format($CH_ARRAY['CH2_HOS_BEN_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child3') }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH3_HOS_BEN_SA']=="N/A"?$CH_ARRAY['CH3_HOS_BEN_SA']:number_format($CH_ARRAY['CH3_HOS_BEN_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH3_HOS_BEN_SA']=="N/A"?$CH_ARRAY['CH3_HOS_BEN_SA']:number_format( (($prem_data['summary']['max_hb_sa_for_10_percent'] < $CH_ARRAY['CH3_HOS_BEN_SA']) ? $prem_data['summary']['max_hb_sa_for_10_percent']:$CH_ARRAY['CH3_HOS_BEN_SA'] ) )) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH3_HOS_BEN_PRE']=="N/A"?$CH_ARRAY['CH3_HOS_BEN_PRE']:number_format($CH_ARRAY['CH3_HOS_BEN_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child4') }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH4_HOS_BEN_SA']=="N/A"?$CH_ARRAY['CH4_HOS_BEN_SA']:number_format($CH_ARRAY['CH4_HOS_BEN_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH4_HOS_BEN_SA']=="N/A"?$CH_ARRAY['CH4_HOS_BEN_SA']:number_format( (($prem_data['summary']['max_hb_sa_for_10_percent'] < $CH_ARRAY['CH4_HOS_BEN_SA']) ? $prem_data['summary']['max_hb_sa_for_10_percent']:$CH_ARRAY['CH4_HOS_BEN_SA'] ) )) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH4_HOS_BEN_PRE']=="N/A"?$CH_ARRAY['CH4_HOS_BEN_PRE']:number_format($CH_ARRAY['CH4_HOS_BEN_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="4">{{ __('quo_pdf.backend.tb4.rider_main.critical_illness_benifit_15_illnesses') }}
                            </td>
                            <td class="text-center" >{{ __('quo_pdf.backend.child_prop_list.child1') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2">{{ ($CH_ARRAY['CH1_CRIT_IL_29_SA']=="N/A"?$CH_ARRAY['CH1_CRIT_IL_29_SA']:number_format($CH_ARRAY['CH1_CRIT_IL_29_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH1_CRIT_IL_29_PRE']=="N/A"?$CH_ARRAY['CH1_CRIT_IL_29_PRE']:number_format($CH_ARRAY['CH1_CRIT_IL_29_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">{{ __('quo_pdf.backend.child_prop_list.child2') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2">{{ ($CH_ARRAY['CH2_CRIT_IL_29_SA']=="N/A"?$CH_ARRAY['CH2_CRIT_IL_29_SA']:number_format($CH_ARRAY['CH2_CRIT_IL_29_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH2_CRIT_IL_29_PRE']=="N/A"?$CH_ARRAY['CH2_CRIT_IL_29_PRE']:number_format($CH_ARRAY['CH2_CRIT_IL_29_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">{{ __('quo_pdf.backend.child_prop_list.child3') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2">{{ ($CH_ARRAY['CH3_CRIT_IL_29_SA']=="N/A"?$CH_ARRAY['CH3_CRIT_IL_29_SA']:number_format($CH_ARRAY['CH3_CRIT_IL_29_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH3_CRIT_IL_29_PRE']=="N/A"?$CH_ARRAY['CH3_CRIT_IL_29_PRE']:number_format($CH_ARRAY['CH3_CRIT_IL_29_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td  class="text-center">{{ __('quo_pdf.backend.child_prop_list.child4') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2">{{ ($CH_ARRAY['CH4_CRIT_IL_29_SA']=="N/A"?$CH_ARRAY['CH4_CRIT_IL_29_SA']:number_format($CH_ARRAY['CH4_CRIT_IL_29_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH4_CRIT_IL_29_PRE']=="N/A"?$CH_ARRAY['CH4_CRIT_IL_29_PRE']:number_format($CH_ARRAY['CH4_CRIT_IL_29_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="4">{{ __('quo_pdf.backend.tb4.rider_main.surgery_benifit') }}
                            </td>
                            <td class="text-center" >{{ __('quo_pdf.backend.child_prop_list.child1') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2">{{ ($CH_ARRAY['CH1_SUR_BEN_SA']=="N/A"?$CH_ARRAY['CH1_SUR_BEN_SA']:number_format($CH_ARRAY['CH1_SUR_BEN_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH1_SUR_BEN_PRE']=="N/A"?$CH_ARRAY['CH1_SUR_BEN_PRE']:number_format($CH_ARRAY['CH1_SUR_BEN_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child2') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2" >{{ ($CH_ARRAY['CH2_SUR_BEN_SA']=="N/A"?$CH_ARRAY['CH2_SUR_BEN_SA']:number_format($CH_ARRAY['CH2_SUR_BEN_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH2_SUR_BEN_PRE']=="N/A"?$CH_ARRAY['CH2_SUR_BEN_PRE']:number_format($CH_ARRAY['CH2_SUR_BEN_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child3') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2" >{{ ($CH_ARRAY['CH3_SUR_BEN_SA']=="N/A"?$CH_ARRAY['CH3_SUR_BEN_SA']:number_format($CH_ARRAY['CH3_SUR_BEN_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH3_SUR_BEN_PRE']=="N/A"?$CH_ARRAY['CH3_SUR_BEN_PRE']:number_format($CH_ARRAY['CH3_SUR_BEN_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child4') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2">{{ ($CH_ARRAY['CH4_SUR_BEN_SA']=="N/A"?$CH_ARRAY['CH4_SUR_BEN_SA']:number_format($CH_ARRAY['CH4_SUR_BEN_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH4_SUR_BEN_PRE']=="N/A"?$CH_ARRAY['CH4_SUR_BEN_PRE']:number_format($CH_ARRAY['CH4_SUR_BEN_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="4">{{ __('quo_pdf.backend.tb4.rider_main.supreme_health_benifit_med_rem') }}<br/> {{ __('quo_pdf.backend.tb4.covered_countries') }}
                                : <span class="en-lang-text-pdf">{{$MED_REM3_COUNTRIES }} </span>
                            </td>
                            <td class="text-center" >{{ __('quo_pdf.backend.child_prop_list.child1') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2">{{ ($CH_ARRAY['CH1_MED_REM3_SA']=="N/A"?$CH_ARRAY['CH1_MED_REM3_SA']:number_format($CH_ARRAY['CH1_MED_REM3_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH1_MED_REM3_PRE']=="N/A"?$CH_ARRAY['CH1_MED_REM3_PRE']:number_format($CH_ARRAY['CH1_MED_REM3_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child2') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2" >{{ ($CH_ARRAY['CH2_MED_REM3_SA']=="N/A"?$CH_ARRAY['CH2_MED_REM3_SA']:number_format($CH_ARRAY['CH2_MED_REM3_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH2_MED_REM3_PRE']=="N/A"?$CH_ARRAY['CH2_MED_REM3_PRE']:number_format($CH_ARRAY['CH2_MED_REM3_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child3') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2" >{{ ($CH_ARRAY['CH3_MED_REM3_SA']=="N/A"?$CH_ARRAY['CH3_MED_REM3_SA']:number_format($CH_ARRAY['CH3_MED_REM3_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH3_MED_REM3_PRE']=="N/A"?$CH_ARRAY['CH3_MED_REM3_PRE']:number_format($CH_ARRAY['CH3_MED_REM3_PRE'])) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('quo_pdf.backend.child_prop_list.child4') }}</td>
                            <td class="text-center en-lang-text-pdf" colspan="2" >{{ ($CH_ARRAY['CH4_MED_REM3_SA']=="N/A"?$CH_ARRAY['CH4_MED_REM3_SA']:number_format($CH_ARRAY['CH4_MED_REM3_SA'])) }}</td>
                            <td class="text-center en-lang-text-pdf">{{ ($CH_ARRAY['CH4_MED_REM3_PRE']=="N/A"?$CH_ARRAY['CH4_MED_REM3_PRE']:number_format($CH_ARRAY['CH4_MED_REM3_PRE'])) }}</td>
                        </tr>


                        <tr>
                            <td colspan="2" ></td>
                            <td colspan="2" class="text-center"></td>
                            <td colspan="2" class="text-center"></td>
                        </tr>


                        <tr>
                            <th colspan="3">{{ __('quo_pdf.backend.tb4.waiver_of_basic_premium') }}</th>
                            <th class="text-center">{{ __('quo_pdf.backend.tb4.waiver_of_monthly_premium') }}</th>
                            <th class="text-center" colspan="2">{{ __('quo_pdf.backend.tb4.annual_premium') }}</th>
                        </tr>
                        <tr>
                            <td colspan="3">{{ __('quo_pdf.backend.tb4.rider_main.waiver_basic_prem_due_death_life_assured') }}
                            </td>
                            <td class="text-center en-lang-text-pdf">{{ ($WOP_DTH_B_SA=="N/A"?$WOP_DTH_B_SA:number_format($WOP_DTH_B_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf"
                                colspan="2">{{ ($WOP_DTH_B_PRE=="N/A"?$WOP_DTH_B_PRE:number_format($WOP_DTH_B_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">{{ __('quo_pdf.backend.tb4.rider_main.waiver_spouse_child_rider_prem_due_death_life_assured') }}
                            </td>
                            <td class="text-center en-lang-text-pdf">{{ ($WOP_DTH_R_SA == 'N/A'?$WOP_DTH_R_SA:number_format($WOP_DTH_R_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf"
                                colspan="2">{{ ($WOP_DTH_R_PRE == 'N/A'?$WOP_DTH_R_PRE:number_format($WOP_DTH_R_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">{{ __('quo_pdf.backend.tb4.rider_main.waiver_basic_prem_due_tot_permanent_disability_life_assured') }}
                            </td>
                            <td class="text-center en-lang-text-pdf">{{ ($WOP_TPD_B_SA == 'N/A'?$WOP_TPD_B_SA:number_format($WOP_TPD_B_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf"
                                colspan="2">{{ ($WOP_TPD_B_PRE == 'N/A'?$WOP_TPD_B_PRE:number_format($WOP_TPD_B_PRE)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">{{ __('quo_pdf.backend.tb4.rider_main.waiver_insured_critical_illness_spouse_child_rider_prem_due_tot_perm_disability_assured') }}
                            </td>
                            <td class="text-center en-lang-text-pdf">{{ ($WOP_TPD_R_SA == 'N/A'?$WOP_TPD_R_SA:number_format($WOP_TPD_R_SA)) }}</td>
                            <td class="text-center en-lang-text-pdf"
                                colspan="2">{{ ($WOP_TPD_R_PRE == 'N/A'?$WOP_TPD_R_PRE:number_format($WOP_TPD_R_PRE)) }}</td>
                        </tr>

                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
<?php }?>
<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">

                <div class="divTableCell">
                    <table class="bordered width-100pc">
                    <tr>
                        <?php if ((double) $SP_AD_LIFE_SA != 'N/A') {?>
                            <th colspan="3">
                        <?php } else {?>
                            <th colspan="2">
                        <?php }?>
                            {{ __('quo_pdf.backend.tb5_head_title') }}
                            </th>
                        </tr>
                        <?php if ((double) $SP_AD_LIFE_SA != 'N/A') {?>
                        <tr>
                            <th></th>
                            <th>{{ __('quo_pdf.backend.tb5.benift_for_life_assured') }}</th>
                            <th>{{ __('quo_pdf.backend.tb5.benift_for_spouse') }}</th>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb5.loss_life_natural_case') }}
                            </td>

                            <td>
                                {{ number_format($prem_data['summary']['sum_assured']) }} {{ __('quo_pdf.backend.tb5.with_waiwer_prm_death') }}
                                <?php if ((double) $AD_LIFE_SA != 'N/A') {
        echo " மற்றும் " . number_format((double) $AD_LIFE_SA);
    }
    ?>
                            </td>
                            <?php if ((double) $SP_AD_LIFE_SA != 'N/A') {?>
        <td>
                            <?php echo number_format((double) $SP_AD_LIFE_SA); ?>
                            </td>
                            <?php }?>
                        </tr>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb5.loss_life_accident') }}
                            </td>

                            <td>

                                {{ number_format($prem_data['summary']['sum_assured']) }} {{ __('quo_pdf.backend.tb5.with_waiwer_prm_death') }}

                                <?php if ($AD_LIFE_SA != 'N/A' || $ACC_DTH_SA != 'N/A') {

        echo " மற்றும் " . number_format((double) $AD_LIFE_SA + (double) $ACC_DTH_SA);
    }
    ?>
                            </td>
                            <?php if ((double) $SP_AD_LIFE_SA != 'N/A') {?>
        <td>
                            <?php echo number_format((double) $SP_AD_LIFE_SA + (double) $SP_ACC_DTH_SA); ?>
                            </td>
                            <?php }?>
                        </tr>
                        <tr>
                        <?php if ((double) $SP_AD_LIFE_SA != 'N/A') {?>
                            <th colspan="3">
                            <?php } else {?>
                            <th colspan="2">
                            <?php }?>
                                * {{ __('quo_pdf.backend.tb5.with_waiwer_prm_death_bold_wording') }}
                            </th>
                        </tr>
                        <tr>
                        <?php if ((double) $SP_AD_LIFE_SA != 'N/A') {?>
                            <td colspan="3">
                            <?php } else {?>
                            <td colspan="2">
                            <?php }?>
                                1.{{ __('quo_pdf.backend.tb5.cnd1') }}
                                <br>
                                2.{{ __('quo_pdf.backend.tb5.cnd2') }}
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">

                <div class="divTableCell">
                    <table class="bordered width-100pc inter_tbl_spacing">
                        <tr>
                            <th colspan="2">{{ __('quo_pdf.backend.tb6_head_title') }}</th>
                        </tr>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb6.basic_premium') }}
                            </td>
                            <td class="text-right">
                                {{ number_format($prem_data['member_main'][0]['basic_mode_premium']) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb6.extra_premium') }}
                            </td>
                            <td class="text-right">
                                {{ number_format($prem_data['member_main'][0]['basic_mode_extra_premium']) }}
                            </td>
                        </tr>
                        <?php if ($prem_data['summary']['frequency'] != 'S') {?>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb6.additional_rider_premium') }}
                            </td>
                            <td class="text-right">
                                {{ number_format($rider_prem_total *  $prem_data['member_main'][0]['mode_factor'] / 12) }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb6.renewal_policy_fee') }}
                            </td>
                            <td class="text-right">
                                {{ number_format($prem_data['member_main'][0]['policy_fee']) }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <strong>
                            காப்புறுதியின் முதல் {{ $quotationData['premium_term'] }}  வருடங்களின்   போதான மொத்த {{ $mode_list[$str_mode]}} கட்டுப்பணம் (ரூபா)
                                </strong></td>
                            <td class="text-right">
                            <strong>{{ number_format($prem_data['member_main'][0]['basic_mode_premium'] + $prem_data['member_main'][0]['basic_mode_extra_premium'] + ($rider_prem_total *  $prem_data['member_main'][0]['mode_factor'] / 12 ) + $prem_data['member_main'][0]['policy_fee']) }}</strong>
                            </td>
                        </tr>
                        <?php }?>

                        <?php
if ($quotationData['premium_term'] < $quotationData['policy_term'] && ($prem_data['summary']['frequency'] != 'S')) {
        ?>
                        <tr>
                            <td>
                                <strong>
                            காப்புறுதியின் {{ $quotationData['premium_term'] }} வருடங்களின் பின்னர்  {{ $prem_data['summary']['policy_term'] }} வரை மொத்த {{ $mode_list[$str_mode]}} கட்டுப்பணம் (ரூபா)
                                </strong></td>
                            <td class="text-right">
                            <strong><?php echo number_format($last_year_rider_total_mode_premium); ?></strong>
                            </td>
                        </tr>
                        <?php
}
    ?>
                        <tr>
                            <td colspan="2">
                                {{ __('quo_pdf.backend.tb6.cdn3') }}
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">

                <div class="divTableCell">
                    <table class="bordered width-100pc inter_tbl_spacing">
                        <tr>
                            <th colspan="4">{{ __('quo_pdf.backend.tb7_head_title') }}</th>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb7.prm_paying_frq') }}
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 7%
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 9%
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 11%
                            </th>
                        </tr>
                        <?php if ($prem_data['summary']['frequency'] != 'S') {
        ?>

                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb7.yearly') }}
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['low'][4][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['medium'][4][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['high'][4][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb7.half_yearly') }}
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['low'][3][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['medium'][3][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['high'][3][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb7.quarterly') }}
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['low'][2][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['medium'][2][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['high'][2][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                        </tr>

                        <?php
}
    ?>

                        <tr>
                            <td>
                                <?php if ($prem_data['summary']['frequency'] != 'S') {
        echo __('quo_pdf.backend.mode_list.mode_monthly');
    } else {
        echo __('quo_pdf.backend.mode_list.mode_single_prem');
    }
    ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['low'][1][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['medium'][1][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['high'][1][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="bordered width-100pc inter_tbl_spacing ">
                        <tr>
                            <th colspan="4">விளக்கப்பட்டுள்ள நிதி வளர்ச்சி – {{ $mode_list[$str_mode]}} கட்டுப்பண முறையின் அடிப்படையில் </th>
                        </tr>
                        <tr>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb8.option') }}
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 7%
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 9%
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 11%
                            </th>
                        </tr>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb8.lump_sum') }}
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['low'][$fund_index][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['medium'][$fund_index][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['high'][$fund_index][$prem_data['summary']['policy_term'] + 1][2]); ?>
                            </td>
                        </tr>
                        <?php if (isset($prem_data['annuity']) && is_array($prem_data['annuity'])) {
        ?>

                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb8.m10') }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][0][0]) }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][0][1]) }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][0][2]) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb8.m20') }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][1][0]) }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][1][1]) }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][1][2]) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb8.m10_main') }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][2][0]) }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][2][1]) }}
                            </td>
                            <td class="text-center">
                                {{ number_format($prem_data['annuity'][2][2]) }}
                            </td>
                        </tr>

                        <?php
}
    ?>

                        <tr>
                            <td>
                                {{ __('quo_pdf.backend.tb8.health_fund') }}
                            </td>
                            <td class="text-center" colspan="3">
                                {{ __('quo_pdf.backend.tb8.cdn2') }}
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="wrapper" style="page-break-after: always;">
    <h5>
        *{{ __('quo_pdf.backend.tb8.cdn3') }}
    </h5>
</div>
<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">

                <div class="divTableCell">
                    <table class="bordered width-100pc inter_tbl_spacing_il tbl_illustration">
                        <tr>
                            <th colspan="10">{{ __('quo_pdf.backend.tb9_head_title') }} {{ $mode_list[$str_mode]}} {{ __('quo_pdf.backend.tb9_head_title_1') }}</th>
                        </tr>
                        <tr>
                            <th rowspan="2" class="text-center">
                                {{ __('quo_pdf.backend.tb9.policy_year') }}
                            </th>
                            <th rowspan="2" class="text-center">
                                {{ __('quo_pdf.backend.tb9.age') }}
                            </th>
                            <th rowspan="2" class="text-center">
                                <?php
if ($prem_data['summary']['frequency'] != 'S') {
        echo __('quo_pdf.backend.mode_prem_list.mode_basic_annual_prem');
    } else {
        echo __('quo_pdf.backend.mode_prem_list.mode_basic_single_prem');
    }
    ?>

                            </th>
                            <th rowspan="2" class="text-center">
                                {{ __('quo_pdf.backend.tb9.rap') }}
                                </th>
                                <th colspan="2" class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 7%
                                </th>
                                <th colspan="2" class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 9%
                                </th>
                                <th colspan="2" class="text-center">
                                {{ __('quo_pdf.backend.tb7.assumed_rate_of_dividend') }} - 11%
                                </th>
                        </tr>

                        <tr>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb9.il_end') }}
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb9.ils_end') }}
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb9.il_end') }}
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb9.ils_end') }}
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb9.il_end') }}
                            </th>
                            <th class="text-center">
                                {{ __('quo_pdf.backend.tb9.ils_end') }}
                            </th>
                        </tr>
                        <?php

    for ($i = 2; $i <= (count($maturity_fund_values['low'][$fund_index]) + 1); $i++) {
        ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $maturity_fund_values['low'][$fund_index][$i][0]; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $maturity_fund_values['low'][$fund_index][$i][0] + $prem_data['age_main']; ?>
                            </td>
                            <td class="text-center">
                                <?php
if ($prem_data['summary']['frequency'] == 'S') {
            if ($maturity_fund_values['low'][$fund_index][$i][0] == 1) {
                echo number_format($prem_data['summary']['total_premium']);
            } else {
                echo "-";
            }

        } else {
            if ($maturity_fund_values['low'][$fund_index][$i][0] > $quotationData['premium_term']) {
                echo "-";
            } else {
                echo number_format($prem_data['member_main'][0]['basic_annual_premium'] + $prem_data['member_main'][0]['basic_annual_extra_premium']);
            }
        }

        ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $total_rider_prem = 0;
                                    if ($prem_data['summary']['frequency'] != 'S') {
                                        //Main life rider totalup
                                        foreach ($prem_data['member_main'] as $rider) {
                                            if ($rider['rider_code'] != 'STD-COVER') {
                                                if ($rider['term'] >= $maturity_fund_values['low'][$fund_index][$i][0]) {
                                                    $total_rider_prem += $rider['total_premium'];
                                                }
                                            }
                                        }
                                        //Spouse life rider totalup
                                        foreach ($prem_data['member_spouse'] as $rider) {
                                            if ($rider['term'] >= $maturity_fund_values['low'][$fund_index][$i][0]) {
                                                $total_rider_prem += $rider['total_premium'];
                                            }
                                        }

                                        //Children rider totalup
                                        foreach ($prem_data['member_child'] as $child) {
                                            foreach ($child as $rider) {
                                                if ($rider['term'] >= $maturity_fund_values['low'][$fund_index][$i][0]) {
                                                    $total_rider_prem += $rider['total_premium'];
                                                }
                                            }
                                        }
                                        echo number_format($total_rider_prem);
                                    } else {
                                        echo "-";
                                    }

                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['low'][$fund_index][$i][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['low'][$fund_index][$i][3]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['medium'][$fund_index][$i][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['medium'][$fund_index][$i][3]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['high'][$fund_index][$i][2]); ?>
                            </td>
                            <td class="text-center">
                                <?php echo number_format($maturity_fund_values['high'][$fund_index][$i][3]); ?>
                            </td>
                        </tr>
                        <?php }?>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <h5>
        * {{ __('quo_pdf.backend.tb8.cdn3') }}
    </h5>
    <h5>
        * {{ __('quo_pdf.backend.tb9.garanteed_devident_rate_for_the_year') }}
    </h5>
    <h5>
        * {{ __('quo_pdf.backend.tb9.cdn4') }}
    </h5>
    <div style="page-break-after: always;"></div>
    <h5>
        * {{ __('quo_pdf.backend.tb9.cdn5') }}
    </h5>
</div>
<h5>
    (1) {{ __('quo_pdf.backend.quote1') }}
</h5>
<h5>
    (2) {{ __('quo_pdf.backend.quote2') }}
</h5>
<h5>
    (3) {{ __('quo_pdf.backend.quote3') }}
</h5>
<h5>
    (4) {{ __('quo_pdf.backend.quote4') }}
</h5>
<h5>
    (5) {{ __('quo_pdf.backend.quote5') }}
</h5>
<h5>
    (6) {{ __('quo_pdf.backend.quote6') }}
</h5>
<h5>
    (7) {{ __('quo_pdf.backend.quote7') }}
</h5>
<h5>
    (8) {{ __('quo_pdf.backend.quote8') }}
</h5>
<h5>
    (9) {{ __('quo_pdf.backend.quote9') }}
</h5>
<h5>
    (10) {{ __('quo_pdf.backend.quote10') }}
</h5>
<?php if (!empty($prem_data['medical_main']) || $prem_data['medical_spouse'] != "-") {
        ?>
<div><u><strong>{{ __('quo_pdf.backend.bmr') }}</strong></u></div>
<?php }
    ?>

<!-- Medical Report List Table (Main Life/Spouse) Start -->
<div class="row">
<?php if (!empty($prem_data['medical_main'])) {?>
  <div class="column">
  <!-- Medical Report Table Header - Main -->
  <div><strong>{{ __('quo_pdf.backend.main_life') }}</strong></div>
  <!-- Medical Report Table Body - Main -->
  <div>
  <table>
    <tr>
        <td class="en-lang-text-pdf">
            <?php if (is_array($prem_data['medical_main'])) {
        foreach ($prem_data['medical_main'] as $medical) {
            echo $medical . "<br>";
        }
    }
        ?>
        </td>
    </tr>
  </table>
  </div>
  </div>
<?php }?>
<?php if ($prem_data['medical_spouse'] != "-") {?>
  <div class="column">
  <!-- Medical Report Table Header - Spouse -->
  <div><strong>{{ __('quo_pdf.backend.tb4.spouse') }}</strong></div>
  <!-- Medical Report Table Body - Spouse -->
  <div>
  <table>
    <tr>
        </td>
            <td class="en-lang-text-pdf">
                <?php if (is_array($prem_data['medical_spouse'])) {
        foreach ($prem_data['medical_spouse'] as $medical) {
            echo $medical . "<br>";
        }
    }
        ?>
            </td>
        </tr>
    </table>
  </div>
  </div>
  <?php }?>
</div>
<!-- Medical Report List Table (Main Life/Spouse) End -->

<br/>
<div>
    {{ __('quo_pdf.backend.quote14') }}
</div>
<div class="en-lang-text-pdf">
    <b>{{ __('quo_pdf.backend.quote15') }}</b>
</div>
<div>
    <br/>
</div>
<div>
    <div>................................................................</div>
    <strong>{{ __('quo_pdf.backend.quote16') }}</strong>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{ __('quo_pdf.backend.date') }} </strong> &nbsp;: &nbsp;<?php echo date('d/m/Y'); ?>
</div>

<br>

<div>
    <u><strong>
        {{ __('quo_pdf.backend.quote17') }}
        </strong>
    </u>
</div>

<div>
        <?php if ($prem_data['summary']['total_premium'] <= 500000) {
        ?>
        {{ __('quo_pdf.backend.below_500000_declaration_customer') }}
        <?php
} else {
        ?>
        {{ __('quo_pdf.backend.over_500000_declaration_customer') }}
        <?php
}
    ?>
</div>

<div class="wrapper">
    <div class="divTable">

        <div class="divTableCell" style="width: 50%;">
            <table class="width-100pc">

                <tr>
                    <td class="en-lang-text-pdf">
                        {{ $quotationData['title']. ' ' . $quotationData['first_name'] .' '. $quotationData['last_name'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong> {{ __('quo_pdf.backend.cus_name') }} </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong> {{ __('quo_pdf.backend.nic') }} </strong> : <span class="en-lang-text-pdf">{{ $quotationData['nic']}} </span>
                    </td>
                </tr>


            </table>
        </div>

        <div class="divTableCell" style="width: 50%;">
            <table class="width-100pc">

                <tr>
                    <td>
                        ...................................................................................
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>{{ __('quo_pdf.backend.cus_sig') }} </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong> {{ __('quo_pdf.backend.date') }} : </strong> {{ date('d/m/Y')}}
                    </td>
                </tr>


            </table>
        </div>

    </div>
</div>

<div class="wrapper">
    <div>
        <u><strong>
            <?php if ($prem_data['summary']['total_premium'] <= 500000) {
        ?>
            {{ __('quo_pdf.backend.quote19') }}
            <?php
} else {
        ?>
            {{ __('quo_pdf.backend.quote19') }}
            <?php
}
    ?>

        </strong></u>
    </div>

        <?php if ($prem_data['summary']['total_premium'] <= 500000) {
        ?>
        {{ __('quo_pdf.backend.below_500000_declaration_advisor') }}
        <?php
} else {
        ?>
        {{ __('quo_pdf.backend.over_500000_declaration_advisor') }}
        <?php
}
    ?>
</div>
<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">

                <div class="divTableCell">
                    <table class="width-100pc">

                        <tr>
                            <td>
                                ..................................................................................
                            </td>
                            <td>
                                .......................................
                            </td>
                            <td class="en-lang-text-pdf">
                                {{ $quotationData['agent_code']}}
                            </td>
                            <td>
                                <?php echo date('d/m/Y'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>{{ __('quo_pdf.backend.sa_name') }} </strong>
                            </td>
                            <td>
                                <strong> {{ __('quo_pdf.backend.signature') }} </strong>
                            </td>
                            <td>
                                <strong> {{ __('quo_pdf.backend.code') }} </strong>
                            </td>
                            <td>
                                <strong> {{ __('quo_pdf.backend.date') }} </strong>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<?php if ($prem_data['summary']['total_premium'] > 500000) {
        ?>
<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">

                <div class="divTableCell">
                    <table class="width-100pc">

                        <tr>
                            <td>
                                .......................................
                            </td>
                            <td>
                                .......................................
                            </td>
                            <td>
                                .......................................
                            </td>
                            <td>
                                <?php echo date('d/m/Y'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>{{ __('quo_pdf.backend.branch_manager') }}</strong>
                            </td>
                            <td>
                                <strong> {{ __('quo_pdf.backend.signature') }} </strong>
                            </td>
                            <td>
                                <strong> {{ __('quo_pdf.backend.branch_name') }} </strong>
                            </td>
                            <td>
                                <strong> {{ __('quo_pdf.backend.date') }} </strong>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
}
    ?>


<?php
}
?>
<br/>
<?php // echo __('quo_pdf.backend.main_life_sum_at_risk') . number_format($prem_data['f_risk_main']) . " , " . __('quo_pdf.backend.tb4.spouse') . ": " . number_format($prem_data['f_risk_spouse']); ?>
</body>
</html>