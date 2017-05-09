<?php
namespace ModFeed\Controller;

use ModFeed\Config\ConfigInterface;
use ModFeed\Config\ConfigXml;
use Vinelab\Rss\Rss;

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 05/05/17
 * Time: 14:50
 */
class FeedController extends BaseControler
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @return ConfigInterface
     */
    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $config
     * @return FeedController
     */
    public function setConfig(ConfigInterface $config): FeedController
    {
        $this->config = $config;
        return $this;
    }

    public function __construct(\Twig_Environment $twig, ConfigInterface $config)
    {
        parent::__construct($twig);
        $this->setConfig($config);
    }

    public function getFeedAction()
    {
        $rss = new Rss();

        // Appel static du flux rss
        $feed = $rss->feed($this->getConfig()->getUrl());

        // Vue
        $template = $this->getView()->load('feed.html');
        $articles = [];
        foreach ($feed->articles() as $article) {
            $articles[] = ['title' => $article->title];
        }
        return $template->render(array('articles' => $articles));
    }
}
