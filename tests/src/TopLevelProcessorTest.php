<?php

namespace GSAResultsProcessor;

class TopLevelProcessorTest extends \PHPUnit_Framework_TestCase
{
  public function testExceptionThrown()
  {
    $this->expectException(\InvalidArgumentException::class);

    $processor = new TopLevelProcessor();
    $processor->process(array());
  }

  public function testSpellingSuggestion()
  {
    $expected = new \StdClass();
    $expected->query = "admissins";
    $expected->suggestion = "admissions";

    $xml = simplexml_load_file(dirname(__DIR__) . "/files/suggestion.xml");
    $processor = new TopLevelProcessor();
    $results = $processor->process($xml);

    $this->assertEquals($expected, $results);
  }

  public function testResults()
  {
    $expected = new \StdClass();
    $expected->query = "admissions";
    $expected->keyMatches = array(json_decode(json_encode(array(
      "url" => "http://www.jhu.edu/admissions/",
      "description" => "Admissions & Aid"
    )), FALSE));
    $expected->results = json_decode(json_encode(array(
      "total" => "4270",
      "pagination" => array(
        "next" => "/search?q=admissions&num=2&site=jhuedu&lr=&ie=UTF-8&output=xml_no_dtd&client=jhu_frontend&access=p&sort=date:D:L:d1&start=2&sa=N"
      ),
      "results" => array(
        array(
          "url" => "http://www.hopkinsmedicine.org/som/admissions/",
          "urlEscaped" => "http://www.hopkinsmedicine.org/som/admissions/",
          "title" => "Johns Hopkins School of Medicine <b>Admissions</b>",
          "relevance" => "10",
          "snippet" => "<b>...</b> Johns Hopkins School of Medicine <b>Admissions</b>. <b>...</b> Online applications, <b>admission</b><br> requirements, financial aid, even information on the benefits of <b>...</b>  "
        ),
        array(
          "url" => "https://www.jhu.edu/admissions/",
          "urlEscaped" => "https://www.jhu.edu/admissions/",
          "title" => "<b>Admissions</b> &amp; Aid | Johns Hopkins University",
          "relevance" => "10",
          "snippet" => "<b>...</b> Undergraduate <b>Admissions</b>. <b>...</b> fall semester from August through January (through<br> March for transfer applicants) for undergraduate <b>admission</b> to our <b>...</b>  "
        )
      )
    )), FALSE);

    $xml = simplexml_load_file(dirname(__DIR__) . "/files/results.xml");
    $processor = new TopLevelProcessor();
    $results = $processor->process($xml);

    // print_r($expected); die();

    $this->assertEquals($expected, $results);
  }
}
