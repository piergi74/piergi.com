<?php

namespace PRG\FrontendBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Process\Process;


/**
 * Deploy website command for demo purposes.
 *
 * You could also extend from Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand
 * to get access to the container via $this->getContainer().
 *
 * @author Tobias Schultze <http://tobion.de>
 */
class DeployWebsiteCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
      $this
        ->setName('prg:deploy-website')
        ->setDescription('Deploy website command')
        //addArgument($name, $mode = null, $description = '', $default = null)
        ->addArgument('source', InputArgument::REQUIRED, 'Source directory')    
        ->addArgument('destination', InputArgument::REQUIRED, 'Destination host')
        //->addArgument('who', InputArgument::OPTIONAL, 'Who to greet.', 'World')
        //addOption($name, $shortcut = null, $mode = null, $description = '', $default = null)
        ->addOption('exclude', 'exc', InputOption::VALUE_REQUIRED, 'Exclude file')     
        ->addOption('username', 'u', InputOption::VALUE_REQUIRED, 'Username')   
        ->addOption('module', 'm', InputOption::VALUE_REQUIRED, 'Module')  
        ->addOption('target', null, InputOption::VALUE_NONE, 'Target directory')   
        ->addOption('delete', null, InputOption::VALUE_NONE, 'Delete remote content') 
        ->addOption('go', null, InputOption::VALUE_NONE, 'Do the deployment') 
        //->addOption('pwdfile', null, InputOption::VALUE_NONE, 'Password file', '../../docs/rsync.passwd') 
        ->setHelp(<<<EOF
  The [prg:deploy-website|INFO] task deploys the website:

  [php app/console prg:deploy-website source destination --delete --username|INFO]
EOF
      );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $cmd = 'rsync -rtuvz';
      
      if ($input->getOption('exclude')) {
        $cmd .=  ' --exclude-from=' . $input->getOption('exclude');
      }      
      $cmd .= ' ';
      $cmd .= $input->getArgument('source');
      $cmd .= ' ';
      $cmd .= ($input->getOption('username') ? $input->getOption('username') . '@' : '');
      $cmd .= $input->getArgument('destination') . ':';
      
      if($input->getOption('module') && $input->getOption('target'))
        throw new \Exception('Cannot specify both "module" and "target"');
      if(!$input->getOption('module') && !$input->getOption('target'))
        throw new \Exception('Specify one between "module" and "target"');  
      
      if($input->getOption('module'))
        $cmd .= ':' . $input->getOption('module');
      if($input->getOption('target'))
        $cmd .= ':' . $input->getOption('target');
      
      if($input->getOption('delete'))
        $cmd .= ' --delete';
      
      $cmd .= ' ';
      $cmd .= ($input->getOption('go') ? '' : '--dry-run ');

      
      $process = new Process($cmd);
      $process->run();
      
      // executes after the command finishes
      if (!$process->isSuccessful()) {
        throw new \RuntimeException($process->getErrorOutput());
      }

      echo $process->getOutput();      
    }
}
