<?php
namespace ModFeed\Config;

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 06/05/17
 * Time: 09:56
 */
class ConfigPhp extends ConfigAbstract
{
    public function __construct($configFile)
    {
        if (!file_exists($configFile)) throw new \Exception("Fichier XML introuvable.");

        $this->setConfigFile($configFile);
    }

    protected function implementLoading()
    {
        $conf = include $this->getConfigFile();

        if (!array_key_exists('url', $conf)) throw new \LogicException("Erreur de configuration.");

        $this->setUrl($conf['url']);
    }
}
