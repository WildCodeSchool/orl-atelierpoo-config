<?php
namespace ModFeed\Config;

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 06/05/17
 * Time: 09:56
 */
class ConfigIni extends ConfigAbstract
{
    protected function implementLoading()
    {
        $ini = parse_ini_file($this->getConfigFile());

        if (!array_key_exists('url', $ini)) throw new \LogicException("Erreur de configuration.");

        $this->setUrl($ini['url']);
    }
}
