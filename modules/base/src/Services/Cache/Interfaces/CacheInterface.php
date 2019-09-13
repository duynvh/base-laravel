<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/6/19
 * Time: 22:53
 */

namespace Module\Base\Services\Cache\Interfaces;

interface CacheInterface
{
    /**
     * Retrieve data from cache.
     *
     * @param string : cache item key
     * @param string $key
     * @return mixed PHP data result of cache
     * @author Duy Nguyen
     */
    public function get($key);

    /**
     * Add data to the cache.
     *
     * @param string : cache item key
     * @param mixed : the data to store
     * @param int : the number of minutes to store the item
     * @param string $key
     * @return mixed $value variable returned for convenience
     * @author Duy Nguyen
     */
    public function put($key, $value, $minutes = false);

    /**
     * Test if item exists in cache
     * Only returns true if exists && is not expired.
     *
     * @param string : cache item key
     * @param string $key
     * @return bool If cache item exists
     * @author Duy Nguyen
     */
    public function has($key);

    /**
     * Flush cache
     *
     * @return bool If cache is flushed
     * @author Duy Nguyen
     */
    public function flush();
}