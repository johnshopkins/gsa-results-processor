<?php

namespace GSAResultsProcessor;

abstract class Base
{
  public function __construct()
  {

  }

  public function process($object)
  {
    return $this->processObject($object, $this->map);
  }

  protected function processObject($object, $map, &$target = null)
  {
    if (!$target) {
      $target = new \StdClass();
    }

    foreach ($map as $key => $value) {

      if (!isset($object->$key)) continue;

      $methodName = "process__{$value}";
      if (method_exists($this, $methodName)) {
        $target->$value = $this->$methodName($object->$key);
      } else {
        $target->$value = (string) $object->$key;
      }

    }

    return $target;
  }
}
