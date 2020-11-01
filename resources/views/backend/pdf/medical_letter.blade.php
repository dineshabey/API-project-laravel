<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Quotation</title>
    <style type="text/css">
    
    th {
            background-color: #f7f7f7;
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
            text-align: center;
        }
        td{
            padding-left: 5px !important;
            height: 20px;
            padding-right: 5px !important;

        }

        .bordered td {
            border-color: #959594;
            border-style: solid;
            border-width: 1px;
        }

        body{
            font-size: 12px !important;
            font-family: Roboto,"freesans",Helvetica,Arial,sans-serif;
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
        .wrapper{
            clear:both;
            margin-top:20px;
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
        .small_fontsize{
            font-size:10px !important; 
        }
        .medium_fontsize{
            font-size:14px !important; 
        }
        .large_fontsize{
            font-size:16px !important; 
        }
    </style>
</head>
<body>
<?php 
$prem_data = unserialize($quotationData['res_obj']); 
$parties = $quotationData['parties'];
?>

<?php if(isset($parties[0]) && $parties[0]=="Main" && is_array($prem_data['medical_main'])){
?>

<div class="wrapper">
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="width-100pc">
                        <tr>
                            <td width="40%" class="text-center">
                                <img src="{{public_path('img/backend/brand/logo.png')}}"
                                     style="height: 150px;">
                            </td>
                            <td width="60%" >
                                <b class="header-cols-big large_fontsize">{{ __('quo_pdf.backend.cmp_name') }}</b>
                                <br>
                                <b class="header-cols-sm">{{ __('quo_pdf.backend.cmp_adr1') }}</b>
                                <br> <span class="header-cols-sm">{{ __('quo_pdf.backend.cmp_adr2') }},</span>
                                <br> <span class="header-cols-sm">Tel : 0114793700 / Hot Line : 011-4384384 / Fax : 0114713800</span>
                                
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
            <td width="50%" class="header-cols-big" ><strong><?php echo $quotationData['str_hospital']; ?></strong></td>
            <td width="50%" class="text-right small_fontsize"><strong>Quotation No: {{ $quotationData['quote_no'] }} - {{ $quotationData['version'] }} </strong></td>
        </tr>
    </table>
</div>


<div class="wrapper text-center" style="page-break-after: always;">
    <table style="width:100%">
        <tr>
            <td>Dear Sir/Madam</td>
        </tr>
        <tr>
            <td width="100%" allign="text-cente">REQUEST FOR MEDICAL EXAMINATION REPORT(S) / LAB TESTS</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>We have received a proposal(s) for Life Assurance from </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%">
                    <tr> 
                        <td width="30%"><strong>Name</strong></td> <td width="5%"> : </td><td width="15%">{{ $quotationData['title'] }} {{ $quotationData['first_name'] }} {{ $quotationData['last_name'] }}</td></tr>
                        <td width="50%" colspan="3"><strong>&nbsp; Age (Years) : &nbsp;{{ $prem_data['age_main'] }}</strong></td> 
                    </tr>
                    <tr><td colspan="6">&nbsp;</td></tr>
                    <tr><td colspan="6">And would be obliged, if you could attend  the followings :</td></tr>
                    <tr> 
                        <td colspan="3"> <input type="checkbox"> Medical Examination Report(s) on the form(s) attached</td>
                        <td colspan="3"> <input type="checkbox"> Lab Tests (12 hours fasting is required for No.02, 03)</td>
                    </tr>
                </table>
                <table class="bordered width-100pc inter_tbl_spacing" style="width:100%">
                    <tr><td><strong>Medical Tests </strong></td></tr>
                    <?php
                        foreach($prem_data['medical_main'] as $medical){
                            echo "<tr><td>".$medical."</td></tr>";
                        }
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>We would appreciate if you could check and write the National Identity Card Number of the client and obtain signature in your presence and forward this letter with the medical reports along with the duly completed payment slip .</td>
        </tr>
        <tr>
            <td>
                <br/>
                <table style="width:100%;">
                    <tr> <td width="40%">----------------------------------------------------</td> <td width="30%">---------------------------------</td> <td width="30%" >----------------------------------------------------</td></tr>
                    <tr> <td>National Identity Card Number</td> <td> Date </td> <td>Signature of client</td></tr>
                </table>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>Kindly return the medical reports along with the duly completed payment slip to the attention of </td>
        </tr>
        <tr>
            <td>Manager- Life Underwriting</td>
        </tr>
        <tr>
            <td>Assuring you of our best attention at all times.</td>
        </tr>
        <tr>
            <td><strong>Tryonics (Pvt) Ltd</strong></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>Authorised Signatory</td>
        </tr>
        <tr>
            <td>Copy to: Mr./Ms ____________________________________________</td>
        </tr>
    </table>
</div>
<div class="wrapper text-center">
    <div style="page-break-after: always;">
        <table style="width:100%;">
            <tr>
                <td colspan="4"><strong>Payment Slip</strong></td>
            </tr>
            <tr> 
                <td>Quotation No: </td><td><strong>Quotation No: {{ $quotationData['quote_no'] }} - {{ $quotationData['version'] }} </td>
                <td>Name of the proposer:</td><td>{{ $quotationData['title'] }} {{ $quotationData['first_name'] }} {{ $quotationData['last_name'] }}</td>
            </tr>
        </table>
        <table style="width:100%;" >
            <tr>
                <td >
                    <table class="bordered width-100pc inter_tbl_spacing" style="width:100%">
                        <tr><td><strong>Medical Tests carried out</strong></td><td><strong>Medical Fees payable</strong></td></tr>
                        <?php
                            foreach($prem_data['medical_main'] as $medical){
                                echo "<tr><td>".$medical."</td><td>&nbsp;</td></tr>";
                            }
                        ?>
                        <tr><td> <strong>Total</strong></td><td>&nbsp;</td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td>
                    <table style="width:100%;" >
                        <tr>
                            <td width="40%"> Name of the medical officer/Laboratory : </td><td width="30%">-----------------</td>
                            <td width="15%"> Signature : </td><td width="15%">-----------------</td>
                        </tr>
                        <tr>
                            <td colspan="4"><br/> &nbsp;<br/></td>
                        </tr>
                        <tr>
                            <td> Tryonics Code No : </td><td>-----------------</td>
                            <td> Designation :  </td><td>-----------------</td>
                        </tr>
                        <tr>
                            <td colspan="4"><br/> &nbsp;<br/></td>
                        </tr>
                        
                        <tr>
                            <td colspan="3"></td>
                            <td> Rubber Stamp</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
 </div>
<?php
} 
?>

<!-- Spouse if enabled -->

<?php if(($prem_data['age_spouse']!="0") && ((isset($parties[0]) && $parties[0]=="Spouse" && is_array($prem_data['medical_spouse'])) || (isset($parties[1]) && $parties[1]=="Spouse" && is_array($prem_data['medical_spouse']))) ){
?>

<div class="wrapper" >
    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">
                    <table class="width-100pc">
                        <tr>
                            <td width="40%" class="text-center">
                                <img src="{{public_path('img/backend/brand/logo.png')}}"
                                     style="height: 150px;">
                            </td>
                            <td width="60%" >
                                <b class="header-cols-big large_fontsize">{{ __('quo_pdf.backend.cmp_name') }}</b>
                                <br>
                                <b class="header-cols-sm">{{ __('quo_pdf.backend.cmp_adr1') }}</b>
                                <br> <span class="header-cols-sm">{{ __('quo_pdf.backend.cmp_adr2') }},</span>
                                <br> <span class="header-cols-sm">Tel : 0114793700 / Hot Line : 011-4384384 / Fax : 0114713800</span>
                                
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
            <td width="50%" class="header-cols-big" ><strong><?php echo $quotationData['str_hospital']; ?></strong></td>
            <td width="50%" class="text-right small_fontsize"><strong>Quotation No: {{ $quotationData['quote_no'] }} - {{ $quotationData['version'] }} </strong></td>
        </tr>
    </table>
</div>


<div class="wrapper text-center">
    <table style="width:100%">
        <tr>
            <td>Dear Sir/Madam</td>
        </tr>
        <tr>
            <td width="100%" allign="text-cente">REQUEST FOR MEDICAL EXAMINATION REPORT(S) / LAB TESTS</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>We have received a proposal(s) for Life Assurance from </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%">
                    <tr> 
                        <td width="30%"><strong>Name</strong></td> <td width="5%"> : </td><td width="15%">{{ $quotationData['sp_title'] }} {{ $quotationData['sp_first_name'] }} {{ $quotationData['sp_last_name'] }}</td></tr>
                        <td width="50%" colspan="3"><strong>&nbsp; Age (Years) : &nbsp;{{ $prem_data['age_spouse'] }}</strong></td> 
                    </tr>
                    <tr><td colspan="6">&nbsp;</td></tr>
                    <tr><td colspan="6">And would be obliged, if you could attend  the followings :</td></tr>
                    <tr> 
                        <td colspan="3"> <input type="checkbox"> Medical Examination Report(s) on the form(s) attached</td>
                        <td colspan="3"> <input type="checkbox"> Lab Tests (12 hours fasting is required for No.02, 03)</td>
                    </tr>
                </table>
                <table class="bordered width-100pc inter_tbl_spacing" style="width:100%">
                    <tr><td><strong>Medical Tests </strong></td></tr>
                    <?php
                        foreach($prem_data['medical_spouse'] as $medical){
                            echo "<tr><td>".$medical."</td></tr>";
                        }
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>We would appreciate if you could check and write the National Identity Card Number of the client and obtain signature in your presence and forward this letter with the medical reports along with the duly completed payment slip .</td>
        </tr>
        <tr>
            <td>
                <br/>
                <table style="width:100%;">
                    <tr> <td width="40%">----------------------------------------------------</td> <td width="30%">---------------------------------</td> <td width="30%" >----------------------------------------------------</td></tr>
                    <tr> <td>National Identity Card Number</td> <td> Date </td> <td>Signature of client</td></tr>
                </table>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>Kindly return the medical reports along with the duly completed payment slip to the attention of </td>
        </tr>
        <tr>
            <td>Manager- Life Underwriting</td>
        </tr>
        <tr>
            <td>Assuring you of our best attention at all times.</td>
        </tr>
        <tr>
            <td><strong>Tryonics (Pvt) Ltd</strong></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>Authorised Signatory</td>
        </tr>
        <tr>
            <td>Copy to: Mr./Ms ____________________________________________</td>
        </tr>
    </table>
</div>
<div class="wrapper text-center">
    <div style="page-break-before: always;">
        <table style="width:100%;">
            <tr>
                <td colspan="4"><strong>Payment Slip</strong></td>
            </tr>
            <tr> 
                <td>Quotation No: </td><td><strong>Quotation No: {{ $quotationData['quote_no'] }} - {{ $quotationData['version'] }} </td>
                <td>Name of the proposer:</td><td>{{ $quotationData['sp_title'] }} {{ $quotationData['sp_first_name'] }} {{ $quotationData['sp_last_name'] }}</td>
            </tr>
        </table>
        <table style="width:100%;" >
            <tr>
                <td >
                    <table class="bordered width-100pc inter_tbl_spacing" style="width:100%">
                        <tr><td><strong>Medical Tests carried out</strong></td><td><strong>Medical Fees payable</strong></td></tr>
                        <?php
                            foreach($prem_data['medical_spouse'] as $medical){
                                echo "<tr><td>".$medical."</td><td>&nbsp;</td></tr>";
                            }
                        ?>
                        <tr><td> <strong>Total</strong></td><td>&nbsp;</td></tr>
                    </table>
                </td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <td>
                    <table style="width:100%;" >
                        <tr>
                            <td width="40%"> Name of the medical officer/Laboratory : </td><td width="30%">-----------------</td>
                            <td width="15%"> Signature : </td><td width="15%">-----------------</td>
                        </tr>
                        <tr>
                            <td colspan="4"><br/> &nbsp;<br/></td>
                        </tr>
                        <tr>
                            <td> Tryonics Code No : </td><td>-----------------</td>
                            <td> Designation :  </td><td>-----------------</td>
                        </tr>
                        <tr>
                            <td colspan="4"><br/> &nbsp;<br/></td>
                        </tr>
                        
                        <tr>
                            <td colspan="3"></td>
                            <td> Rubber Stamp</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
 </div>

<?php
} 
?>





</body>
</html>