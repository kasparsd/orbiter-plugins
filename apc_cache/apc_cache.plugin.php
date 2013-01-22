<?php

class apc_cache extends orbiter {

	function apc_cache() {
		if ( function_exists( 'apc_store' ) )
			return;
	}
}
