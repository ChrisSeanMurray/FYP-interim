<?php

namespace App\Traits;

use Cache;
use Hashids;

trait HashidTrait
{
    /**
     * Get a unique ID for the current Model. We look for a key
     * in the config/modelids.php file If it doesn't exist
     * then the current model just gets a default ID of 1
     *
     * @return integer
     */
    public function getModelIdAttribute()
    {
        return config('modelids.' . get_called_class(), 1);
    }

    /**
     * Returns a hashed id for the current model
     *
     * @return string
     */
    public function getHashidAttribute()
    {
        return cache()->rememberForever(
            $this->getHashidCacheKey('hashid'),
            function () {
                $modelId = isset($this->modelId) ? $this->modelId : 0;
                return Hashids::encode([$this->id, $modelId]);
            }
        );
    }

    /**
     * Convers an array from $key => $id, to $key => $hashid
     *
     * @param  array  $array         The input array from a pluck() model query
     * @param  integer $hashSecondKey The unique second value corresponding to each $modelId
     * @return array
     */
    private function hashValues($array, $hashSecondKey = 1)
    {
        $hashedArray = [];
        foreach ($array as $key => $value) {
            $hashedArray[$key] = app('hashids')->encode([$value, $hashSecondKey]);
        }
        return $hashedArray;
    }

    /**
     * Get a unique cache key for any model based on the class name
     * optionally adding a prefix
     *
     * @param  string $prefix An optional prefix
     * @return string         An md5 hash of the unique cache name
     */
    public function getHashidCacheKey($prefix = null)
    {
        // Found that sometimes things like super admin didn't
        // have an updated at timestamp so need to double check it here
        $timestamp = $this->updated_at instanceof \Carbon\Carbon
                        ? $this->updated_at->toDateTimeString()
                        : null;
        $key = $prefix .
                get_class($this) .
                $this->id .
                $timestamp;

        return md5($key);
    }
}
