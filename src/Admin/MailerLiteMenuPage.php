<?php

namespace Adue\Ascui\Admin;

use Adue\Ascui\Plugin;
use Adue\WordPressBasePlugin\Base\Loader;
use Adue\WordPressBasePlugin\Helpers\Traits\UseView;
use Adue\WordPressBasePlugin\Helpers\View;
use Adue\WordPressBasePlugin\Modules\Admin\BaseMenuPage;
use MailerLite\MailerLite;

class MailerLiteMenuPage extends BaseMenuPage
{

    protected string $pageTitle = 'Mailer lite';
    protected string $menuTitle = 'Mailer lite';
    protected string $capability = 'manage_options';
    protected string $menuSlug = 'ascui-menu-item';
    protected string $iconUrl = '';
    protected int $position = 150;
    protected array $submenuItems = [];

    public $option;

    public function __construct(View $view, Loader $loader, MailerLiteConfigOption $option)
    {
        parent::__construct($view, $loader);
        $this->option = $option;
    }

    public function render()
    {
        if (isset($_POST['save'])) {
            $this->option->update($_POST['ascui_mailer_lite']);
        }
        $optionData = $this->option->get();

        $mailerLite = new MailerLite(['api_key' => MAILER_LITE_KEY]);

        $groups = $mailerLite->groups->get();

        $this->view->set('optionData', $optionData);
        $this->view->set('groups', $groups['body']['data']);
        $this->view->render('admin/mailer_lite_config');
    }

}