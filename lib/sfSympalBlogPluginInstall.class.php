<?php

class sfSympalBlogPluginInstall extends sfSympalPluginManagerInstall
{
  public function customInstall($installVars)
  {
    $installVars['content']['BlogPost']['teaser'] = 'This is the teaser line for the sample blog post';
    $installVars['content']->save();
    $installVars['contentType']->save();

    $this->saveMenuItem($installVars['menuItem']);

    $contentTemplate = new ContentTemplate();
    $contentTemplate->name = 'View BlogPost';
    $contentTemplate->partial_path = 'sympal_blog/view';
    $contentTemplate->is_default = true;
    $contentTemplate->ContentType = $installVars['contentType'];
    $contentTemplate->save();

    $contentTemplate = new ContentTemplate();
    $contentTemplate->name = 'List BlogPost';
    $contentTemplate->partial_path = 'sympal_blog/list';
    $contentTemplate->ContentType = $installVars['contentType'];
    $contentTemplate->save();

    $installVars['contentList']->Template = $contentTemplate;
    $installVars['contentList']->save();
  }
}