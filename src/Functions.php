<?php

/**
 * TOBENTO
 *
 * @copyright   Tobias Strub, TOBENTO
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
     * @param string $key The key.
     * @param mixed $data The data.
     * @return void
     */
    public function set(string $key, mixed $data): void
    {
        static::$data[$key] = $data;
        
        if (!in_array($key, $this->dataKeys)) {
            $this->dataKeys[] = $key;
        }
    }

    /**
     * Gets data.
     *
     * @param string $key The key.
     * @return mixed The data.
     */
    public static function get(string $key): mixed
    {
        if (!static::has($key)) {
             throw new RuntimeException(
                 sprintf('Helper function data "%s" does not exist! You need to set the data first.', $key)
             );
        }
        
        return static::$data[$key];
    }
    
    /**
     * Returns true if has data, otherwise false.
     *
     * @param string $key The key.
     * @return mixed The data.
     */
    public static function has(string $key): bool
    {
        return isset(static::$data[$key]);
    }
    
    /**
     * Registers a function.
     *
     * @param string $functionFile A function name.
     * @return void
     */    
    public function register(string $functionFile): void
    {
        if (!file_exists($functionFile)) {
            throw new RuntimeException(sprintf('Helper function file "%s" does not exist!', $functionFile));
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