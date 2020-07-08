<?php

namespace aubreypwd\Composer\Uninstall;

use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;

class CommandProvider implements CommandProviderCapability
{
	public function getCommands()
	{
		return array(new Command);
	}
}
