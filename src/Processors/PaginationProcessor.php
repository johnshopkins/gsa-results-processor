<?php

namespace GSAResultsProcessor\Processors;

class PaginationProcessor extends Base
{
  protected $map = array(
    "NU" => "next",
    "PU" => "prev"
  );
}
