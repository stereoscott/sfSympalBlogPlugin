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

        $this->menuItem = $this->getBlogMenuItem();
        $this->pager = Doctrine::getTable('sfSympalBlogPost')->retrieveBlogMonth($month, $year);
        $this->contents = $this->pager->getResults();

        $this->breadcrumbsTitle = format_date(strtotime($year.'/'.$month.'/01'), 'MMMM yyyy');

        $this->title = sprintf(__('Posts for the month of %s'), $this->breadcrumbsTitle);

        $this->setTemplate('list');
    }

    /**
     * Returns the default blog menu item so that the breadcrumbs can be
     * properly rendered
     *
     * @return sfSympalMenuItem
     */
    protected function getBlogMenuItem()
    {
        return Doctrine::getTable('sfSympalMenuItem')->findOneBySlug('blog');
    }

    /**
     *    * An action that filters posts by tags. This requires the sfSympalTagsPlugin
     *       */
    public function executeTag(sfWebRequest $request)
    {
        $tag = $request->getParameter('tag');

        $this->menuItem = $this->getBlogMenuItem();
        $this->pager = Doctrine_Core::getTable('sfSympalTag')->retrieveContentByTag('sfSympalBlogPost', $tag);
        $this->content = $this->pager->getResults();

        $this->title = sprintf(__('Posts tagged with "%s"'), $tag);
        $this->breadcrumbsTitle = sprintf(__('Posts tagged with "%s"'), $tag);

        $this->setTemplate('list');
    }
}
