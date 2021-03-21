<?php

/**
 * TOBENTO
 *
 * @copyright    Tobias Strub, TOBENTO
 * @license     MIT License, see LICENSE file distributed with this source code.
 * @author      Tobias Strub
 * @link        https://www.tobento.ch
 */

declare(strict_types=1);

use Tobento\Service\HelperFunction\Functions;

if (!function_exists('sitename'))
{
    function sitename(): string
    {
        // Get the data you need if any.
        return Functions::get('sitename');
    }
}

if (!function_exists('locale'))
{
    function locale(): string
    {
        // Get the data you need if any.
        return Functions::get('locale');
    }
}