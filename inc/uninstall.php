<?php // @codingStandardsIgnoreStart.
/**
 * Composer Uninstall.
 *
 * This will loop through installed packages and delete the folders
 * of those packages. When not using a simple /vendor folder for this,
 * this makes it easy to to a simple re-install of all packages.
 *
 * I would chmod +x this file, then create an alias that will execute this
 * script.
 *
 * See example at: https://github.com/aubreypwd/Bash/search?q=composer+uninstall&unscoped_q=composer+uninstall
 *
 * @version  1.0.1  Monday, October 29, 2018 <Better progress messages.>
 * @author          Aubrey Portwood <aubrey@webdevstudios.com>
 */

global $output;

$paths = explode( "\n", shell_exec( 'composer show --path' ) );
$packages = explode( "\n", shell_exec( 'composer show --name-only') );

if ( ! is_array( $paths ) || ! is_array( $packages ) ) {
	die( "Nothing to uninstall.\n" );
}

foreach ( $paths as $k => $p ) {
	foreach ( $packages as $package ) {
		$paths[ $k ] = preg_replace( "/^" . str_replace( '/', '\/', $package ) . "\s/", '', $paths[ $k ] );
	}
}

foreach ( array_unique( $paths ) as $path ) {
	$path = '/' . trim( $path, '/' );

	if ( empty( $path ) ) {
		continue;
	}

	if ( ! file_exists( $path ) || ! is_dir( $path ) ) {
		echo "Skipping {$path}...\n";
		continue;
	}

	echo "Removing {$path}...\n";
}
