<?php
/**
 * Created by PhpStorm.
 * User: Sylvco
 * Date: 09/04/2018
 * Time: 13:22
 */

namespace testing;

interface Wordpress_Interface {
	/**
	 * @param int|string $action
	 *
	 * @return string
	 */
	public function create_nonce( $action );
}