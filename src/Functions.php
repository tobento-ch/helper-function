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

namespace Tobento\Service\HelperFunction;

use RuntimeException;

/**
 * Functions manager.
 */
class Functions
{
    /**
     * Holds the data.
     *
     * @var array
     */
    protected static array $data = [];
    
    /**
     * Holds the available data keys.
     *
     * @var array
     */
    protected array $dataKeys = [];
    
    /**
     * Sets data.
     *
     * @param  string The key.
     * @param  mixed the data.
     * @return void
     */
    public function set(string $key, mixed $data): void
    {
        static::$data[$key] = $data;
        
        if (!in_array($key, $this->dataKeys))
        {
            $this->dataKeys[] = $key;
        }
    }

    /**
     * Gets data.
     *
     * @param string The key.
     * @return mixed The data.
     */
    public static function get(string $key): mixed
    {
        if (!isset(static::$data[$key]))
        {
             throw new RuntimeException('Helper function data "'.$key.'" does not exist! You need to set the data first.');
        }
        
        return static::$data[$key];
    }
                
    /**
     * Registers a function.
     *
     * @param string A function name.
     * @return void
     */    
    public function register(string $functionFile): void
    {        
        if (!file_exists($functionFile))
        {
            throw new RuntimeException('Helper function file "'.$functionFile.'" does not exist!');
        }
                
        require_once $functionFile;
    }

    /**
     * Get the keys set.
     *
     * @return array
     */
    public function getKeys(): array
    {
        return $this->dataKeys;
    }    
}