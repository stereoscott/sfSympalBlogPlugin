<?php

class sfSympalBlogPluginInstall extends sfSympalPluginManagerInstall
{
  public function customInstall($installVars)
  {
    $installVars['content']['BlogPost']['teaser'] = 'This is the teaser line for the sample blog post';
    $installVars['content']->save();
    $installVars['contentType']->save();

    $this->saveMenuItem($installVars['menuItem']);

    $properties = array(
      'partial_path' => 'sympal_blog/view',
      'is_default' => true
    );
    $contentTemplate = $this->newContentTemplate('View BlogPost', $installVars['contentType'], $properties);
    $contentTemplate->save();

    $properties = array(
      'partial_path' => 'sympal_blog/list'
    );
    $contentTemplate = $this->newContentTemplate('List BlogPost', $installVars['contentType'], $properties);
    $contentTemplate->save();

    $installVars['contentList']->Template = $contentTemplate;
    $installVars['contentList']->save();
  }
}