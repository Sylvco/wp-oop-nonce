<?php
/**
 * Created by PhpStorm.
 * User: Sylvco
 * Date: 09/04/2018
 * Time: 12:03
 */

namespace Test\Unit\Nonce;

use nonce\Nonce;
use PHPUnit\Framework\TestCase;
use testing\Wordpress_Interface;

class Nonce_Test extends TestCase {

	/**
	 * @var Wordpress_Interface|\PHPUnit_Framework_MockObject_MockObject
	 */
	private $word_press;

	public function setUp() {
		parent::setUp();

		$this->word_press = $this
			->getMockBuilder( Wordpress_Interface::class )
			->setMethods( [ 'create_nonce' ] )
			->getMock();
	}

	public function test_created() {
		$test_value = $this->mock_create_nonce();

		$nonceHash = ( new Nonce( $this->word_press, 'create-user' ) )->__toString();

		$this->assertEquals( $test_value, $nonceHash );
	}

	public function test_verify() {
		$test_value = $this->mock_create_nonce();

		$nonce = new Nonce( $this->word_press );

		$this->assertTrue($nonce->verify($test_value));
		$this->assertFalse($nonce->verify('invalid_nonce'));
	}

	/**
	 * @return string
	 */
	private function mock_create_nonce() {
		$test_value = 'test-value';

		$this->word_press
			->method( 'create_nonce' )
			->willReturn( $test_value );

		return $test_value;
	}
}
