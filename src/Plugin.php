<?php

namespace aubreypwd\Composer\Uninstall;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\EventDispatcher\EventSubscriberInterface;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
    }

    public static function getSubscribedEvents()
    {
        return [];
    }

    public function getCapabilities()
    {
        return array(
            'Composer\Plugin\Capability\CommandProvider' => 'aubreypwd\Composer\Uninstall\CommandProvider',
        );
    }
}
