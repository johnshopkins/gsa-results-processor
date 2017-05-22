<?php

namespace GSAResultsProcessor\Processors;

class KeyMatchProcessor extends Base
{
  protected $map = array(
    "GL" => "url",
    "GD" => "description"
  );
}
