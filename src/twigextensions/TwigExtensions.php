<?php
namespace barrelstrength\sproutencodeemail\twigextensions;

use \Twig_Extension;

use barrelstrength\sproutencodeemail\SproutEncodeEmail;

class TwigExtensions extends Twig_Extension
{
	private $count = 1;
	/**
	 * @return string
	 */
	public function getName() {
		return 'Encode Email';
	}

	public function getFilters()
	{
		return [
			new \Twig_SimpleFilter('encode', [$this, 'getEncode'], ['is_safe' => ['html']]),
			new \Twig_SimpleFilter('rot13', [$this, 'getRot13'], ['is_safe' => ['html']]),
			new \Twig_SimpleFilter('entities', [$this, 'getEntities'], ['is_safe' => ['html']])
		];
	}

	/**
	 * Encode string using Rot13.  This function does the same as the Rot13 function
	 * and only exists as it may be easier for some folks to remember 'encode'
	 *
	 * @param  string $string Value to be encoded
	 * @return mixed          Returns Rot13 encoded string
	 */
	public function getEncode($string)
	{
		return SproutEncodeEmail::$api->utilities->encodeStringRot13($string);
	}

	/**
	 * Encode string using Rot13.
	 *
	 * @param  string $string Value to be encoded
	 * @return mixed          Returns Rot13 encoded string
	 */
	public function getRot13($string)
	{
		return SproutEncodeEmail::$api->utilities->encodeStringRot13($string);
	}

	/**
	 * Encode string using HTML Entities.
	 *
	 * @param  string $string Value to be encoded
	 * @return mixed          Returns string encoded as HTML Entities
	 */
	public function getEntities($string)
	{
		return SproutEncodeEmail::$api->utilities->encodeHtmlEntities($string);
	}
}
