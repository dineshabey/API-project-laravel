<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>AdhyapanaPlus Quotation</title>
    <style type="text/css">

    th {
            background-color: #f7f7f7;
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
            text-align: left;
        }
        td{
            padding-left: 5px !important;
            height: 15px;
            padding-right: 5px !important;

        }

        .bordered td {
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
        }

        body{
            font-size: 10px !important;
            font-family: Roboto,"freesans",Helvetica,Arial,sans-serif;
            
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
        .wrapper{
            clear:both;
            margin-top:0px;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        .inter_tbl_spacing{
            margin-top:20px;
        }
        .inter_tbl_spacing_il{
            margin-top:5px;
        }
        .medical_table{
            font-size: 10px !important;
            font-family: Roboto,"freesans",Helvetica,Arial,sans-serif;
            line-height: 1.5;
            color: #373a3c;
        }
        .tbl_illustration{
            font-size: 7px !important;
        }
        .medium_fontsize{
            font-size:14px !important;
        }
        .large_fontsize{
            font-size:16px !important;
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

        /*Page numbers */
        .page_num{
            width : 100%;
            text-align:right;
            padding-bottom:20px;
        }
        @page {
            footer: page-footer;
        }
    </style>
</head>
<?php $prem_data = unserialize($quotationData['res_obj']);?>
<?php
$fund_index = 1;
$str_frequency = "";
if ($quotationData['frequency'] == 'M') {
    $fund_index = 1;
    $str_frequency = "Monthly";
} else if ($quotationData['frequency'] == 'Q') {
    $fund_index = 2;
    $str_frequency = "Quarterly";
} else if ($quotationData['frequency'] == 'H') {
    $fund_index = 3;
    $str_frequency = "Half Yearly";
} else if ($quotationData['frequency'] == 'Y') {
    $fund_index = 4;
    $str_frequency = "Yearly";
} 
?>
<?php $med_rem3_floater = $quotationData['med_rem3_floater'];  ?>
<?php
$maturity_fund_values = $prem_data['maturity_fund_values'];
?>
<body>
<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="width-100pc">

                        <tr>
                            <td width="30%" class="text-center">
                                <img src="{{public_path('img/backend/brand/adhyapana_plus_logo.png')}}" >
                            </td>
                            <td width="40%" class="text-center">
                                <b class="header-cols-big large_fontsize ">Quotation and Illustration</b>
                                
                            </td>
                            <td width="30%" align="right">
                                 <img src="{{public_path('img/backend/brand/logo.png')}}" >
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="wrapper text-center">
    <table style="width:100%">
        <tr>
            <td width="50%" > {{ date('d/m/Y')}} </td>
            <td width="50%" class="text-right"><strong>Quotation No: {{ $quotationData['quote_no'] }} - {{ $quotationData['version'] }} </strong></td>
        </tr>
    </table>
</div>

<div class="wrapper" >
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="4">Details of Proposer</th>
                </tr>
                <tr>
                    <td width="25%">Name</td>
                    <td width="25%">{{ $quotationData['title'] }} {{ $quotationData['first_name'] }} {{ $quotationData['last_name'] }}</td>
                
                    <td width="25%" >NIC No</td>
                    <td  width="25%">{{ $quotationData['nic'] }}</td>
                </tr>
                <tr>
                    <td width="25%">Date of Birth</td>
                    <td width="25%"><?php $tmpDob = new DateTime($quotationData['dob']);echo $tmpDob->format('d F Y'); ?></td>
                
                    <td width="25%" >Age Next Birthday</td>
                    <td  width="25%">{{ $prem_data['age_main'] }} Years</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="4">Details of Family</th>
                </tr>
                <tr>
                    <td width="25%">Date of Birth of Spouse</td>
                    <td width="25%"><?php if($quotationData['has_spouse']=="Yes"){$tmpSPDob = new DateTime($quotationData['sp_dob']); echo  $tmpSPDob->format('d F Y'); }else{ echo "Not Selected";}
                       ?>
                       </td>
                
                    <td width="25%" >Age Next Birthday</td>
                    <td  width="25%">{{ ($quotationData['has_spouse']=="Yes"?($prem_data['age_spouse']." Years"):"Not Selected")  }}</td>
                </tr>
                <tr>
                    <td width="25%" >Name of Spouse</td>
                    <td  width="25%">{{ ($quotationData['has_spouse']=="Yes"?( $quotationData['sp_title']." ".$quotationData['sp_first_name']." ".$quotationData['sp_last_name'] ):"Not Selected")  }}</td>

                    <td width="25%">No. of Children</td>
                    <td width="25%">{{ ($quotationData['children']=="0"?"Not Selected":$quotationData['children'])  }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="4">Takaful Plan</th>
                </tr>
                <tr>
                    <td width="25%">Basic Contribution (LKR)</td>
                    <td width="25%">{{ $quotationData['monthly_basic_premium'] }}</td>
                
                    <td width="25%" >Term</td>
                    <td  width="25%">{{ $quotationData['policy_term'] }} Years</td>
                </tr>
                <tr>
                    <td width="25%" >Payment Mode</td>
                    <td  width="25%">{{ $str_frequency }}</td>

                    <td width="25%">Basic Cover (LKR)</td>
                    <td width="25%">{{ number_format($prem_data['summary']['sum_assured']) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php

$PTD_SA = '-';
$PTD_PRE = '-';

$PA_SA = '-';
$PA_PRE = '-';

$AFP_SA = '-';
$AFP_PRE = '-';

$CI_SA = '-';
$CI_PRE = '-';

$HB_SA = '-';
$HB_PRE = '-';

$WI_SA = '-';
$WI_PRE = '-';

$CI_SPOUSE_SA = '-';
$CI_SPOUSE_PRE = '-';

$FR_SPOUSE_SA = '-';;
$FR_SPOUSE_PRE = '-';

$FR_CHILD_SA = '-';
$FR_CHILD_PRE = '-';
        
foreach ($prem_data['member_main'] as $rider) {
    if ($rider['rider_code'] == 'PTD') {
        $PTD_SA = $rider['sum_assured'];
        $PTD_PRE = $rider['total_premium'];

    } else if ($rider['rider_code'] == 'PA') {
        $PA_SA = $rider['sum_assured'];
        $PA_PRE = $rider['total_premium'] * $prem_data['member_main'][0]['mode_factor'] /12;

    }else if ($rider['rider_code'] == 'AFP') {
        $AFP_SA = $rider['sum_assured'];
        $AFP_PRE = $rider['total_premium'] * $prem_data['member_main'][0]['mode_factor'] /12;

    }else if ($rider['rider_code'] == 'CI') {
        $CI_SA = $rider['sum_assured'];
        $CI_PRE = $rider['total_premium'] * $prem_data['member_main'][0]['mode_factor'] /12;
        
    }else if ($rider['rider_code'] == 'HB') {
        $HB_SA = $rider['sum_assured'];
        $HB_PRE = $rider['total_premium'] * $prem_data['member_main'][0]['mode_factor'] /12;
        
    }else if ($rider['rider_code'] == 'WI') {
        $WI_SA = $rider['sum_assured'];
        $WI_PRE = $rider['total_premium'] * $prem_data['member_main'][0]['mode_factor'] /12;
        
    } 
}

foreach ($prem_data['member_spouse'] as $rider) {
    if ($rider['rider_code'] == 'CI-SPOUSE') {
        $CI_SPOUSE_SA = $rider['sum_assured'];
        $CI_SPOUSE_PRE = $rider['total_premium'] * $prem_data['member_main'][0]['mode_factor'] /12;

    } else if ($rider['rider_code'] == 'FR-SPOUSE') {
        $FR_SPOUSE_SA = $rider['sum_assured'];
        $FR_SPOUSE_PRE = $rider['total_premium'] * $prem_data['member_main'][0]['mode_factor'] /12;

    }
}

for ($i = 0; $i < ($quotationData['children']=="0"?0:1); $i++) {
    if(isset($prem_data['member_child'][$i])){
        foreach ($prem_data['member_child'][$i] as $child) {
            if ($child['rider_code'] == 'FR-CHILD') {
                $FR_CHILD_SA = $child['sum_assured'];
                $FR_CHILD_PRE = $child['total_premium'] * $prem_data['member_main'][0]['mode_factor'] /12;
            }
        }
    }
}

?>
<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="3">Supplementary Covers</th>
                </tr>
                <tr>
                    <th width="50%">Type of Cover</th>
                    <th width="25%" class="text-center">Cover Amount (LKR)</th>
                    <th width="25%" class="text-center">Contribution (LKR)</th>
                </tr>
                <tr>
                    <td >Permanent Total Disability (PTD)</td>
                    <td class="text-right">{{ ($PTD_SA=="-"?$PTD_SA:number_format($PTD_SA)) }}</td>
                    <td class="text-right">{{ ($PTD_PRE=="0"?"-":number_format($PTD_PRE,2)) }}</td>
                </tr>
                <tr>
                    <td >Personal Accident (PA)</td>
                    <td class="text-right">{{ ($PA_SA=="-"?$PA_SA:number_format($PA_SA)) }}</td>
                    <td class="text-right">{{ ($PA_PRE=="-"?$PA_PRE:number_format($PA_PRE,2)) }}</td>
                </tr>
                <tr>
                    <td >Additional Family Protection (AFP)</td>
                    <td class="text-right">{{ ($AFP_SA=="-"?$AFP_SA:number_format($AFP_SA)) }}</td>
                    <td class="text-right">{{ ($AFP_PRE=="-"?$AFP_PRE:number_format($AFP_PRE,2)) }}</td>
                </tr>
                <tr>
                    <td >Critical Illness (CI)</td>
                    <td class="text-right">{{ ($CI_SA=="-"?$CI_SA:number_format($CI_SA)) }}</td>
                    <td class="text-right">{{ ($CI_PRE=="-"?$CI_PRE:number_format($CI_PRE,2)) }}</td>
                </tr>
                <tr>
                    <td >Critical Illness - Spouse (CI - Spouse)</td>
                    <td class="text-right">{{ ($CI_SPOUSE_SA=="-"?$CI_SPOUSE_SA:number_format($CI_SPOUSE_SA)) }}</td>
                    <td class="text-right">{{ ($CI_SPOUSE_PRE=="-"?$CI_SPOUSE_PRE:number_format($CI_SPOUSE_PRE,2)) }}</td>
                </tr>
                <tr>
                    <td >Family Rider - Spouse (FR - Spouse)</td>
                    <td class="text-right">{{ ($FR_SPOUSE_SA=="-"?$FR_SPOUSE_SA:number_format($FR_SPOUSE_SA)) }}</td>
                    <td class="text-right">{{ ($FR_SPOUSE_PRE=="-"?$FR_SPOUSE_PRE:number_format($FR_SPOUSE_PRE,2)) }}</td>
                </tr>
                <tr>
                    <td >Family Rider - Child (FR - Child)</td>
                    <td class="text-right">{{ ($FR_CHILD_SA=="-"?$FR_CHILD_SA:number_format($FR_CHILD_SA)) }}</td>
                    <td class="text-right">{{ ($FR_CHILD_PRE=="-"?$FR_CHILD_PRE:number_format($FR_CHILD_PRE,2)) }}</td>
                </tr>
                <tr>
                    <td >Hospitalization Comprehensive Benefit (HB) - 
                    <?php 
                    if($HB_SA != "-" &&  $med_rem3_floater=="Yes"){
                        echo "Family";
                    } else if($HB_SA != "-" &&  $med_rem3_floater=="No"){
                        echo "Individual";
                    }
                    ?>
                    </td>
                    <td class="text-right">{{ ($HB_SA=="-"?$HB_SA:number_format($HB_SA)) }}</td>
                    <td class="text-right">{{ ($HB_PRE=="-"?$HB_PRE:number_format($HB_PRE,2)) }}</td>
                </tr>
                <tr>
                    <td >Waiver of Installment (WI)</td>
                    <td class="text-right">{{ ($WI_SA=="-"?"NO":"YES") }}</td>
                    <td class="text-right">{{ ($WI_PRE=="-"?$WI_PRE:number_format($WI_PRE,2)) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="width-100pc">
                <tr>
                    <td>TPD, PA and WI covers will be ceased at age 65</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th width="75%" >Total Contribution</th><th class="text-right" width="25%" >LKR {{ number_format($prem_data['summary']['total_premium']) }}</th>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="4">The following percentages of Basic Contribution shall be allocated to the Investment Account</th>
                </tr>
                <tr>
                    <td width="40%" >Certificate Anniversary</td>
                    <td width="20%" class="text-center">1st Year</td>
                    <td width="20%" class="text-center">2nd Year</td>
                    <td width="20%" class="text-center">3rd Year onwards</td>
                </tr>
                <tr>
                    <td width="40%" >Allocation Rate (Term 14 and below)</td>
                    <td width="20%" class="text-center">20%</td>
                    <td width="20%" class="text-center">55%</td>
                    <td width="20%" class="text-center">98%</td>
                </tr>
                <tr>
                    <td width="40%" >Allocation Rate (Term 15 and above)</td>
                    <td width="20%" class="text-center">20%</td>
                    <td width="20%" class="text-center">40%</td>
                    <td width="20%" class="text-center">98%</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="width-100pc">
                <tr>
                    <th >Any supplementary cover contributions, shall not be allocated to the Investment Account.</th>
                </tr>
            </table>
        </div>
    </div>
</div>


<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="2">Other Chargers and Fees</th>
                </tr>
                <tr>
                    <td width="30%">Tabarru Charge</td>
                    <td width="70%">Tabarru Charge shall be charged based on current age and SAR*</td>
                </tr>
                <tr>
                    <td >Administration Fee</td>
                    <td >First year LKR 300 and increases each Certificate anniversary by 5%</td>
                </tr>
                <tr>
                    <td >Fund Management Charge</td>
                    <td >PMF - 1.35% per annum and GMF - 2.35% per annum</td>
                </tr>
                <tr>
                    <td >Fund Switching Fee</td>
                    <td >1st switch is free and 2nd LKR 250 per Certificate anniversary</td>
                </tr>
                <tr>
                    <td >Emegency withdrawal Fee</td>
                    <td >LKR 500 for each Emegency withdrawal</td>
                </tr>
                <tr>
                    <td >Certificate Fee</td>
                    <td >LKR 1,000 (one off payment)</td>
                </tr>
                 
            </table>
        </div>
    </div>
</div>

<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="width-100pc">
                <tr>
                    <td>*SAR refers to five times Basic Annual Contribtuion and Outstanding Contribution at payment point.</td>
                </tr>
                <tr>
                    <td>Tabarru Charge and Administration Fee shall be deducted from Investment Account at the payment point.</td>
                </tr>
                <tr>
                    <td>Fund Management Charge shall be charged on a daily basis by adjusting unit price. It may be revised depending on the.</td>
                </tr>
                <tr>
                    <td>experience of the Company, in the cost of administration of funds and such it may increase or decrease.</td>
                </tr>
                
            </table>
        </div>
    </div>
</div>

<div class="wrapper" style="margin-top: 18px;page-break-after: always;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="5">The following Surrender Charge shall be deducted from the Investment Account in the event of early termination</th>
                </tr>
                <tr>
                    <td width="40%" >Certificate Anniversary</td>
                    <td width="15%" class="text-center">1 to 3 Years</td>
                    <td width="15%" class="text-center">4 to 5 Years</td>
                    <td width="15%" class="text-center">6 to 10 Years</td>
                    <td width="15%" class="text-center">11 Year onwards</td>
                </tr>
                <tr>
                    <td>Surrender Charge (LKR)</td>
                    <td class="text-center">15,000</td>
                    <td class="text-center">10,000</td>
                    <td class="text-center">7,500</td>
                    <td class="text-center">5,000</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="wrapper" >
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="2">Benefit Payable</th>
                </tr>
                <tr>
                    <td width="30%">Payable at Maturity</td>
                    <td width="70%">Fund Value in the Investment Account plus surplus if any in the Tabarru fund</td>
                </tr>
                <tr>
                    <td >Payable on Death - Participant</td>
                    <td >Five Times The Annualized Basic Contribution Plus WI upto maturity Plus AFP If Obtained</td>
                </tr>
                <tr>
                    <td >Payable on Death - Child</td>
                    <td >Fund Value in the Investment Account at payment point</td>
                </tr>
            </table>
        </div>
    </div>
</div>


<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="bordered width-100pc">
                <tr>
                    <th colspan="9">Fund Illustration</th>
                </tr>
                <tr>
                    <th rowspan="2" class="text-center">
                        End of Year
                    </th>
                    <th rowspan="2" class="text-center">
                        Basic Contribution
                    </th>
                    <th rowspan="2" class="text-center">
                       Allocated Investment
                    </th>
                    <th colspan="2" class="text-center">
                        At 8% Return
                    </th>
                    <th colspan="2" class="text-center">
                        At 10% Return
                    </th>
                    <th colspan="2" class="text-center">
                        At 12% Return
                    </th>
                </tr>

                <tr>
                    <th class="text-center">
                        Fund Value
                    </th>
                    <th class="text-center">
                        Death Benefit
                    </th>
                    <th class="text-center">
                        Fund Value
                    </th>
                    <th class="text-center">
                        Death Benefit
                    </th>
                   <th class="text-center">
                        Fund Value
                    </th>
                    <th class="text-center">
                        Death Benefit
                    </th>
                </tr>

                <?php
                    for ($i = 1; $i <= (count($maturity_fund_values['low'][$fund_index])); $i++) {
                ?>
                    <tr>
                        <td class="text-center">
                        <?php echo $maturity_fund_values['low'][$fund_index][$i][0]; ?>
                        </td>
                        <td class="text-center">
                        <?php echo number_format($maturity_fund_values['low'][$fund_index][$i][1]); ?>
                        </td>
                        <td class="text-center">
                        <?php echo number_format($maturity_fund_values['low'][$fund_index][$i][2]); ?>
                        </td>
                        <td class="text-center">
                        <?php echo number_format($maturity_fund_values['low'][$fund_index][$i][3]); ?>
                        </td>
                        <td class="text-center">
                        <?php echo number_format($maturity_fund_values['low'][$fund_index][$i][4]); ?>
                        </td>
                        <td class="text-center">
                        <?php echo number_format($maturity_fund_values['medium'][$fund_index][$i][3]); ?>
                        </td>
                        <td class="text-center">
                        <?php echo number_format($maturity_fund_values['medium'][$fund_index][$i][4]); ?>
                        </td>
                        <td class="text-center">
                        <?php echo number_format($maturity_fund_values['high'][$fund_index][$i][3]); ?>
                        </td>
                        <td class="text-center">
                        <?php echo number_format($maturity_fund_values['high'][$fund_index][$i][4]); ?>
                        </td>
                    </tr>
                <?php }?>


            </table>
        </div>
    </div>
</div>
<br/>
<br/>
<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="width-100pc">
                <tr>
                    <td><STRONG>Important Note</STRONG></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>
                        In the event of death and liability is accepted Amana Takaful Life PLC  will pay Five times the Basic Annual Contribution as immediate lump sum payment and Waive Off Outstanding Basic Contribution. Your final return on maturity will  be based on the actual fund performance and other factors  such as early  encashment charge and the cost of Takaful Benefits. You should only	invest on this plan if you plan to pay your contribution for the complete term, as you may suffer a loss should you terminate this plan early. The rate of return in this document are for illustrative purposes only. The final fund value may be higher or lower depending on the market performance. This illustration is valid for thirty (30) days from the date of generation given above.
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="divTable">
        <div class="divTableCell" style="width: 100%;">
            <table class="width-100pc">
                <tr>
                    <th >Customer Declaration</th>
                </tr>
                <tr>
                    <td >I hereby certify that I have read and understood the above fund illustration</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<br/>
<br/>
<br/>
<div class="wrapper" style="page-break-after: always;">
    <div class="divTable">
        <div class="divTableCell" style="width: 80%;">
            <table class="width-100pc">
                
                <tr>
                    <td>
                    <strong>Customer's Signature</strong>
                    </td>

                    <td>
                        ...................................................................................
                    </td>
                
                    <td>
                        <strong>Date : </strong> 
                    </td>
                    <td>
                         {{ date('d/m/Y')}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


<div class="wrapper">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class=" width-100pc">
                <tr>
                    <th colspan="2">Notes applicable to this Quotation and Illustration</th>
                </tr>
                <tr>
                    <td width="2%">1</td>
                    <td width="98%">This quotation and illustration are for illustrative purposes only and does not form part of the Certificate.</td>
                </tr>
                <tr>
                    <td width="2%">2</td>
                    <td width="98%">Amana Takaful Life PLC will not guarantee the fund value payable on death or maturity or surrender as it is based on the actual performance of the fund.</td>
                </tr>
                <tr>
                    <td width="2%">3</td>
                    <td width="98%">Stated contributions are subject to  revision based on  declarations made in the proposal form  and the reports of the medical examination and/or laboratory tests where applicable.</td>
                </tr>
                <tr>
                    <td width="2%">4</td>
                    <td width="98%">If due contribution is not paid within the grace period of 30 days, the Certificate will lapse and no takaful benefit shall become payable.</td>
                </tr>
                <tr>
                    <td width="2%">5</td>
                    <td width="98%">The certificate cannot be surrendered (i.e. cancelled) until it completes three (03) years from the date of commencement of the plan. Even if a request is made to surrender, the surrender value (fund  value  minus  surrender  charge), if any will be paid only after completion of three (03) years.</td>
                </tr>
                <tr>
                    <td width="2%">6</td>
                    <td width="98%">Allocation charges, Tabarru  charge  for basic cover, supplementary  contributions  and  any  other chargers or  fees will not be refunded under any circumstances.</td>
                </tr>
                <tr>
                    <td width="2%">7</td>
                    <td width="98%">The attached  fund illustration is given for three different scenarios based on assumed rate of  returns and  do not represent the upper and lower limits of what you might receive.</td>
                </tr>
                <tr>
                    <td width="2%">8</td>
                    <td width="98%">For full details and conditions applicable to the Certificate please refer the Takaful Certificate.</td>
                </tr>
                <tr>
                    <td width="2%">9</td>
                    <td width="98%">The  quotation  is  valid only  for thirty (30) days  from  the  date of  Issue  or  until  next  birthday  whichever  is  earlier. And any alterations made on this quotation is invalid.</td>
                </tr>
                
            </table>
        </div>
    </div>
</div>

<br/>
<br/>
<br/>
<div class="wrapper" style="margin-top: 50px;">
    <div class="divTable">
        <div class="divTableCell" style="width: 100%;">
            <table class="width-100pc">
                <tr>
                    <th >Customer Declaration</th>
                </tr>
                <tr><td> &nbsp;</td></tr>
                <tr>
                    <td >I hereby certify that I have read and understood the information stated from pages 1-3.</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<br/>
<br/>
<br/>
<div class="wrapper" style="margin-top: 20px;">
    <div class="divTable">
        <div class="divTableCell" style="width: 80%;">
            <table class="width-100pc">
                
                <tr>
                    <td>
                    <strong>Customer's Signature</strong>
                    </td>

                    <td>
                        ...................................................................................
                    </td>
                
                    <td>
                        <strong>Date : </strong> 
                    </td>
                    <td>
                         {{ date('d/m/Y')}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<br/>
<br/>
<br/>

<div class="wrapper" style="margin-top: 50px;">
    <div class="divTable">
        <div class="divTableCell" style="width: 100%;">
            <table class="width-100pc">
                <tr>
                    <th >Details of Marketing Executive</th>
                </tr>
            </table>
        </div>
    </div>
</div>

<br/>
<br/>
<br/>

<div class="wrapper" style="margin-top: 20px;">
    <div class="divTable">
        <div class="divTableCell" style="width: 80%;">
            <table class="width-100pc">
                <tr>
                    <td>
                    <strong>Name</strong>
                    </td>

                    <td>
                        Dilshan Kumara
                    </td>
                
                    <td>
                        <strong>ME Code : </strong> 
                    </td>
                    <td>
                         {{ $quotationData['agent_code']}}
                    </td>
                </tr>
                
                <tr>
                    <td>
                    <strong>Signature of ME</strong>
                    </td>

                    <td>
                        ...................................................................................
                    </td>
                
                    <td>
                        <strong>Date : </strong> 
                    </td>
                    <td>
                         {{ date('d/m/Y')}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<br/>
<br/>
<br/>

<div class="wrapper" style="margin-top: 50px;">
    <div class="divTable">
        <div class="divTableCell" style="width: 100%;">
            <table class="width-100pc">
                <tr>
                    <th >Basic Medical Requirements for this Quotation - {{ $prem_data['medical_main_char'] }} </th>
                </tr>
                <tr>
                <td class="en-lang-text-pdf">
                    <?php if (is_array($prem_data['medical_main'])) {
                        foreach ($prem_data['medical_main'] as $medical) {
                    ?>
                    <tr>
                        <td class="en-lang-text-pdf">{{ $medical }} </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
            </table>
        </div>
    </div>
</div>

<div class="wrapper" style="margin-top: 18px;">
    <div class="divTable">
         <div class="divTableCell" style="width: 100%">
            <table class="width-100pc">
                <tr>
                    <td><STRONG>Important Note</STRONG></td>
                </tr>
                <tr>
                    <td>
                        ** The Requirements are subject to revision based on the total threshold and as per Amana Takaful underwriting procedures.
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<br/>

<htmlpagefooter name="page-footer">
    <div class="page_num">Page {PAGENO}</div>
</htmlpagefooter>
</body>
</html>