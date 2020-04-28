<script>
	$j(function(){
		var tn = 'invoices';

		/* data for selected record, or defaults if none is selected */
		var data = {
			tenant: <?php echo json_encode(array('id' => $rdata['tenant'], 'value' => $rdata['tenant'], 'text' => $jdata['tenant'])); ?>,
			phone: <?php echo json_encode($jdata['phone']); ?>,
			house: <?php echo json_encode($jdata['house']); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for tenant */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tenant' && d.id == data.tenant.id)
				return { results: [ data.tenant ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for tenant autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'tenant' && d.id == data.tenant.id){
				$j('#phone' + d[rnd]).html(data.phone);
				$j('#house' + d[rnd]).html(data.house);
				return true;
			}

			return false;
		});

		cache.start();
	});
</script>

