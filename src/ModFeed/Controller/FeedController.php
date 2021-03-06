<?php
namespace ModFeed\Controller;

use Vinelab\Rss\Rss;

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 05/05/17
 * Time: 14:50
 */
class FeedController extends BaseControler
{
    public function getFeedAction()
    {
        $rss = new Rss();

        // Appel static du flux rss
        $feed = $rss->feed('http://feeds.reuters.com/news/artsculture');

        // Vue
        $template = $this->getView()->load('feed.html');
        $articles = [];
        foreach ($feed->articles() as $article) {
            $articles[] = ['title' => $article->title];
        }
        return $template->render(array('articles' => $articles));
    }
}
