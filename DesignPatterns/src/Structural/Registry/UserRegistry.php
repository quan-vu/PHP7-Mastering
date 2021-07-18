<?php declare(strict_types=1);

namespace DesignPatterns\Structural\Registry;

/**
 * Registry pattern
 * 
 * set()
 * get()
 * __destruct() : clean up al items in registry
 */
class UserRegistry 
{
    private $registry = [];

    public function get($key)
    {
        if (isset($this->registry[$key])) {
            return $this->registry[$key];
        }
        return null;
    }

    public function set($key, $value, $graceful = false)
    {
        if (isset($this->registry[$key])) {
            if ($graceful) {
                return;
            }
            throw new \RuntimeException("Registry key {$key} already exists");
            
        }
        $this->registry[$key] = $value;
    }

    public function remove($key)
    {
        if (isset($this->registry[$key])) {
            unset($this->registry[$key]);
        }
    }

    public function __destruct()
    {
        $keys = array_keys($this->registry);
        array_walk($keys, [$this, 'remove']);
    }
}
