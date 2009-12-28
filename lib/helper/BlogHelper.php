<?php

function render_blog_post_author(sfSympalContent $content, $slot)
{
  return $content->CreatedBy->username;
}

function render_blog_post_date_published(sfSympalContent $content, $slot)
{
  use_helper('Date');
  return format_datetime($content->date_published);
}