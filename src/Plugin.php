<?php

namespace Adue\Ascui;

use Adue\Ascui\Api\MailerLiteApi;
use Adue\WordPressBasePlugin\Base\Loader;
use Adue\WordPressBasePlugin\BasePlugin;
use Adue\Ascui\Admin\MailerLiteMenuPage;

class Plugin extends BasePlugin
{

    public function init()
    {
        $api = $this->getContainer()->get(MailerLiteApi::class);
        $api->init();

        $page = $this->getContainer()->get(MailerLiteMenuPage::class);
        $page->add();
    }

    public function run()
    {
        $loader = $this->getContainer()->get(Loader::class);
        $loader->run();
    }

}