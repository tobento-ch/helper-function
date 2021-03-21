<?php

/**
 * TOBENTO
 *
 * @copyright	Tobias Strub, TOBENTO
 * @license     MIT License, see LICENSE file distributed with this source code.
 * @author      Tobias Strub
 * @link        https://www.tobento.ch
 */

declare(strict_types=1);

namespace Tobento\Service\HelperFunction\Test;

use PHPUnit\Framework\TestCase;
use Tobento\Service\HelperFunction\Functions;
use RuntimeException;

/**
 * Functions tests
 */
class FunctionsTest extends TestCase
{
    public function testRegisterFunctionFileFails()
    {
        // Create Functions
        $functions = new Functions();
        
        $this->expectException(RuntimeException::class);
        
        // Register a function file.
        $functions->register(__DIR__.'/Mock/missing_functions.php');
	}

    public function testMissingData()
    {
        // Create Functions
        $functions = new Functions();
        
        // Register a function file.
        $functions->register(__DIR__.'/Mock/functions.php');
        
        $this->expectException(RuntimeException::class);

        locale();
	}
    
    public function testCallingAFunction()
    {
        // Create Functions
        $functions = new Functions();
        
        // Register a function file.
        $functions->register(__DIR__.'/Mock/functions.php');
        
        // Set any data for later usage for your functions.
        $functions->set('sitename', 'Your Sitename');

        $this->assertSame('Your Sitename', sitename());
	}
    
    public function testGetKeys()
    {
        // Create Functions
        $functions = new Functions();
        
        // Register a function file.
        $functions->register(__DIR__.'/Mock/functions.php');
        
        // Set any data for later usage for your functions.
        $functions->set('sitename', 'Your Sitename');
        $functions->set('foo', 'bar');

        $this->assertSame(['sitename', 'foo'], $functions->getKeys());
	}    
}