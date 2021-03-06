<?php

/**
 * Test: Nette\Utils\Neon::decode errors.
 *
 * @author     David Grudl
 */

use Nette\Utils\Neon,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


Assert::exception(function() {
	Neon::decode("Hello\nWorld");
}, 'Nette\Utils\NeonException', "Unexpected 'World' on line 2, column 1." );


Assert::exception(function() {
	Neon::decode("- Dave,\n- Rimmer,\n- Kryten,\n");
}, 'Nette\Utils\NeonException', "Unexpected ',' on line 1, column 7." );


Assert::exception(function() {
	Neon::decode("- first: Dave\n last: Lister\n gender: male\n");
}, 'Nette\Utils\NeonException', "Unexpected ':' on line 1, column 8." );


Assert::exception(function() {
	Neon::decode(" - first\n - second");
}, 'Nette\Utils\NeonException', "Unexpected indentation. on line 2, column 2." );


Assert::exception(function() {
	Neon::decode('item [a, b]');
}, 'Nette\Utils\NeonException', "Unexpected ',' on line 1, column 8." );


Assert::exception(function() {
	Neon::decode('{,}');
}, 'Nette\Utils\NeonException', "Unexpected ',' on line 1, column 2." );


Assert::exception(function() {
	Neon::decode('{a, ,}');
}, 'Nette\Utils\NeonException', "Unexpected ',' on line 1, column 5." );


Assert::exception(function() {
	Neon::decode('"');
}, 'Nette\Utils\NeonException', "Unexpected '\"' on line 1, column 1." );
