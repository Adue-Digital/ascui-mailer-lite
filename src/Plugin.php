<?php

namespace Adue\Ascui;

use Adue\Ascui\Api\MailerLiteApi;
use Adue\WordPressBasePlugin\Base\Loader;
use Adue\WordPressBasePlugin\BasePlugin;

class Plugin extends BasePlugin
{

    public function init()
    {
        $api = $this->getContainer()->get(MailerLiteApi::class);
        $api->init();
    }

    public function run()
    {
        $loader = $this->getContainer()->get(Loader::class);
        $loader->run();
    }

}