<?php


namespace Jubstuff\AnagramChecker\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IsAnagramCommand extends Command
{
    protected static $defaultName = 'is-anagram';

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Welcome to "Is Anagram?"'
        ]);
    }
}

//class HappyBirthdayCommand extends Command
//{
//
//    protected function configure()
//    {
//        $this->setDescription('Wishes you good birthday')
//             ->setHelp('This command wishes you good birthday')
//             ->addOption('name', '-u', InputArgument::OPTIONAL, 'The person you\'re wishing good birthday');
//
//    }
//
//    protected function execute(InputInterface $input, OutputInterface $output)
//    {
//        $who = $input->getOption('name') ?? '';
//
//        $msg = empty($who) ? 'Happy Birthday!!' : sprintf('Happy Birthday, %s!!', $who);
//
//        $output->writeln([
//            $msg
//        ]);
//    }
//
//}
