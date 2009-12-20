<?php

class sfSympalBlogPluginInstall extends sfSympalPluginManagerInstall
{
  public function customInstall($installVars)
  {
    $installVars['content']['sfSympalBlogPost']['teaser'] = 'This is the teaser line for the sample blog post';
    $installVars['content']->save();
    $installVars['contentType']->save();

    $installVars['menuItem']['label'] = 'Blog';

    $this->saveMenuItem($installVars['menuItem']);

    $properties = array(
      'path' => 'sympal_blog/view',
      'is_default' => true
    );
    $contentTemplate = $this->newContentTemplate('View BlogPost', $installVars['contentType'], $properties);
    $contentTemplate->save();

    $properties = array(
      'path' => 'sympal_blog/list'
    );
    $contentTemplate = $this->newContentTemplate('List BlogPost', $installVars['contentType'], $properties);
    $contentTemplate->save();

    $installVars['contentList']->sort_column = 'id';
    $installVars['contentList']->sort_order = 'DESC';
    $installVars['contentList']->Template = $contentTemplate;
    $installVars['contentList']->save();
  }
}