<?php

/**
 * Test: Nette\Latte\Runtime\Filters::modifyDate()
 *
 * @author     David Grudl
 */

use Nette\Latte\Runtime\Filters,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


setlocale(LC_TIME, 'C');
date_default_timezone_set('Europe/Prague');

Assert::null( Filters::modifyDate(NULL, NULL) );

Assert::same( '1978-01-24 11:40:00', (string) Filters::modifyDate(254400000, '+1 day') );

Assert::same( '1978-05-06 00:00:00', (string) Filters::modifyDate('1978-05-05', '+1 day') );

Assert::same( '1978-05-06 00:00:00', (string) Filters::modifyDate(new DateTime('1978-05-05'), '1day') );

Assert::same( '1978-01-22 11:40:00', (string) Filters::modifyDate(254400000, -1, 'day') );
