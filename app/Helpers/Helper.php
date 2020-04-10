<?php
function fullTitle($page_title = '')
{
  $base_title = 'Ruby on Rails Tutorial Sample App';
  if (empty($page_title)) {
    return $base_title;
  } else {
    return $page_title . ' | ' . $base_title;
  }
}
