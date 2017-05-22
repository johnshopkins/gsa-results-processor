<?php

namespace GSAResultsProcessor\Processors;

class TopLevelProcessor extends Base
{
  protected $map = array(
    "Q" => "query",
    "GM" => "keyMatches",
    "RES" => "results",
    "Spelling" => "suggestions"
  );

  protected function process($object)
  {
    if (!$object || !is_object($xml)) {
      throw new \Exception("Invalid object passed to TopLevelProcessor.");
    }

    return parent::process($object);
  }

  protected function process__keyMatches($object)
  {
    $return = array();
    $processor = new KeyMatchProcessor();

    foreach ($object as $result) {
      $return[] = $processor->process($result);
    }

    return $return;
  }

  protected function process__results($object)
  {
    $return = array();
    $processor = new ResultsProcessor();

    foreach ($object as $result) {
      $return[] = $processor->process($result);
    }

    return $return;
  }

  protected function process__suggestions($object)
  {
    return (string) $object->Suggestion->attributes()->q;
  }
}
