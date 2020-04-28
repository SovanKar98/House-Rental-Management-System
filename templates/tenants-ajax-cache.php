<script>
	$j(function(){
		var tn = 'tenants';

		/* data for selected record, or defaults if none is selected */
		var data = {
			house: <?php echo json_encode(array('id' => $rdata['house'], 'value' => $rdata['house'], 'text' => $jdata['house'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for house */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'house' && d.id == data.house.id)
				return { results: [ data.house ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

