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
    $month = $request->getParameter('m');
    $year = $request->getParameter('y');
    
    $this->menuItem = Doctrine::getTable('sfSympalMenuItem')->findOneBySlug('blog');
    $this->pager = Doctrine::getTable('sfSympalBlogPost')->retrieveBlogMonth($month, $year);
    $this->content = $this->pager->getResults();
    

    $this->breadcrumbsTitle = date('M Y', strtotime($month.'/01/'.$year));
    $this->title = 'Posts for the month of ' . $this->breadcrumbsTitle;
    
    $this->setTemplate('list');
  }
}
