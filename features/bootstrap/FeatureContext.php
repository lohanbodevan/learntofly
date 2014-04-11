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
 */
class FeatureContext extends BehatContext
{
    protected $file;
    protected $fileSize;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->file = "img/imagem.jpeg";
        $this->fileSize = 0;
    }

    /**
     * @Given /^file is in directory$/
     */
    public function fileIsInDirectory()
    {
        if (file_exists($this->file)) {
            echo "The file is in directory";
        }
    }

    /**
     * @Given /^file size is less then (\d+)kb$/
     */
    public function fileSizeIsLessThenKb($arg1)
    {
        if (fileSize($this->file) < $this->fileSize) {
            
        }
    }

    /**
     * @When /^I do "([^"]*)"$/
     */
    public function iDo($arg1)
    {
        
    }

    /**
     * @Then /^I should get:$/
     */
    public function iShouldGet(PyStringNode $string)
    {
        
    }

}
