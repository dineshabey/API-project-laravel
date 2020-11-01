<html>

<head>
	<style type="text/css">
		/* Common table */
		.rTable {
			display: table;
			width: 100%;
		}

		h2,
		h3 {
			text-align: center;
			color: red;
			padding: 3px;
			font-family: Arial, Helvetica, sans-serif;
			font-style: italic;
		}

		/* Form headers */
		h5 {
			background-color: #008000;
			color: white;
			padding: 3px;
			font-family: Arial, Helvetica, sans-serif;
		}

		.border {
			background-color: #008000;
			padding: 15px;
			margin-bottom: auto;
		}

		p {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 11px;
		}

		.line {
			height: auto;
			padding: 10px;
			border: 5px solid green;
		}

		p.intro {
			text-align: center;
			font-style: italic;
		}

		p.instruction {
			font-weight: bold;
			margin-left: 15em
		}

		/* Signature */
		.middle {
			margin: auto;
			width: 60%;
			border: 1px solid black;
			padding: 30px;
			font-weight: bold;
			color: black;
		}

		/*Signature Box */
		.divSignature {
			float: left;
			display: table-column;
			margin-left: 20%;
			width: 30%;
			font-family: Arial, Helvetica, sans-serif;
		}

		/* Signatiure Box */
		.divSignature2 {
			float: left;
			display: table-column;
			width: 95%;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 13px;
			font-weight: bold;
			text-align: center;
		}

		/* print the date of declaration section */
		.rDateCell {
			display: table-column;
			float: left;
			height: 15px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			padding: 3px 1.8%;
			width: 10%;
			font-size: 13px;
		}

		/* Common table row */
		.rTableRow {
			display: table-row;
			font-size: 11px;
			font-family: Arial, Helvetica, sans-serif;
			height: auto;
			overflow: hidden;
			position: relative;
			clear: both;
		}

		/* Table header green color */
		.th-col-w2,
		.th-col-w2-h60,
		.th-col-w5,
		.th-col-w5-h60,
		.th-col-w7,
		.th-col-w8,
		.th-col-w8-h60,
		.th-col-w10,
		.th-col-w10-end,
		.th-col-w10-40,
		.th-col-w10-h45,
		.th-col-w10-h60,
		.th-col-w12,
		.th-col-w18,
		.th-col-w18-end,
		.th-col-w25,
		.th-col-w26-h60-end,
		.th-col-w28-h45,
		.th-col-w28-h60,
		.th-col-w28,
		.th-col-w32-h45-end,
		.th-col-w35-h60,
		.th-col-w40,
		.th-col-w42,
		.th-col-w45-h60-end,
		.th-col-w50-end,
		.th-col-w58,
		.th-col-w71,
		.th-col-w78,
		.th-col-w100-end,

		.th-col-w26-w2-merged,
		.th-col-w36,
		.th-col-w36-end {
			background-color: #D5F5E3;
			font-weight: bold;
		}

		/* Table normal row column width 45% borderless */
		.tr-col-w45-hAuto-borderless {
			display: table-cell;
			float: left;
			height: auto;
			overflow: hidden;
			padding: 3px;
			width: 45%;
			text-align: left;
		}

		.tr-col-w45-hAuto-borderless-end {
			display: table-cell;
			float: right;
			height: auto;
			overflow: hidden;
			padding: 3px;
			width: calc(45%);
			text-align: right;
		}

		/** Table Head Column W2 H30 **/
		.th-col-w2 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 4%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W5 H60 **/
		.th-col-w5-H60 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 80px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 5%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W7 H30 **/
		.th-col-w7 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 7%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W10 H30 **/
		.th-col-w10 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 10%;
			font-size: 11px;
			padding: 5px;
			text-align: center;
		}

		/** Table Head Column W10 H60 **/
		.th-col-w10-h60 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 80px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 10%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W10 H45 **/
		.th-col-w10-h45 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 45px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 10%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W10 H30 END **/
		.th-col-w10-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(10%);
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W12 H30 **/
		.th-col-w12 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			padding: 3px 1.8%;
			width: 12%;
			font-size: 11px;
		}

		/** Table Head Column W18 H30 **/
		.th-col-w18 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 18%;
			font-size: 11px;
			padding: 5px;
			text-align: center;
		}

		/** Table Head Column W18 H30 END **/
		.th-col-w18-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(18%);
			font-size: 11px;
			text-align: center;
			padding: 5px;
		}

		/** Table Head Column W25 H30 **/
		.th-col-w25 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 25%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W28 H30 **/
		.th-col-w28 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 18%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W28 H60 **/
		.th-col-w28-h60 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 60px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 28%;
			font-size: 11px;
			font-weight: bold;
			padding: 5px;
		}

		/** Table Head Column W35 H60 **/
		.th-col-w35-h60 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 80px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 35%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W36 H30 **/
		.th-col-w36 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 36%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W36 H30 END **/
		.th-col-w36-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(36%);
			font-size: 11px;
			padding: 5px;
		}

		.th-col-w40 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 40%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W28 H45 **/
		.th-col-w28-h45 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 45px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 28%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W32 H45 END **/
		.th-col-w32-h45-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 45px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(32%);
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W42 H30 **/
		.th-col-w42 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 42%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W45 H60 END **/
		.th-col-w45-h60-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 80px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(45%);
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W50 H30 END **/
		.th-col-w50-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(50%);
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W58 H30 **/
		.th-col-w58 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 58%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W71 H30 **/
		.th-col-w71 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 71%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W78 H30 **/
		.th-col-w78 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			padding: 5px;
			width: 78%;
			font-size: 11px;
		}

		/** Table Head Column W100 H30 END **/
		.th-col-w100-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(100%);
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W2 H30 **/
		.tr-col-w2 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 4%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W5 H30 **/
		.tr-col-w5 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 5%;
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W10 H30 */
		.tr-col-w10 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 10%;
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W10 H30 END */
		.tr-col-w10-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(10%);
			font-size: 11px;
			padding: 5px;
		}


		/* Table Normal Column W12 H30 */
		.tr-col-w12 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			padding: 3px 1.8%;
			width: 12%;
			font-size: 11px;
		}

		/* Table Normal Column W18 H30 */
		.tr-col-w18 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 18%;
			text-align: right;
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W18 H30 END */
		.tr-col-w18-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(18%);
			font-size: 11px;
			padding: 5px;
			text-align: right;
		}

		/* Table Normal Column W18 H60 */
		.tr-col-w18-h60 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 60px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 18%;
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W18 H60 END */
		.tr-col-w18-h60-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 60px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(18%);
			font-size: 11px;
			text-align: right;
			padding: 5px;
		}

		/* Table Normal Column W22 H30 END */
		.tr-col-w22-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(22%);
			font-size: 11px;
			padding: 5px;
			text-align: right;
		}

		/* Table Normal Column W28 H30 */
		.tr-col-w28 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			padding: 5px;
			width: 28%;
			font-size: 11px;
		}

		/* Table Normal Column W32 H30 END */
		.tr-col-w32-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(32%);
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W35 H30 **/
		.tr-col-w35 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 35%;
			font-size: 11px;
			padding: 5px;
		}


		/* Table Normal Column W36 H30 */
		.tr-col-w36 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 36%;
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W36 H30 END */
		.tr-col-w36-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(36%);
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W40 H30 */
		.tr-col-w40 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 40%;
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W44 H30 END */
		.tr-col-w44-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(40%);
			text-align: right;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W45 H30 **/
		.tr-col-w45-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(45%);
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W45 H50 **/
		.tr-col-w45-h50 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 50px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 50%;
			font-size: 11px;
			padding: 5px;
		}

		/** Table Head Column W45 H50 END **/
		.tr-col-w45-h50-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 50px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(50%);
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W58 H60 */
		.tr-col-w58-h60 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 60px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: 58%;
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W72 H30 END */
		.tr-col-w72-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(72%);
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W72 H60 END */
		.tr-col-w72-h60-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 60px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(72%);
			font-size: 11px;
			padding: 5px;
		}

		/* Table Normal Column W78 H30 */
		.tr-col-w78 {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			padding: 5px;
			width: 78%;
			font-size: 11px;
		}

		/* Table Normal Column W91 H30 */
		.tr-col-w91-end {
			display: table-cell;
			border: .5px solid #999999;
			float: left;
			height: 30px;
			font-family: Arial, Helvetica, sans-serif;
			overflow: hidden;
			width: calc(91%);
			text-align: right;
			font-size: 11px;
			padding: 5px;
		}
	</style>
