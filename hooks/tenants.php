<?php
	// For help on using hooks, please refer to https://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function tenants_init(&$options, $memberInfo, &$args){

		return TRUE;
	}

	function tenants_header($contentType, $memberInfo, &$args){
		$header='';

		switch($contentType){
			case 'tableview':
				$header='';
				break;

			case 'detailview':
				$header='';
				break;

			case 'tableview+detailview':
				$header='';
				break;

			case 'print-tableview':
				$header='';
				break;

			case 'print-detailview':
				$header='';
				break;

			case 'filters':
				$header='';
				break;
		}

		return $header;
	}

	function tenants_footer($contentType, $memberInfo, &$args){
		$footer='';

		switch($contentType){
			case 'tableview':
				$footer='';
				break;

			case 'detailview':
				$footer='';
				break;

			case 'tableview+detailview':
				$footer='';
				break;

			case 'print-tableview':
				$footer='';
				break;

			case 'print-detailview':
				$footer='';
				break;

			case 'filters':
				$footer='';
				break;
		}

		return $footer;
	}

	function tenants_before_insert(&$data, $memberInfo, &$args){
		$memberid1=($memberInfo['username']);
		$getrecordcount=sqlValue("SELECT COUNT(*) FROM membership_userrecords WHERE tableName='tenants' AND memberID='$memberid1'");
		if ($getrecordcount>=2) {
			$_SESSION['custom_err_msg']="<b>Sorry!! Your new record was not saved.You are limited to 2 records in trial version.</b>";
			return FALSE;}
		else{
			return TRUE;}
	}

	function tenants_after_insert($data, $memberInfo, &$args){
		$_SESSION['custom_err_msg']="<b>Congratulations!! New Tenant added Successfully</b>";
		return TRUE;
	}

	function tenants_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function tenants_after_update($data, $memberInfo, &$args){
		$_SESSION['custom_err_msg']="<b>Congratulations!! Tenant Details Updated Successfully</b>";
		return TRUE;
	}

	function tenants_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function tenants_after_delete($selectedID, $memberInfo, &$args){

	}

	function tenants_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function tenants_csv($query, $memberInfo, &$args){

		return $query;
	}
	function tenants_batch_actions(&$args){

		return array();
	}
