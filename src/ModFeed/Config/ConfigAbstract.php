<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 06/05/17
 * Time: 10:09
 */

namespace ModFeed\Config;


abstract class ConfigAbstract implements ConfigInterface
{
    /**
     * @var string
     */
    private $configFile;

    /**
     * @var string
     */
    private $url;

    /**
     * @return string
     */
    public function getConfigFile(): string
    {
        return $this->configFile;
    }

    /**
     * @param string $configFile
     * @return ConfigAbstract
     */
    public function setConfigFile(string $configFile): ConfigAbstract
    {
        $this->configFile = $configFile;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if ('' == $this->url) $this->load();
        return $this->url;
    }

    /**
     * @param string $url
     * @return ConfigXml
     */
    public function setUrl(string $url): ConfigInterface
    {
        $this->url = $url;
        return $this;
    }

    public function load()
    {
        $this->_load();
    }

    abstract protected function _load();
}
