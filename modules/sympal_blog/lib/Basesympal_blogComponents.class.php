<?php

/**
 * Base components for the sfSympalBlogPlugin sympal_blog module.
 * 
 * @package     sfSympalBlogPlugin
 * @subpackage  sympal_blog
 * @author      Your name here
 * @version     SVN: $Id: BaseComponents.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class Basesympal_blogComponents extends sfComponents
{
  public function executeSidebar()
  {
    $this->latestPosts = Doctrine::getTable('sfSympalBlogPost')->retrieveLatestPosts(5);
    $this->authors = Doctrine::getTable('sfSympalBlogPost')->retrieveTopAuthors(5);
    $this->months = Doctrine::getTable('sfSympalBlogPost')->retrieveMonths();
  }
}