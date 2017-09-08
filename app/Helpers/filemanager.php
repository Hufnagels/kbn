<?php

function fm_filename($data, $actioneventName = NULL, $request = NULL)
{
  $filename = NULL;
  if (file_exists($data))
  {
    $filename = asset($imageDirectory.'/'. $this->image);
  }
  return $filename;
}
