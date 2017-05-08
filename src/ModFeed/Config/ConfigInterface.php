<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 06/05/17
 * Time: 10:08
 */

namespace ModFeed\Config;


interface ConfigInterface
{
    public function getUrl() : string;

    public function load();
}
