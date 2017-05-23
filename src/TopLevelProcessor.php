<?php

namespace GSAResultsProcessor;

class TopLevelProcessor extends Base
{
  protected $map = array(
    "Q" => "query",
    "GM" => "keyMatches",
    "RES" => "results",
    "Spelling" => "suggestion"
  );

  public function process($object)
  {
    if (!$object || !is_object($object)) {
      throw new \InvalidArgumentException("Invalid object passed to TopLevelProcessor.");
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
    $processor = new ResultsProcessor();
    return $processor->process($object);
  }

  protected function process__suggestion($object)
  {
    return (string) $object->Suggestion->attributes()->q;
  }
}
