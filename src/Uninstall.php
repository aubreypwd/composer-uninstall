<?php

namespace aubreypwd\Composer\Uninstall;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Naucon\File\File;

class Uninstall extends BaseCommand {
	protected function configure() {
		$this->setName( 'uninstall' );
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$cwd = getcwd();
		$packages = explode( "\n", shell_exec( 'composer show --name-only' ) );

		if ( ! is_array( $packages ) ) {
			die( "Nothing to uninstall.\n" );
		}

		$remove = [];

		echo "Discovering packages...\n";

		foreach ( $packages as $package ) {
			$package = trim( $package );

			if ( empty( $package ) ) {
				continue;
			}

			$package_json = json_decode( shell_exec( "composer show --format json {$package}" ), true );

			if ( ! is_array( $package_json ) ) {
				continue;
			}

			$path = '/' . trim( $package_json['path'], '/' );

			if ( ! stristr( $path ?? '', $cwd ) ) {
				continue; // Ensure that the path is in the current working directory, if not, something is off.
			}

			if ( ! file_exists( $path ) ) {
				continue;
			}

			echo " - Discovered {$package_json['name']}...\n";

			$remove[ $package_json['name'] ] = $path;
		}

		echo "Uninstalling packages...\n";

		foreach ( $remove as $package => $path ) {
			$relative_path = trim( str_ireplace( $cwd, '', $path ), '/' );

			if ( ! file_exists( $path ) ) {
				continue;
			}

			echo " - Deleting {$relative_path} for {$package}...\n";

			$file = new File( $path );
			@$file->deleteAll();

			if ( file_exists( $path ) ) {
				echo "  - [Error] Could not delete {$path}!";
			}

			sleep( 1 / 2 );
		}
	}
}
