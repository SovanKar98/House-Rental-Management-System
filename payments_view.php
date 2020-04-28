<?php
// This script and data application were generated by AppGini 5.71
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/payments.php");
	include("$currDir/payments_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('payments');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "payments";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`payments`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tenants1`.`fullname`) || CHAR_LENGTH(`tenants1`.`national_id`) || CHAR_LENGTH(`invoices1`.`id`), CONCAT_WS('',   `tenants1`.`fullname`, ' ID: ', `tenants1`.`national_id`, ' INV ID: ', `invoices1`.`id`), '') /* Tenant */" => "tenant",
		"IF(    CHAR_LENGTH(`houses1`.`house_number`), CONCAT_WS('',   `houses1`.`house_number`), '') /* House */" => "house",
		"IF(    CHAR_LENGTH(`invoices1`.`year`), CONCAT_WS('',   `invoices1`.`year`), '') /* Year */" => "year",
		"IF(    CHAR_LENGTH(`invoices1`.`month`), CONCAT_WS('',   `invoices1`.`month`), '') /* Month */" => "month",
		"IF(    CHAR_LENGTH(`invoices1`.`total`), CONCAT_WS('',   `invoices1`.`total`), '') /* Expected amount (Rs) */" => "expected_amount",
		"`payments`.`paid_amount`" => "paid_amount",
		"`payments`.`balance`" => "balance",
		"if(`payments`.`date`,date_format(`payments`.`date`,'%m/%d/%Y'),'')" => "date",
		"`payments`.`comments`" => "comments"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`payments`.`id`',
		2 => 2,
		3 => 3,
		4 => '`invoices1`.`year`',
		5 => '`invoices1`.`month`',
		6 => '`invoices1`.`total`',
		7 => 7,
		8 => 8,
		9 => '`payments`.`date`',
		10 => 10
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`payments`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tenants1`.`fullname`) || CHAR_LENGTH(`tenants1`.`national_id`) || CHAR_LENGTH(`invoices1`.`id`), CONCAT_WS('',   `tenants1`.`fullname`, ' ID: ', `tenants1`.`national_id`, ' INV ID: ', `invoices1`.`id`), '') /* Tenant */" => "tenant",
		"IF(    CHAR_LENGTH(`houses1`.`house_number`), CONCAT_WS('',   `houses1`.`house_number`), '') /* House */" => "house",
		"IF(    CHAR_LENGTH(`invoices1`.`year`), CONCAT_WS('',   `invoices1`.`year`), '') /* Year */" => "year",
		"IF(    CHAR_LENGTH(`invoices1`.`month`), CONCAT_WS('',   `invoices1`.`month`), '') /* Month */" => "month",
		"IF(    CHAR_LENGTH(`invoices1`.`total`), CONCAT_WS('',   `invoices1`.`total`), '') /* Expected amount (Rs) */" => "expected_amount",
		"`payments`.`paid_amount`" => "paid_amount",
		"`payments`.`balance`" => "balance",
		"if(`payments`.`date`,date_format(`payments`.`date`,'%m/%d/%Y'),'')" => "date",
		"`payments`.`comments`" => "comments"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`payments`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`tenants1`.`fullname`) || CHAR_LENGTH(`tenants1`.`national_id`) || CHAR_LENGTH(`invoices1`.`id`), CONCAT_WS('',   `tenants1`.`fullname`, ' ID: ', `tenants1`.`national_id`, ' INV ID: ', `invoices1`.`id`), '') /* Tenant */" => "Tenant",
		"IF(    CHAR_LENGTH(`houses1`.`house_number`), CONCAT_WS('',   `houses1`.`house_number`), '') /* House */" => "House",
		"IF(    CHAR_LENGTH(`invoices1`.`year`), CONCAT_WS('',   `invoices1`.`year`), '') /* Year */" => "Year",
		"IF(    CHAR_LENGTH(`invoices1`.`month`), CONCAT_WS('',   `invoices1`.`month`), '') /* Month */" => "Month",
		"IF(    CHAR_LENGTH(`invoices1`.`total`), CONCAT_WS('',   `invoices1`.`total`), '') /* Expected amount (Rs) */" => "Expected amount (Rs)",
		"`payments`.`paid_amount`" => "Paid amount (Rs)",
		"`payments`.`balance`" => "Balance (Rs)",
		"`payments`.`date`" => "Date",
		"`payments`.`comments`" => "Comments"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`payments`.`id`" => "id",
		"IF(    CHAR_LENGTH(`tenants1`.`fullname`) || CHAR_LENGTH(`tenants1`.`national_id`) || CHAR_LENGTH(`invoices1`.`id`), CONCAT_WS('',   `tenants1`.`fullname`, ' ID: ', `tenants1`.`national_id`, ' INV ID: ', `invoices1`.`id`), '') /* Tenant */" => "tenant",
		"IF(    CHAR_LENGTH(`houses1`.`house_number`), CONCAT_WS('',   `houses1`.`house_number`), '') /* House */" => "house",
		"IF(    CHAR_LENGTH(`invoices1`.`year`), CONCAT_WS('',   `invoices1`.`year`), '') /* Year */" => "year",
		"IF(    CHAR_LENGTH(`invoices1`.`month`), CONCAT_WS('',   `invoices1`.`month`), '') /* Month */" => "month",
		"IF(    CHAR_LENGTH(`invoices1`.`total`), CONCAT_WS('',   `invoices1`.`total`), '') /* Expected amount (Rs) */" => "expected_amount",
		"`payments`.`paid_amount`" => "paid_amount",
		"`payments`.`balance`" => "balance",
		"if(`payments`.`date`,date_format(`payments`.`date`,'%m/%d/%Y'),'')" => "date",
		"`payments`.`comments`" => "comments"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'tenant' => 'Tenant');

	$x->QueryFrom = "`payments` LEFT JOIN `invoices` as invoices1 ON `invoices1`.`id`=`payments`.`tenant` LEFT JOIN `tenants` as tenants1 ON `tenants1`.`id`=`invoices1`.`tenant` LEFT JOIN `houses` as houses1 ON `houses1`.`id`=`tenants1`.`house` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "payments_view.php";
	$x->RedirectAfterInsert = "payments_view.php?SelectedID=#ID#";
	$x->TableTitle = "Payments";
	$x->TableIcon = "resources/table_icons/account_balances.png";
	$x->PrimaryKey = "`payments`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Tenant", "House", "Year", "Month", "Expected amount (Rs)", "Paid amount (Rs)", "Balance (Rs)", "Date", "Comments");
	$x->ColFieldName = array('tenant', 'house', 'year', 'month', 'expected_amount', 'paid_amount', 'balance', 'date', 'comments');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7, 8, 9, 10);

	// template paths below are based on the app main directory
	$x->Template = 'templates/payments_templateTV.html';
	$x->SelectedTemplate = 'templates/payments_templateTVS.html';
	$x->TemplateDV = 'templates/payments_templateDV.html';
	$x->TemplateDVP = 'templates/payments_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `payments`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='payments' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `payments`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='payments' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`payments`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: payments_init
	$render=TRUE;
	if(function_exists('payments_init')){
		$args=array();
		$render=payments_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: payments_header
	$headerCode='';
	if(function_exists('payments_header')){
		$args=array();
		$headerCode=payments_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: payments_footer
	$footerCode='';
	if(function_exists('payments_footer')){
		$args=array();
		$footerCode=payments_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>