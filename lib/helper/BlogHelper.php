<?php

function render_blog_post_author($content, $slot)
{
  return $content->CreatedBy->username;
}