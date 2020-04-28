<?php
	// For help on using hooks, please refer to https://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function payments_init(&$options, $memberInfo, &$args){

		return TRUE;
	}

	function payments_header($contentType, $memberInfo, &$args){
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

	function payments_footer($contentType, $memberInfo, &$args){
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

	function payments_before_insert(&$data, $memberInfo, &$args){
		$memberid1=($memberInfo['username']);
		$getrecordcount=sqlValue("SELECT COUNT(*) FROM membership_userrecords WHERE tableName='payments' AND memberID='$memberid1'");
		$invoiceid=($data['tenant']);
		$count=sqlValue("SELECT COUNT(*) FROM payments WHERE tenant='$invoiceid'");
		if ($getrecordcount>=2) {
			# code...
			$_SESSION['custom_err_msg']="<b>Sorry!! Your new record was not saved.You are limited to 2 records in trial version.</b>";
			return FALSE;
		}
		elseif ($count>0) {
			# code...
			$_SESSION['custom_err_msg']="<b>Sorry!! The Tenant Invoice ID seems to be already on track,You can only add payments for invoices that are not on track.If its a subsequent payment kindly find the invoice id and update the payments accordingly!!</b>";
			return FALSE;
		}
		else{
			return TRUE;
		}
		}

	function payments_after_insert($data, $memberInfo, &$args){
		$currid=($data['id']);
		$eamountid=($data['expected_amount']);
		$actualeamount=sqlValue("SELECT total FROM invoices WHERE id='$eamountid'");
		$getbalance=$actualeamount-$data['paid_amount'];
		sql("update payments set balance='$getbalance' where id='$currid'");
		$_SESSION['custom_err_msg']="<b>Congratulations!! New Payment has successfully been made!</b>";
		return TRUE;
	}

	function payments_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function payments_after_update($data, $memberInfo, &$args){
		$currid=($data['id']);
		$eamountid=($data['expected_amount']);
		$actualeamount=sqlValue("SELECT total FROM invoices WHERE id='$eamountid'");
		$getbalance=$actualeamount-$data['paid_amount'];
		sql("update payments set balance='$getbalance' where id='$currid'");
		$_SESSION['custom_err_msg']="<b>Congratulations!! Payment Details Have Successfully Been Updated!</b>";
		return TRUE;
	}

	function payments_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function payments_after_delete($selectedID, $memberInfo, &$args){

	}

	function payments_dv($selectedID, $memberInfo, &$html, &$args){

	}

	function payments_csv($query, $memberInfo, &$args){

		return $query;
	}
	function payments_batch_actions(&$args){

		return array();
	}
