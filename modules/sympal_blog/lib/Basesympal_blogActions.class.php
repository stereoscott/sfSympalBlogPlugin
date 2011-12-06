<?php

/**
 * Base actions for the sfSympalBlogPlugin sympal_blog module.
 *
 * @package     sfSympalBlogPlugin
 * @subpackage  sympal_blog
 * @author      Your name here
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class Basesympal_blogActions extends sfActions
{
    /**
     * An action that filters posts by year and month
     */
    public function executeMonth(sfWebRequest $request)
    {
        $month = $request->getParameter('m');
        $year = $request->getParameter('y');

        $this->menuItem = $this->_getBlogMenuItem();
        $this->pager = Doctrine_Core::getTable('sfSympalBlogPost')->retrieveBlogMonth($month, $year);
        $this->contents = $this->pager->getResults();

        $this->breadcrumbsTitle = format_date(strtotime($year.'/'.$month.'/01'), 'MMMM yyyy');

        $this->title = sprintf(__('Posts for the month of %s'), $this->breadcrumbsTitle);

        $this->setTemplate('list');
    }

    /**
     * An action that filters posts by tags
     */
    public function executeTag(sfWebRequest $request)
    {
        $tag = $request->getParameter('tag');

        $this->menuItem = $this->_getBlogMenuItem();
        $this->pager = Doctrine_Core::getTable('sfSympalTag')->retrieveContentByTag('sfSympalBlogPost', $tag);
        $this->content = $this->pager->getResults();

        $this->title = sprintf(__('Posts tagged with "%s"'), $tag);
        $this->breadcrumbsTitle = sprintf(__('Posts tagged with "%s"'), $tag);
        $blog = sfSympalConfig::get('blog');
        if (is_array($blog)) {
            $username = $blog['dtag']['username'];
            $number = $blog['dtag']['number'];
            $this->dtag = new sfOutputEscaperSafe($this->_renderDeliciousTag($username, $tag, $number));
        }

        $this->setTemplate('list');
    }


    /**
     * Returns the default blog menu item so that the breadcrumbs can be
     * properly rendered
     *
     * @return sfSympalMenuItem
     */
    protected function _getBlogMenuItem()
    {
        return Doctrine_Core::getTable('sfSympalMenuItem')->findOneBySlug('blog');
    }

	protected function _isOdd($n)
	{
		return $n & 1; // 0 = even, 1 = odd
	}
    protected function _renderDeliciousTag($username, $tag, $number = 20)
    {
        $delicious_url = 'http://feeds.delicious.com/v2/rss/';
        $name = 'nicolas.ippolito';
        $request = $delicious_url . $name . '/' . $tag . '?count=' . $number . '&sort=date';
        $rendered = '<h2>' . sprintf(__('Delicious for %s'), $tag) . '</h2>';
        try {
            $feed = sfFeedPeer::createFromWeb($request, array('adapter' => 'sfCurlAdapter', 'adapter_options' => array('Timeout' => 10)));
        } catch (Exception $e) {

            return sprintf('<p>%s</p>', __('No network available!'));
        }

		$rendered .= '<p><div class="delicious-posts"><ul class="delicious-posts">';
		$i = 0;
		foreach ($feed->getItems() as $bookmark) {
			$class = $this->_isOdd($i) == 0 ? "even" : "odd";
			$rendered .= '<li class="delicious-post ' . $class . '"><a href="'.$bookmark->getLink().'">'.$bookmark->getTitle().'</a></li>';
			$i++;
        }
		$class = $this->_isOdd($i) == 0 ? "even" : "odd";
        $rendered .= '<li class="delicious-post ' . $class . '"><a href="http://delicious.com/' . $name . "/" . $tag . '">...</a></li>';
        $rendered .= "</ul></div></p>";

        return $rendered;
	}

}
