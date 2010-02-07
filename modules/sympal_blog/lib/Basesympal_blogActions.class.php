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
  public function executeMonth($request)
  {
    $this->menuItem = Doctrine::getTable('sfSympalMenuItem')->findOneBySlug('blog');
    $this->month = $request->getParameter('m');
    $this->year = $request->getParameter('y');
    $this->pager = Doctrine::getTable('sfSympalBlogPost')->retrieveBlogMonth($this->month, $this->year);
    $this->content = $this->pager->getResults();
  }
}
