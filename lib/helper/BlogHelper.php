<?php

function render_blog_post_author(sfSympalContent $content, $slot)
{
  return $content->CreatedBy->username;
}