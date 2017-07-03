<?php
/**
 * Created by PhpStorm.
 * User: Alexandar
 * Date: 7/3/2017
 * Time: 11:35 AM
 */

namespace CyberJaw\GoogleMapsBundle\Service;


class GoogleApi
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @param $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
}