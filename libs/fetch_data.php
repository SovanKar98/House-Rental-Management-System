<?php 
function getrecentpayments($table){
	include("db_connect.php");
	$sql="SELECT * FROM $table ORDER BY id DESC LIMIT 10";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		$rowcount=mysqli_num_rows($result);
		if ($rowcount==0) {
			# code...
			echo "No Payments Made Yet";
		}
		foreach ($result as $paymentskey => $paymentsvalue) {
			# code...
			$tenantid=$paymentsvalue['tenant'];
			$sql="SELECT fullname AS tenantname FROM tenants WHERE id='$tenantid'";
			$actualtenant=mysqli_query($con,$sql);
			foreach ($actualtenant as $atkey => $atvalue) {
				# code...
				$storename=$atvalue['tenantname'];
			}
			echo '<a href="payments_view.php?SelectedID='.$paymentsvalue['id'].'" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> '.$storename.' <span class="fa fa-money"><b>:Rs '.$paymentsvalue['paid_amount'].'</b></span>
                                    <span class="pull-right text-muted small label label-info">'.$paymentsvalue['date'].'
                                    </span>
                                </a>';
		}
	}
	mysqli_close($con);
}
function defaultedinvoices(){
	include("db_connect.php");
	#select all invoice ids
	$sql="SELECT id AS inid FROM invoices";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		foreach ($result as $allinvoices => $invoicevalue) {
			# code...store the invoice ids
			$storeinvid=$invoicevalue['inid'];
			#select all invoice ids that appear in payments record
			$query="SELECT * FROM payments WHERE expected_amount='$storeinvid'";
			$results=mysqli_query($con,$query);
			#count how many results have been returned for each id
			$countresults=mysqli_num_rows($results);
			#if no record exists then automatically no payment has been done for that invoice
			if ($countresults==0) {
				# code..get details for the invoices without payment record
				$sql="SELECT * FROM invoices WHERE id='$storeinvid'";
				$result=mysqli_query($con,$sql);
				foreach ($result as $definvoices => $defvalue) {
					# code...store tenant id
					$storetenantid=$defvalue['tenant'];
					#get actual tenant name using id stored above
					$query="SELECT fullname AS tentantsname FROM tenants WHERE id='$storetenantid'";
					$feedback=mysqli_query($con,$query);
					foreach ($feedback as $actualnamekey => $actualnamevalue) {
						# code...store the name
						$getactualname=$actualnamevalue['tentantsname'];
					}
					echo '<a href="invoices_view.php?SelectedID='.$defvalue['id'].'" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> '.$getactualname.' <span class="fa fa-money"><b>:Rs '.$defvalue['total'].'</b></span>
                                    <span class="pull-right text-muted small label label-primary">'.$defvalue['year'].' /'.$defvalue['month'].' 
                                    </span>
                                </a>';
				}
			}
		}
	}
	mysqli_close($con);

}

 ?>