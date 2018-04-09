<?php
/**
 * Created by PhpStorm.
 * User: Sylvco
 * Date: 09/04/2018
 * Time: 11:44
 */

namespace nonce;

use testing\Wordpress_Interface;

class Nonce {

	/**
	 * @var Wordpress_Interface
	 */
	private $wordpress;

	/**
	 * @var int|string
	 */
	private $action;

	/**
	 * @var string
	 */
	private $value = '';

	/**
	 * @param Wordpress_Interface $wordpress
	 * @param int|string          $action
	 */
	public function __construct( Wordpress_Interface $wordpress, $action = - 1 ) {

		$this->action    = $action;
		$this->wordpress = $wordpress;
	}

	/**
	 * @param string $a_nonce
	 *
	 * @return bool
	 */
	public function verify( string $a_nonce ) {
		return $this->get_value() === $a_nonce;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return $this->get_value();
	}

	/**
	 * @return string
	 */
	private function get_value() {
		if ( $this->value === '' ) {
			$this->value = $this->wordpress->create_nonce( $this->action );
		}

		return $this->value;
	}
}