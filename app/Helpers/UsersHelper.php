<?php
function gravator_for($user, $options = ["size" => 80])
{
  $gravator_id = md5(strtolower(trim($user->email)));
  $size = $options["size"];
  return "http://www.gravatar.com/avatar/" . $gravator_id . "?s=" . $size;
}
