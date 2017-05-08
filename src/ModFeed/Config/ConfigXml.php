<?php
namespace ModFeed\Config;

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 06/05/17
 * Time: 09:56
 */
class ConfigXml extends ConfigAbstract
{
    public function __construct($configFile)
    {
        if (!file_exists($configFile)) throw new \Exception("Fichier XML introuvable.");

        $this->setConfigFile($configFile);
    }

    protected function _load()
    {
        $xml = simplexml_load_file($this->getConfigFile());

        if (!property_exists($xml, 'url')) throw new \LogicException("Erreur de configuration.");

        $this->setUrl($xml->url[0]);
    }
}
