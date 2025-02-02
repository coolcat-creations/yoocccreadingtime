<?php

defined('_JEXEC') || exit();

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Plugin\CMSPlugin;
use YOOtheme\Application;

class plgSystemYoocccreadingtime extends CMSPlugin
{
    /**
     * @var CMSApplication
     */
    public $app;

    /**
     * Use 'onAfterInitialise' event.
     */
    public function onAfterInitialise()
    {
        // Check if the YOOtheme app class exists
        if (!class_exists(Application::class, false)) {
            return;
        }

        // Load module from the same directory
        $app = Application::getInstance();
        $app->load(__DIR__ . '/modules/*/bootstrap.php');
    }
}
