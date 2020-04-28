<script>
	$j(function(){
		var tn = 'payments';

		/* data for selected record, or defaults if none is selected */
		var data = {
			tenant: <?php echo json_encode(array('id' => $rdata['tenant'], 'value' => $rdata['tenant'], 'text' => $jdata['tenant'])); ?>,
			house: <?php echo json_encode($jdata['house']); ?>,
			year: <?php echo json_encode($jdata['year']); ?>,
			month: <?php echo json_encode($jdata['month']); ?>,
			expected_amount: <?php echo json_encode($jdata['expected_amount']); ?>
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
				$j('#house' + d[rnd]).html(data.house);
				$j('#year' + d[rnd]).html(data.year);
				$j('#month' + d[rnd]).html(data.month);
				$j('#expected_amount' + d[rnd]).html(data.expected_amount);
				return true;
			}

			return false;
		});

		cache.start();
	});
</script>

