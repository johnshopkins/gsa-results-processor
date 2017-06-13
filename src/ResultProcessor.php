<?php

namespace GSAResultsProcessor;

class ResultProcessor extends Base
{
  protected $map = array(
    "U" => "url",
    "UE" => "urlEscaped",
    "T" => "title",
    "RK" => "relevance",
    "S" => "snippet"
  );

  protected function process__snippet($object)
  {
    return strip_tags($object, "<b><i><strong></em>");
  }
}
