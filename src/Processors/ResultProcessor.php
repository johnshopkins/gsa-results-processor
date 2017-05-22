<?php

namespace GSAResultsProcessor\Processors;

class ResultProcessor extends Base
{
  protected $map = array(
    "U" => "url",
    "UE" => "urlEscaped",
    "T" => "title",
    "RK" => "relevance",
    "S" => "snippet"
  );
}
