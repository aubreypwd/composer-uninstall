<?php

namespace aubreypwd\Composer\Uninstall;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;

if ( is_readable( __DIR__ . '/../vendor/autoload.php' ) ) {
	require_once __DIR__ . '/../vendor/autoload.php';
}

class Plugin implements PluginInterface, Capable {
	public function activate( Composer $composer, IOInterface $io ) {
		// Nothing, only makes command.
	}

	public function getCapabilities() {
		return [
			'Composer\Plugin\Capability\CommandProvider'
				=> 'aubreypwd\Composer\Uninstall\CommandProvider',
		];
	}
}
