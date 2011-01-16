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
        $config = sfSympalConfig::get('blog', 'sidebar', array());

        if (isset($config['display']))
        {
            $this->widgets = array();
            foreach($config['display'] as $name)
            {
                if (in_array($name, $config['display']))
                {
                    $this->widgets[] = $config['widgets'][$name];
                }
            }
        }
        else
        {
            $this->widgets = $config['widgets'];
        }
    }

    /**
     * Executes the "latest posts" section of the sidebar
     */
    public function executeLatest_posts(sfWebRequest $request)
    {
        $this->latestPosts = Doctrine::getTable('sfSympalBlogPost')->retrieveLatestPosts(sfConfig::get('app_sympal_config_blog_post_history', '20'));
    }

    public function executeMonthly_history(sfWebRequest $request)
    {
        $this->months = Doctrine::getTable('sfSympalBlogPost')->retrieveMonths();
    }
}
