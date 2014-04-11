<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 * @author Lohan Bodevan <lohan.bodevan@gmail.com>
 */
class FeatureContext extends BehatContext
{

    protected $file;
    protected $dir;
    protected $fileSize;
    protected $return;
    protected $maxFileSize;
    
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->maxFileSize = 700 * 128;
    }

    /**
     * @Given /^directory "([^"]*)" exists$/
     */
    public function directoryExists($arg1)
    {
        if (!file_exists($arg1)) {
            mkdir($arg1);
        }

        $this->dir = $arg1;
    }

    /**
     * @Given /^I have a file named "([^"]*)"$/
     */
    public function iHaveAFileNamed($arg1)
    {
        if(!file_exists($this->dir."/".$arg1)) {
            copy("img/".$arg1, $this->dir."/".$arg1);
        }
        $this->file = $arg1;
    }

    /**
     * @When /^I do filesize$/
     */
    public function iDoFilesize()
    {
        $this->fileSize = filesize($this->dir."/".$this->file);
    }

    /**
     * @Then /^I should see "([^"]*)"$/
     */
    public function iShouldSee($arg1)
    {
        if($this->fileSize >= $this->maxFileSize) {
            throw new Exception(
                "File size is " . ($this->fileSize/128) . "kb"
            );    
        }
    }
}
