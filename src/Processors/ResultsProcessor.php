<?php

namespace GSAResultsProcessor\Processors;

class ResultsProcessor extends Base
{
  protected $map = array(
    "M" => "total",
    "NB" => "pagination",
    "R" => "results"
  );

  public function process($object)
  {
    return $this->processObject($object, $this->map);
  }

  protected function process__pagination($object)
  {
    $processor = new PaginationProcessor();
    return $processor->process($object);
  }

  protected function process__results($object)
  {
    $return = array();
    $processor = new ResultProcessor();

    foreach ($object as $result) {
      $return[] = $processor->process($result);
    }

    return $return;
  }
}
