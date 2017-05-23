# GSA Results Processor

Processes the XML output from a GSA into a readable format. Documentation of the results format can be found here: https://support.google.com/gsa/answer/6329225

## Usage

```php
$processor = new \GSAResultsProcessor\TopLevelProcessor();
$results = $processor->process($xml);
```
