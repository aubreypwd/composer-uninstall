<?php

namespace aubreypwd\Composer\Uninstall;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends BaseCommand
{

	protected function configure()
	{
		$this->setName( 'uninstall' );
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		require_once dirname( __FILE__ ) . '/../inc/uninstall.php';
	}
}
