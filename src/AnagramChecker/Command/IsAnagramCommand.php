<?php


namespace Jubstuff\AnagramChecker\Command;


use Jubstuff\AnagramChecker\AnagramChecker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class IsAnagramCommand extends Command
{
    protected static $defaultName = 'is-anagram';

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Welcome to "Is Anagram?"',
            "Enter two strings and I'll tell you if they are anagrams.",
            '',
        ]);

        $questionHelper = $this->getHelper('question');

        $question = new Question('Enter the first string: ', '');
        $word1    = $questionHelper->ask($input, $output, $question);

        $question = new Question('Enter the second string: ', '');
        $word2    = $questionHelper->ask($input, $output, $question);


        $am = new AnagramChecker();

        if ($am->isAnagram($word1, $word2)) {
            $output->writeln([
                sprintf('"%s" and "%s" are anagrams.', $word1, $word2),
            ]);
        } else {
            $output->writeln([
                sprintf('"%s" and "%s" are not anagrams.', $word1, $word2),
            ]);
        }


    }
}
