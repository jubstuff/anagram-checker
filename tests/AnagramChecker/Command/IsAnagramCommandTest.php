<?php

namespace Jubstuff\Test\AnagramChecker\Command;

use Jubstuff\AnagramChecker\Command\IsAnagramCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class IsAnagramCommandTest extends TestCase
{
    public function testExecute()
    {
        $application = new Application();
        $application->add(new IsAnagramCommand());

        $command       = $application->find('is-anagram');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertContains('Welcome to "Is Anagram?"', $output);

    }
}
