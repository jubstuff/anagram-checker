<?php

namespace Jubstuff\Test\AnagramChecker\Command;

use Jubstuff\AnagramChecker\Command\IsAnagramCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

class IsAnagramCommandTest extends TestCase
{
    /**
     * @var CommandTester
     */
    protected $commandTester;

    /**
     * @var Command
     */
    protected $command;

    protected function setUp()
    {
        $application = new Application();
        $application->add(new IsAnagramCommand());

        $this->command       = $application->find('is-anagram');
        $this->commandTester = new CommandTester($this->command);
    }

    public function testPromptIsCorrectlyPrinted()
    {
        $this->commandTester->setInputs([
            'first-word',
            'second-word',
        ]);

        $this->commandTester->execute([
            'command' => $this->command->getName(),
        ]);

        // the output of the command in the console
        $output = $this->commandTester->getDisplay();
        $this->assertContains('Welcome to "Is Anagram?"', $output);
        $this->assertContains('Enter the first string', $output);
        $this->assertContains('Enter the second string', $output);
    }

    public function testExecutionWithAnagrams()
    {
        $this->commandTester->setInputs([
            'roma',
            'amor',
        ]);

        $this->commandTester->execute([
            'command' => $this->command->getName(),
        ]);

        // the output of the command in the console
        $output = $this->commandTester->getDisplay();

        $this->assertContains('"roma" and "amor" are anagrams.', $output);
    }

    public function testExecutionWithNoAnagrams()
    {
        $this->commandTester->setInputs([
            'roma',
            'asd',
        ]);

        $this->commandTester->execute([
            'command' => $this->command->getName(),
        ]);

        // the output of the command in the console
        $output = $this->commandTester->getDisplay();

        $this->assertContains('"roma" and "asd" are not anagrams.', $output);
    }


}