</head>

<body>
	<?php
	// Check spouse available
	$is_spouse = ($proposalData['prop_insured_spouse_info']->has_spouse == 'Yes') ? true : false;
	// Female available (Proposer/Spouse)
	$is_female = (isset($proposalData['prop_female_only_quest_info'][0]->proposal_id) || isset($proposalData['prop_female_only_quest_info'][1]->proposal_id)) ? true : false; // is female 
	?>

	<!-- Top Logo's - ATL Logo and product logo -->
	<div class="rTable">
		<div class="rTableRow">
			<div class="tr-col-w45-hAuto-borderless">
				<!-- To Do : Product Logo Here -->
				<?php
				if ($proposalData['prop_insured_spouse_info']->product == 'Surakshitha') {

				?>
					<img src="{{public_path('img/backend/brand/surakshitha_logo.png')}}" width="197" height="85">
				<?php } elseif ($proposalData['prop_insured_spouse_info']->product == 'Platinum') { ?>
					<img src="{{public_path('img/backend/brand/product_logo.png')}}" width="197" height="84">
				<?php } ?>
			</div>

			<div class="tr-col-w45-hAuto-borderless-end">
				<!-- To Do : ATL Logo Here -->
				<img src="{{public_path('img/backend/brand/logo.png')}}" width="200" height="65">
			</div>
		</div>
	</div>

	<div class="line">

		<!-- Proposal No, Certificate No, Effective Date Table -->
		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w12">PROPOSAL NO.</div>
				<div class="tr-col-w12"></div>

				<div class="th-col-w12">CERTIFICATE NO.</div>
				<div class="tr-col-w12"></div>

				<div class="th-col-w12">EFFECTIVE DATE</div>
				<div class="tr-col-w12"></div>
			</div>
		</div>

		<!-- Plan Title -->
		<h2>PROPOSAL FORM FOR <br />
			<?php
			if ($proposalData['prop_insured_spouse_info']->product == 'Surakshitha') {
				echo "SURAKSHITHA TAKAFUL PLAN";
			}elseif($proposalData['prop_insured_spouse_info']->product == 'Platinum'){
				echo "PLATINUM TAKAFUL PLAN";
			}

			?>

		</h2>

		<!-- Cover Page Header (Strictly confidential) -->
		<p class="intro"><b>All information provided will be treated as</b></p>
		<h3>STRICTLY CONFIDENTIAL</h3>

		<!-- Plan Paragraph 1 -->
		<p>A refreshingly new but simple concept is what Takaful is in a nutshell. Amana Takaful Insurance has been in the forefront of spreading the word of the Takaful way of insurance that has grown to be liked by many and revered by all. The deep rooted belief we have is that taking care of one another is the single most strength of mankind. We operate a concept that brings together people, like you, together to be a part of a system that gives the opportunity for the fortunate many to help an unfortunate few. We extend our invitation to you to be a part of this re-definition of the way you have known insurance to be. We offer an array of innovative solutions for individuals, families and businesses.</p>
		<!-- Plan Paragraph 2 -->
		<p>The versatility of the product range is also a strength that helps us satisfy our customer’s needs. We see our people as ambassadors of ‘Takaful’ and the drivers of our business. They take forward the solemn principles of partnership, contribution and transparency to better serve the needs of customers. We are geared to face the future with you, with an evolved concept of insurance that can help you manage your financial risks.</p>
		<!-- Cover Page Header 2 (Office use only) -->
		<h5 align="center"><i>FOR OFFICIAL USE ONLY</i></h5>

		<!-- ME code, ME's Name, Reciept No Table -->
		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w12">ME CODE</div>
				<div class="tr-col-w12"></div>

				<div class="th-col-w12">ME’s NAME</div>
				<div class="tr-col-w12"></div>

				<div class="th-col-w12">RECEIPT NO.</div>
				<div class="tr-col-w12"></div>
			</div>
		</div>
		<!-- Cover Page Header 3 (Instructions) -->
		<h5 align="center">INSTRUCTIONS</i></h5>
		<!-- Instructions list -->
		<p class="instruction">
			1. Complete all questions using block letters and mark ‘Yes’ ☑ or ‘No’ ☒ for the relevant questions.<br />
			2. Do not use correction fluid. <br />
			3. Ensure to place your signature against any alteration. <br />
		</p>

		<p class="border"></p>
	</div>

	<!-- PAGE BREAK -->
	<p style="page-break-after: always;">&nbsp;</p>

	<!-- Page 2 - Paragraph 1 -->
	<p style="color:red">You are to disclose in this Proposal form, fully and faithfully, all the facts which you know or ought to know, otherwise the Certificate issued hereunder may be void.</p>
	<!-- Page 2 - Paragraph 2 -->
	<p style="color:red">TO BE COMPLETED ONLY IF SPOUSE CRITICAL ILLNESS COVER / COMPREHENSIVE HOSPITALIZATION COVER / SPOUSE FAMILY RIDER COVER IS OBTAINED
		SPOUSE AND/OR CHILDREN DETAILS TO BE COMPLETED IN QUESTIONS V, VI, VII & VIII ONLY, IF COMPREHENSIVE HOSPITALIZATION/ SPOUSE FAMILY RIDER / SPOUSE CRITICAL ILLNESS COVER IS OBTAINED
	</p>

	<!-- Header : I./II.THE PROPOSER/ SPOUS -->
	<h5> I./II.THE PROPOSER/ SPOUSE</h5>

	<!-- START - I./II.THE PROPOSER/ SPOUSE -->
	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w28"></div>
			<div class="th-col-w36" align="center">PROPOSER</div>
			<div class="th-col-w36-end" align="center">SPOUSE</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">TITLE</div>
			<div class="tr-col-w36">&nbsp;{{ $proposalData['prop_insured_spouse_info']->title }} </div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_title }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">FIRST NAME</div>
			<div class="tr-col-w36">&nbsp; {{ $proposalData['prop_insured_spouse_info']->first_name }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_first_name }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">MIDDLE NAME</div>
			<div class="tr-col-w36">&nbsp; {{ $proposalData['prop_insured_spouse_info']->middle_name }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_middle_name }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">LAST NAME</div>
			<div class="tr-col-w36">&nbsp; {{ $proposalData['prop_insured_spouse_info']->last_name }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_last_name }}</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w28">HOME ADDRESS</div>
			<div class="tr-col-w72-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->add_line_1 }} {{ $proposalData['prop_insured_spouse_info']->add_line_2 }} &nbsp;{{ $proposalData['prop_insured_spouse_info']->city }}</div>
		</div>
		<div class="rTableRow">
			<div class="th-col-w28">RECIDENCE NO</div>
			<div class="tr-col-w72-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->residence_no }}</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w28">MOBILE</div>
			<div class="tr-col-w36">&nbsp;{{ $proposalData['prop_insured_spouse_info']->mobile_no }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_mobile_no }}</div>
		</div>
		<div class="rTableRow">
			<div class="th-col-w28">E-MAIL</div>
			<div class="tr-col-w36">&nbsp;{{ $proposalData['prop_insured_spouse_info']->email }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_email }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">NIC NO</div>
			<div class="tr-col-w36">&nbsp;{{ $proposalData['prop_insured_spouse_info']->nic }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_nic }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">DATE OF BIRTH</div>
			<div class="tr-col-w36">&nbsp;{{ $proposalData['prop_insured_spouse_info']->dob }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_dob }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">GENDER </div>
			<div class="tr-col-w36">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->gender) }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->sp_gender) }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">AGE NEXT BIRTHDAY</div>
			<div class="tr-col-w36"> &nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->age) }} YEARS</div>
			<div class="tr-col-w36-end"> &nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->sp_age) }} YEARS</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">RELIGION </div>
			<div class="tr-col-w36">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->religion) }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->sp_religion) }}</div>
		</div>
	</div>
	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w28">MARITAL STATUS</div>
			<div class="tr-col-w72-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->civil_status) }}</div>
		</div>
	</div>

	<!-- PAGE BREAK -->
	<p style="page-break-after: always;">&nbsp;</p>

	<!-- CONTINUED - I./II.THE PROPOSER/ SPOUSE -->
	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w28">CITIZENSHIP</div>
			<div class="tr-col-w36">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->citizenship) }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->sp_citizenship) }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">HEIGHT :FEET / INCHES</div>
			<div class="tr-col-w36">{{ $proposalData['prop_good_health_quest_info'][0]->quest_height_in }}cm</div>
			<div class="tr-col-w36-end">{{ $proposalData['prop_good_health_quest_info'][0]->quest_height_sp }}cm</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">WEIGHT : KG</div>
			<div class="tr-col-w36">{{ $proposalData['prop_good_health_quest_info'][0]->quest_weight_in }}kg</div>
			<div class="tr-col-w36-end">{{ $proposalData['prop_good_health_quest_info'][0]->quest_weight_sp }}kg</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w28-h60">DETAILS OF ANY PUBLIC POSITIONS HELD (CURRENT/PREVIOUS) <br />(Eg: Member of Parliament / Provincial Council / Pradeshiya Sabha / Local Government) </div>
			<div class="tr-col-w72-h60-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->public_position_held) }}</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w28">OCCUPATION </div>
			<div class="tr-col-w36">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->occupation) }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->sp_occupation) }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">EXACT NATURE OF DUTIES </div>
			<div class="tr-col-w36">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->nature_of_duties) }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->sp_nature_of_duties) }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">MONTHLY INCOME </div>
			<div class="tr-col-w36">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->monthly_income) }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->sp_monthly_income) }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w28">NAME AND ADDRESS OF EMPLOYER OR WORK PLACE OR SELF EMPLOYMENT</div>
			<div class="tr-col-w36">&nbsp;{{ $proposalData['prop_insured_spouse_info']->employer_name }}, {{ $proposalData['prop_insured_spouse_info']->emp_address_1 }}, {{ $proposalData['prop_insured_spouse_info']->emp_address_2 }}, {{ $proposalData['prop_insured_spouse_info']->emp_city }}, {{ $proposalData['prop_insured_spouse_info']->emp_country }}</div>
			<div class="tr-col-w36-end">&nbsp;{{ $proposalData['prop_insured_spouse_info']->sp_employer_name }}, {{ $proposalData['prop_insured_spouse_info']->sp_emp_address_1 }}, {{ $proposalData['prop_insured_spouse_info']->sp_emp_address_2 }}, {{ $proposalData['prop_insured_spouse_info']->sp_emp_city }}, {{ $proposalData['prop_insured_spouse_info']->sp_emp_country }}</div>
		</div>
	</div>
	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w28">CONTRIBUTION PAID BY</div>
			<div class="tr-col-w72-end">&nbsp;{{ strtoupper($proposalData['prop_insured_spouse_info']->contribution_paid_by) }}</div>
		</div>
	</div>
	<!-- END - I./II.THE PROPOSER/ SPOUSE -->

	<p style="page-break-after: always;">&nbsp;</p>

	<!-- START - III.PROTECTION |  LIVING BENEFITS -->
	<h5>III.PROTECTION | LIVING BENEFITS </h5>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w18">&nbsp;</div>
			<div class="th-col-w58">&nbsp;</div>
			<div class="th-col-w18-end">BASIC CONTRIBUTION</div>
		</div>

		<div class="rTableRow">
			<div class="tr-col-w18-h60">1. BASIC TAKAFUL COVER :</div>
			<div class="tr-col-w58-h60">IN THE EVENT OF DEATH OR PERMANENT TOTAL DISABILITY OF PARTICIPANT THE FUTURE BASIC CONTRIBUTIONS WILL BE WAIVED OFF WITH IMMEDIATE EFFECT UNTIL THE DATE OF MATURITY AND A LUMP SUM OF FIVE TIMES THE ANNUAL BASIC CONTRIBUTION WILL BECOME PAYABLE.</div>
			<div class="tr-col-w18-h60-end">&nbsp;{{ number_format($proposalData['prop_insured_spouse_info']->monthly_basic_premium,0) }}</div>
		</div>
	</div>

	<p style="color:red;text-align:center;">IN THE EVENT OF DEATH OF THE CHILD ONLY THE FUND VALUE WILL BECOME PAYABLE.</p>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w58">2. ADDITIONAL COVERS (If required) </div>
			<div class="th-col-w18">AMOUNT OF ADDITIONAL COVERS </div>
			<div class="th-col-w18-end">ADDITIONAL CONTRIBUTIONS </div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(a) PERMANENT TOTAL DISABILITY </span></b></div>
			<div class="tr-col-w18">{{ isset($proposalData['prop_insured_benefit_info']['PTD']->sum_assured) && $proposalData['prop_insured_benefit_info']['PTD']->sum_assured != '' ? number_format($proposalData['prop_insured_benefit_info']['PTD']->sum_assured, 0) : "-" }}</div>
			<div class="tr-col-w18-end">{{ isset($proposalData['prop_insured_benefit_info']['PTD']->premium) && $proposalData['prop_insured_benefit_info']['PTD']->premium != '' ? number_format($proposalData['prop_insured_benefit_info']['PTD']->premium, 2) : "-" }}</div>
		</div>
	</div>
	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(b) PERSONAL ACCIDENT COVER </span></b></div>
			<div class="tr-col-w18">{{ isset($proposalData['prop_insured_benefit_info']['PA']->sum_assured) && $proposalData['prop_insured_benefit_info']['PA']->sum_assured != '' ? number_format($proposalData['prop_insured_benefit_info']['PA']->sum_assured, 0) : "-" }}</div>
			<div class="tr-col-w18-end">{{ isset($proposalData['prop_insured_benefit_info']['PA']->premium) && $proposalData['prop_insured_benefit_info']['PA']->premium != '' ? number_format($proposalData['prop_insured_benefit_info']['PA']->premium, 2) : "-" }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(c) ADDITIONAL FAMILY PROTECTION </b></div>
			<div class="tr-col-w18">{{ isset($proposalData['prop_insured_benefit_info']['AFP']->sum_assured) && $proposalData['prop_insured_benefit_info']['AFP']->sum_assured != '' ? number_format($proposalData['prop_insured_benefit_info']['AFP']->sum_assured, 0) : "-" }}</div>
			<div class="tr-col-w18-end">{{ isset($proposalData['prop_insured_benefit_info']['AFP']->premium) && $proposalData['prop_insured_benefit_info']['AFP']->premium != '' ? number_format($proposalData['prop_insured_benefit_info']['AFP']->premium, 2) : "-" }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(d) CRITICAL ILLNESS COVER - PROPOSER</b></div>
			<div class="tr-col-w18">{{ isset($proposalData['prop_insured_benefit_info']['CI']->sum_assured) && $proposalData['prop_insured_benefit_info']['CI']->sum_assured != '' ? number_format($proposalData['prop_insured_benefit_info']['CI']->sum_assured, 0) : "-" }}</div>
			<div class="tr-col-w18-end">{{ isset($proposalData['prop_insured_benefit_info']['CI']->premium) && $proposalData['prop_insured_benefit_info']['CI']->premium != '' ? number_format($proposalData['prop_insured_benefit_info']['CI']->premium, 2) : "-" }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(e) SPOUSE CRITICAL ILLNESS COVER </b></div>
			<div class="tr-col-w18"></div>
			<div class="tr-col-w18-end"></div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(f) SPOUSE FAMILY RIDER COVER</b></div>
			<div class="tr-col-w18"></div>
			<div class="tr-col-w18-end"></div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(g) CHILD FAMILY RIDER COVER</b></div>
			<div class="tr-col-w18"></div>
			<div class="tr-col-w18-end"></div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(h) HOSPITALIZATION COMPREHENSIVE BENEFIT (INDIVIDUAL/PARENTS)</b></div>
			<div class="tr-col-w18">{{ isset($proposalData['prop_insured_benefit_info']['HB']->sum_assured) && $proposalData['prop_insured_benefit_info']['HB']->sum_assured != '' ? number_format($proposalData['prop_insured_benefit_info']['HB']->sum_assured, 0) : "-" }}</div>
			<div class="tr-col-w18-end">{{ isset($proposalData['prop_insured_benefit_info']['HB']->premium) && $proposalData['prop_insured_benefit_info']['HB']->premium != '' ? number_format($proposalData['prop_insured_benefit_info']['HB']->premium, 2) : "-" }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b><span style="margin-left:1em">(i) WAIVER OF INSTALLMENT </b></div>
			<div class="tr-col-w18">{{ isset($proposalData['prop_insured_benefit_info']['WI']->sum_assured) && intval($proposalData['prop_insured_benefit_info']['WI']->sum_assured) > 0 ? "YES" : "NO" }}</div>
			<div class="tr-col-w18-end">{{ isset($proposalData['prop_insured_benefit_info']['WI']->sum_assured) && intval($proposalData['prop_insured_benefit_info']['WI']->premium) > 0 ? number_format($proposalData['prop_insured_benefit_info']['WI']->premium, 2) : "-" }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b>3.TOTAL AMOUNT OF THE TAKAFUL CONTRIBUTION</b></div>
			<div class="tr-col-w18">&nbsp;</div>
			<div class="tr-col-w18-end">&nbsp; {{ intval($proposalData['prop_insured_spouse_info']->total_premium) > 0 ? number_format($proposalData['prop_insured_spouse_info']->total_premium, 2) : "-" }}</div>
		</div>
	</div>

	<?php

	$payment_mode = '';
	switch ($proposalData['prop_insured_spouse_info']->payment_method) {
		case 'M':
			$payment_mode = 'MONTHLY';
			break;
		case 'Q':
			$payment_mode = 'QUARTERLY';
			break;
		case 'H':
			$payment_mode = 'HALF YEARLY';
			break;
		case 'A':
			$payment_mode = 'ANNUALLY';
	}
	?>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w58"><b>5.TERM OF PARTICIPATION</b></div>
			<div class="tr-col-w36-end">&nbsp; {{ $proposalData['prop_insured_spouse_info']->policy_term != '' ? $proposalData['prop_insured_spouse_info']->policy_term : "-" }} YEARS &nbsp;</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w58"><b>6.MODE OF PAYMENT </b></div>
			<div class="tr-col-w36-end">&nbsp; {{ $payment_mode != '' ? $payment_mode : "-" }} &nbsp;</div>
		</div>
	</div>

	<!-- END - III.PROTECTION |  LIVING BENEFITS -->

	<!-- PAGE BREAK -->
	<p style="page-break-after: always;">&nbsp;</p>

	<!-- START - IV. INVESTMENT FUND -->
	<h5> IV. INVESTMENT FUND </h5>

	<div class="rTable">
		<div class="rTableRow">
			<div class="tr-col-w78">CURRENTLY TWO INVESTMENT FUND TYPES ARE AVAILABLE. PLEASE SELECT (TICK) THE REQUIRED FUND TYPE FROM ONE OF THE FOLLOWING:</div>
			<div class="tr-col-w18-end">&nbsp; {{ $proposalData['prop_insured_spouse_info']->fund_type != '' ? $proposalData['prop_insured_spouse_info']->fund_type : "-" }} &nbsp;</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w100-end">DESCRIPTION OF FUNDS</div>
		</div>
	</div>
	<div class="rTable">
		<div class="rTableRow">
			<div class="tr-col-w45-h50"><strong>PROTECTED MULTIPLE FUND:</strong> Amana Takaful Protected Multiple Fund invests only in Shari’ah compliant income securities. It does not invest in equities. The returns are not guaranteed, and are subject to market risks. Please obtain further details if required</div>
			<div class="tr-col-w45-h50-end"><strong>GROWTH MULTIPLE FUND: </strong> Amana Takaful Growth Multiple Fund invests in Shari’ah compliant income securities and equity. The returns are not guaranteed, and it will depend on the market performance of the funds. The Growth Multiple Fund has greater investment return risk than the Protected Multiple Fund. Please obtain further details if required.</div>
		</div>
		<div class="rTableRow">
			<div class="tr-col-w45-h50"><strong>STABLE MULTIPLE FUND:</strong> Amana Takaful Stable Multiple Fund invests in Shariah compliant investment instruments. A maximum amount of 10% can be invested in equities. The returns are not guaranteed and are subject to market risks. Please obtain further details if required.</div>
			<div class="tr-col-w45-h50-end"><strong>VOLATILE MULTIPLE FUND: </strong> Amana Takaful Volatile Multiple Fund invests in Shariah compliant investment instruments. A maximum amount of 90% can be invested in equities. The returns are not guaranteed and are subject to market risks. Volatile Multiple Fund has greater investment return risk. Please obtain further details if required.</div>
		</div>
	</div>
	<div class="rTable">
		<div class="rTableRow">
			<div class="tr-col-w45-h50"><strong>GOLD MULTIPLE FUND:</strong> The investment objective of the Gold Multiple Fund is to provide a return linked with changes in gold prices. The fund will aim to invest up to a maximum of 90% in gold and the balance in Shari’ah compliant money-market instruments. The fund is suitable for investors who want to invest in a gold-backed fund and have the option of redeeming the fund value in physical gold and or cash equivalent (in LKR) . Currency fluctuations, International Gold prices, USD exchange rate, custom duty and other charges will affect fund price along with gold prices. The company will not guarantee the returns, and it will depend on the performance of the funds</div>
		</div>
	</div>

	<p> • <b>INVESTMENT RISK: </b>Amana Takaful Life PLC will not guarantee the fund value as it is based on the actual performance of the fund. The given illustration is based on assumed rate of returns and do not represent the upper and lower limits of what you might receive.</p>

	<p style="color:red; text-align:center;">I HEREBY DECLARE THAT I AM FULLY AWARE OF THE INHERENT RISK WHICH LIES UNDER GROWTH MULTIPLE FUND.</p>

	<div class="rTable">
		<div class="rTableRow">
			<div class="divSignature">
				<div class="middle" align="center"><img src="{{$proposalData['prop_insured_spouse_info']->sig_data_insured}}" alt="Insured Signature" height="50%" width="50%"></div>
				<div class="divSignature2" align="center"> SIGNATURE OF PROPOSER</div>
			</div>

			<div class="rDateCell" align="right"><b>DATE</b></div>
			<div class="rDateCell">13/01/2020</div>
		</div>
	</div>
	<!-- END - IV. INVESTMENT FUND -->

	<!-- START - V. OTHER TAKAFUL / INSURANCE PLANS -->

	<h5>V. OTHER TAKAFUL / INSURANCE PLANS </h5>

	<p style="color:red;">If you answer “YES” to any of the following questions, you should provide full details below</p>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w78"></div>
			<div class="th-col-w10">PROPOSER</div>
			<div class="th-col-w10-end">SPOUSE</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w78">1. Do you have any previous insurance policies / Certificates with this Company or any other insurance company?</div>
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_in == "Y" ? "YES" : "NO" }}</div>
			<div class="tr-col-w10-end">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_sp == "Y" ? "YES" : "NO" }}</div>
		</div>

		<div class="rTableRow">
			<div class="th-col-w78">2. Has a proposal ever been declined, withdrawn, deferred or accepted only on special terms by this Company or any other insurance company?</div>
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->life_application_declined_in == "Yes" ? "YES" : "NO" }}</div>
			<div class="tr-col-w10-end">{{ $proposalData['prop_prev_life_policy_data'][0]->life_application_declined_sp == "Yes" ? "YES" : "NO" }}</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w10-h45">PROPOSER/SPOUSE</div>
			<div class="th-col-w28-h45">NAME OF THE INSURANCE COMPANY </div>
			<div class="th-col-w10-h45">POLICY/PROPOSAL NUMBER</div>
			<div class="th-col-w10-h45">SUM ASSURED</div>
			<div class="th-col-w10-h45">DATE</div>
			<div class="th-col-w32-h45-end">REASON</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_in == "Y" ? "PROPOSER" : "" }}</div>
			<div class="tr-col-w28">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_in == "Y" ? strtoupper($proposalData['prop_prev_life_policy_data'][0]->name_of_insurance_comp_in) : "-" }}</div>
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_in == "Y" ? strtoupper($proposalData['prop_prev_life_policy_data'][0]->policy_number_in) : "-" }}</div>
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_in == "Y" ? $proposalData['prop_prev_life_policy_data'][0]->sum_assured_in : "-" }}</div>
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_in == "Y" ? strtoupper($proposalData['prop_prev_life_policy_data'][0]->plan_of_insurance_in) : "-" }}</div>
			<div class="tr-col-w32-end">&nbsp;</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_sp == "Y" ? "SPOUSE" : "" }}</div>
			<div class="tr-col-w28">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_in == "Y" ? strtoupper($proposalData['prop_prev_life_policy_data'][0]->name_of_insurance_comp_sp) : "-" }}</div>
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_sp == "Y" ? strtoupper($proposalData['prop_prev_life_policy_data'][0]->policy_number_sp) : "-" }}</div>
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_sp == "Y" ? $proposalData['prop_prev_life_policy_data'][0]->sum_assured_sp : "-" }} </div>
			<div class="tr-col-w10">{{ $proposalData['prop_prev_life_policy_data'][0]->quest_answer_sp == "Y" ? strtoupper($proposalData['prop_prev_life_policy_data'][0]->plan_of_insurance_sp) : "-" }}</div>
			<div class="tr-col-w32-end">&nbsp;</div>
		</div>
	</div>

	<!-- END - IV.   OTHER TAKAFUL / INSURANCE PLANS -->

	<!-- PAGE BREAK -->
	<p style="page-break-after: always;">&nbsp;</p>

	<!-- START - VI.DETAILS OF CHILDREN -->
	<h5>VI.DETAILS OF CHILDREN</h5>

	<p>PROVIDE FULL DETAILS ONLY IF COMPREHENSIVE HOSPITALIZATION COVER IS BEING TAKEN FOR THE CHILD / CHILDREN.</p>
	<?php if (isset($proposalData['prop_child_info'])) { ?>

		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w2">NO</div>
				<div class="th-col-w40">FULL NAME OF CHILD</div>
				<div class="th-col-w10">GENDER</div>
				<div class="th-col-w10">DATE OF BIRTH</div>
				<div class="th-col-w10">HEIGHT</div>
				<div class="th-col-w10">WEIGHT</div>
				<div class="th-col-w10-end">CLASS</div>
			</div>
		</div>
		<div class="rTable">
			<?php foreach ($proposalData['prop_child_info'] as $item) { ?>
				<div class="rTableRow">
					<div class="tr-col-w2">{{ '0' .$item->child_number }} </div>
					<div class="tr-col-w40">{{ $item->ch_title  }} {{ $item->ch_first_name }} {{ $item->ch_middle_name }} {{ $item->ch_last_name }}</div>
					<div class="tr-col-w10">{{ $item->ch_gender }}</div>
					<div class="tr-col-w10">{{ $item->ch_dob }}</div>
					<div class="tr-col-w10">{{ $item->ch_height }}</div>
					<div class="tr-col-w10">{{ $item->ch_weight }}</div>
					<div class="tr-col-w10-end">{{ $item->ch_weight }}</div>
				</div>
			<?php } ?>
		</div>

	<?php
	} else { ?>
		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w2">NO</div>
				<div class="th-col-w40">FULL NAME OF CHILD</div>
				<div class="th-col-w10">GENDER</div>
				<div class="th-col-w10">DATE OF BIRTH</div>
				<div class="th-col-w10">HEIGHT</div>
				<div class="th-col-w10">WEIGHT</div>
				<div class="th-col-w10-end">CLASS</div>
			</div>
		</div>
		<div class="rTable">
			<?php for ($x = 1; $x <= 5; $x++) { ?>
				<div class="rTableRow">
					<div class="tr-col-w2"><?php echo '0' . $x; ?></div>
					<div class="tr-col-w40">&nbsp;</div>
					<div class="tr-col-w10">&nbsp;</div>
					<div class="tr-col-w10">&nbsp;</div>
					<div class="tr-col-w10">&nbsp;</div>
					<div class="tr-col-w10">&nbsp;</div>
					<div class="tr-col-w10-end">&nbsp;</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<!-- END - VI.DETAILS OF CHILDREN -->

	<!-- PAGE BREAK -->
	<p style="page-break-after: always;">&nbsp;</p>

	<!-- START - VII.HEALTH CONDITION -->
	<h5>VII.HEALTH CONDITION</h5>

	<p style="color:red; text-align:center;">IF YOU ARE IN DOUBT AS TO WHETHER ANY FACTS ARE MATERIAL, THEY SHOULD BE DISCLOSED</p>


	<?php
	$count = 0;
	foreach ($proposalData['prop_habits_quest_info'] as $item) {
		$count += 1;
		if ($count == 8 && $is_spouse) {
			$count = 0;
	?>
			<p style="page-break-after: always;">&nbsp;</p>
		<?php
		} else if ($count == 9 && !$is_spouse) {
			$count = 0;
		?>
			<p style="page-break-after: always;">&nbsp;</p>
		<?php
		}
		$str_lang_question_ref = 'proposal_pdf.pdf.' . $item->widget_id . '.' . $item->quest_id;
		?>
		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w100-end">{{ __($str_lang_question_ref) }}</div>
			</div>
		</div>

		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w7"><strong>Proposer</strong></div>
				<div class="tr-col-w2">&nbsp;{{ $item->quest_answer_in == 'Y' ? "YES" : "NO" }}</div>
				<div class="th-col-w7"><strong>Diagnosis</strong></div>
				<div class="tr-col-w18">&nbsp;{{ strtoupper($item->quest_diagnosis_in) }}</div>
				<div class="th-col-w7"><strong>Treatment</strong></div>
				<div class="tr-col-w18">&nbsp;{{ strtoupper($item->quest_treatment_in) }}</div>
				<div class="th-col-w7"><strong>Doctor Details</strong></div>
				<div class="tr-col-w44-end">&nbsp;{{ strtoupper($item->quest_name_add_doctor_in) }}</div>
			</div>
		</div>
		<div class="rTable">
			<?php
			if ($is_spouse) {
			?>
				<div class="rTableRow">
					<div class="th-col-w7"><strong> Spouse </strong></div>
					<div class="tr-col-w2">&nbsp;{{ $item->quest_answer_sp == 'Y' ? "YES" : "NO" }}</div>
					<div class="th-col-w7"><strong>Diagnosis</strong></div>
					<div class="tr-col-w18">&nbsp;{{ strtoupper($item->quest_diagnosis_sp) }}</div>
					<div class="th-col-w7"><strong>Treatment</strong></div>
					<div class="tr-col-w18">&nbsp;{{ strtoupper($item->quest_treatment_sp) }}</div>
					<div class="th-col-w7"><strong>Doctor Details </strong></div>
					<div class="tr-col-w44-end">&nbsp;{{ strtoupper($item->quest_name_add_doctor_sp) }}</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>


	<!-- SPECIAL RISKS QUESTIONS -->

	<?php
	foreach ($proposalData['prop_dynamic_question_info']['SpecialRiskQuestionList'] as $item) {

		$str_lang_question_ref = 'proposal_pdf.pdf.' . $item->widget_id . '.' . $item->quest_id;
	?>
		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w100-end">{{ __($str_lang_question_ref) }}</div>
			</div>
		</div>

		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w7"><strong>Proposer</strong></div>
				<div class="tr-col-w2">&nbsp;{{ $item->quest_answer_in == 'Y' ? "YES" : "NO" }}</div>
				<div class="tr-col-w91-end">&nbsp;{{ strtoupper($item->quest_yes_reason_in) }}</div>
			</div>
			<?php
			if ($is_spouse) {
			?>
				<div class="rTableRow">
					<div class="th-col-w7"><strong> Spouse </strong></div>
					<div class="tr-col-w2">&nbsp;{{ $item->quest_answer_sp == 'Y' ? "YES" : "NO" }}</div>
					<div class="tr-col-w91-end">&nbsp;{{ strtoupper($item->quest_yes_reason_sp) }}</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>

	<!-- PAGE BREAK -->
	<p style="page-break-after: always;">&nbsp;</p>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w100-end">26. FOR FEMALE PROPOSERS ONLY</div>
		</div>
	</div>
	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w71">(a)Have you, or have you ever had any disorder of the female organs (breast, ovaries and uterus) or any abnormalities of pregnancy or confinement (Eg. caesarean section, miscarriage)?</div>
			<div class="tr-col-w18-end">{{ $is_female && $proposalData['prop_female_only_quest_info'][1]->quest_answer_gynecological == 'Y' ? strtoupper($proposalData['prop_female_only_quest_info'][1]->quest_reason_gynecological) : "" }}</div>
		</div>
	</div>
	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w25">(b) Are you pregnant now?</div>
			<div class="tr-col-w18"> {{ $is_female && $proposalData['prop_female_only_quest_info'][0]->quest_answer_pregnant == "Y" ? "YES" : "NO" }}</div>
			<div class="th-col-w25">If YES, how many months?</div>
			<div class="tr-col-w18-end"> {{ $is_female && $proposalData['prop_female_only_quest_info'][0]->pregnant_how_many_months }} </div>
		</div>
	</div>


	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w100-end">27. DETAILS OF FAMILY HISTORY</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w10">PROPOSER</div>
			<div class="th-col-w42">IF LIVING</div>
			<div class="th-col-w50-end">IF DECEASED</div>
		</div>
	</div>

	<div class="rTable">
		<div class="rTableRow">
			<div class="th-col-w10-h60">FAMILY MEMBERS</div>
			<div class="th-col-w5-h60">AGE</div>
			<div class="th-col-w35-h60">HEALTH CONDITION(SUFFERED/SUFFERING FROM HEART DISEASE, STROKE, DIABETES,BLOOD PRESSURE, KIDNEY DISEASE, CANCER OR ANY OTHER DISEASE?) (give details)</div>
			<div class="th-col-w5-h60">AGE</div>
			<div class="th-col-w45-h60-end">CAUSE</div>
		</div>
	</div>
	<div class="rTable">
		<div class="rTableRow">
			<div class="tr-col-w10">FATHER</div>
			<div class="tr-col-w5">{{ $proposalData['prop_family_info_ins_sp_data'][0]->father_alive_dead_in == 'Alive' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->father_age_in ) : "N/A" }}</div>
			<div class="tr-col-w35">{{ $proposalData['prop_family_info_ins_sp_data'][0]->father_alive_dead_in == 'Alive' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->father_state_of_health_in ) : "N/A" }}</div>
			<div class="tr-col-w5">{{ $proposalData['prop_family_info_ins_sp_data'][0]->father_alive_dead_in == 'Dead' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->father_age_in ) : "N/A" }}</div>
			<div class="tr-col-w45-end">{{ $proposalData['prop_family_info_ins_sp_data'][0]->father_alive_dead_in == 'Dead' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->father_state_of_health_in ) : "N/A" }}</div>
		</div>
		<div class="rTableRow">
			<div class="tr-col-w10">MOTHER</div>
			<div class="tr-col-w5">{{ $proposalData['prop_family_info_ins_sp_data'][0]->mother_alive_dead_in == 'Alive' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->mother_age_in ) : "N/A" }}</div>
			<div class="tr-col-w35">{{ $proposalData['prop_family_info_ins_sp_data'][0]->mother_alive_dead_in == 'Alive' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->mother_state_of_health_in ) : "N/A" }}</div>
			<div class="tr-col-w5">{{ $proposalData['prop_family_info_ins_sp_data'][0]->mother_alive_dead_in == 'Dead' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->mother_age_in ) : "N/A" }}</div>
			<div class="tr-col-w45-end">{{ $proposalData['prop_family_info_ins_sp_data'][0]->mother_alive_dead_in == 'Dead' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->mother_state_of_health_in ) : "N/A" }}</div>
		</div>
	</div>
	<?php
	if ($is_spouse) {
	?>
		<br />
		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w10">SPOUSE</div>
				<div class="th-col-w42">IF LIVING</div>
				<div class="th-col-w50-end">IF DECEASED</div>
			</div>
		</div>

		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w10-h60">FAMILY MEMBERS</div>
				<div class="th-col-w5-h60">AGE</div>
				<div class="th-col-w35-h60">HEALTH CONDITION(SUFFERED/SUFFERING FROM HEART DISEASE, STROKE, DIABETES,BLOOD PRESSURE, KIDNEY DISEASE, CANCER OR ANY OTHER DISEASE?) (give details)</div>
				<div class="th-col-w5-h60">AGE</div>
				<div class="th-col-w45-h60-end">CAUSE</div>
			</div>
		</div>
		<div class="rTable">
			<div class="rTableRow">
				<div class="tr-col-w10">FATHER</div>
				<div class="tr-col-w5">{{ $proposalData['prop_family_info_ins_sp_data'][0]->father_alive_dead_sp == 'Alive' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->father_age_sp ) : "N/A" }}</div>
				<div class="tr-col-w35">{{ $proposalData['prop_family_info_ins_sp_data'][0]->father_alive_dead_sp == 'Alive' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->father_state_of_health_sp ) : "N/A" }}</div>
				<div class="tr-col-w5">{{ $proposalData['prop_family_info_ins_sp_data'][0]->father_alive_dead_sp == 'Dead' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->father_age_sp ) : "N/A" }}</div>
				<div class="tr-col-w45-end">{{ $proposalData['prop_family_info_ins_sp_data'][0]->father_alive_dead_sp == 'Dead' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->father_state_of_health_sp ) : "N/A" }}</div>
			</div>
			<div class="rTableRow">
				<div class="tr-col-w10">MOTHER</div>
				<div class="tr-col-w5">{{ $proposalData['prop_family_info_ins_sp_data'][0]->mother_alive_dead_sp == 'Alive' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->mother_age_sp ) : "N/A" }}</div>
				<div class="tr-col-w35">{{ $proposalData['prop_family_info_ins_sp_data'][0]->mother_alive_dead_sp == 'Alive' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->mother_state_of_health_sp ) : "N/A" }}</div>
				<div class="tr-col-w5">{{ $proposalData['prop_family_info_ins_sp_data'][0]->mother_alive_dead_sp == 'Dead' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->mother_age_sp ) : "N/A" }}</div>
				<div class="tr-col-w45-end">{{ $proposalData['prop_family_info_ins_sp_data'][0]->mother_alive_dead_sp == 'Dead' ?  strtoupper($proposalData['prop_family_info_ins_sp_data'][0]->mother_state_of_health_sp ) : "N/A" }}</div>
			</div>
		</div>
	<?php } ?>
	<!-- END - VII.HEALTH CONDITION -->

	<!-- PAGE BREAK -->
	<p style="page-break-after: always;">&nbsp;</p>

	<!-- START - VIII. HOBBIES AND PASTIMES -->
	<h5>VIII. HOBBIES AND PASTIMES </h5>
	<?php
	foreach ($proposalData['prop_dynamic_question_info']['HazardousQuestionList'] as $item) {

		$str_lang_question_ref = 'proposal_pdf.pdf.' . $item->widget_id . '.' . $item->quest_id;
	?>

		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w100-end">{{ __($str_lang_question_ref) }}</div>
			</div>
		</div>


		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w7"><strong>Proposer</strong></div>
				<div class="tr-col-w2">&nbsp;{{ $item->quest_answer_in == 'Y' ? "YES" : "NO" }}</div>
				<div class="tr-col-w91-end">&nbsp;{{ strtoupper($item->quest_yes_reason_in) }}</div>
			</div>
			<?php
			if ($is_spouse) {
			?>
				<div class="rTableRow">
					<div class="th-col-w7"><strong> Spouse </strong></div>
					<div class="tr-col-w2">&nbsp;{{ $item->quest_answer_sp == 'Y' ? "YES" : "NO" }}</div>
					<div class="tr-col-w91-end">&nbsp;{{ strtoupper($item->quest_yes_reason_sp) }}</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<!-- END - VIII. HOBBIES AND PASTIMES -->


	<!-- START - IX. NOMINEE (BENEFICIARY) -->
	<h5>IX. NOMINEE (BENEFICIARY) </h5>

	<p>For Muslim Participants the Nominee is the person who is responsible to distribute the Takaful benefits to the beneficiaries of the Participant according to the Shariah law (Faraid). Hence, it is recommended that the Nominee should be a responsible member of the family such as husband/wife/eldest son/father/mother.</p>

	<p>For non-Muslim Participants the Nominee shall be the beneficiary (ies) who will be entitled to the Takaful benefits according to the percentage stated herein.</p>

	<?php
	if (count($proposalData['nominee_info']) > 0 && $proposalData['nominee_info'][0]->proposal_id != null) {
	?>

		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w2">NO</div>
				<div class="th-col-w40">NAME</div>
				<div class="th-col-w10">DATE OF BIRTH</div>
				<div class="th-col-w10">NIC NO</div>
				<div class="th-col-w10">REL TO PROPOSER</div>
				<div class="th-col-w10">PERCNTAGE</div>
				<div class="th-col-w10-end">ADULT</div>
			</div>
		</div>
		<div class="rTable">
			<?php
			$count = 0;
			foreach ($proposalData['nominee_info'] as $item) {
				$count += 1;
			?>
				<div class="rTableRow">
					<div class="tr-col-w2">{{ '0' . $count }} </div>
					<div class="tr-col-w40">{{ strtoupper($item->nominee_name)  }} </div>
					<div class="tr-col-w10">{{ $item->nominee_dob }}</div>
					<div class="tr-col-w10">{{ strtoupper($item->nominee_nic) }}</div>
					<div class="tr-col-w10">{{ strtoupper($item->nominee_relationship) }}</div>
					<div class="tr-col-w10">{{ $item->nominee_percentage . '%' }}</div>
					<div class="tr-col-w10-end">{{ $item->nominee_age < 18 ? "YES" : "NO"}}</div>
				</div>
			<?php } ?>
		</div>

	<?php
	} else { ?>
		<div class="rTable">
			<div class="rTableRow">
				<div class="th-col-w2">NO</div>
				<div class="th-col-w40">NAME</div>
				<div class="th-col-w10">DATE OF BIRTH</div>
				<div class="th-col-w10">NIC NO</div>
				<div class="th-col-w10">REL TO PROPOSER</div>
				<div class="th-col-w10">PERCNTAGE</div>
				<div class="th-col-w10-end">ADULT</div>
			</div>
		</div>
		<div class="rTable">
			<?php for ($x = 1; $x <= 5; $x++) { ?>
				<div class="rTableRow">
					<div class="tr-col-w2"><?php echo '0' . $x; ?></div>
					<div class="tr-col-w40">&nbsp;</div>
					<div class="tr-col-w10">&nbsp;</div>
					<div class="tr-col-w10">&nbsp;</div>
					<div class="tr-col-w10">&nbsp;</div>
					<div class="tr-col-w10">&nbsp;</div>
					<div class="tr-col-w10-end">&nbsp;</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<!-- END - IX. NOMINEE (BENEFICIARY) -->
</body>

</html>