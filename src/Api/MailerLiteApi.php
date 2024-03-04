<?php

namespace Adue\Ascui\Api;

use Adue\Ascui\Admin\MailerLiteConfigOption;
use Adue\WordPressBasePlugin\Base\Loader;
use Adue\WordPressBasePlugin\Modules\Misc\BaseApiEndopint;
use MailerLite\MailerLite;

class MailerLiteApi extends BaseApiEndopint
{

    protected string $namespace = 'ascui/v1';
    protected string $uri = '/add-subscriber';
    protected array $methods = ['POST'];
    private MailerLiteConfigOption $option;

    public function __construct(Loader $loader, MailerLiteConfigOption $option)
    {
        parent::__construct($loader);
        $this->option = $option;
    }

    public function handle($request)
    {
        $mailerLite = new MailerLite(['api_key' => $this->option->get()['api_key']]);

        //$groupId = '113792144225863660';

        return  $mailerLite->subscribers->create([
            'email' => $request->get_param('email'),
            'fields' => [
                'first_name' => $request->get_param('name'),
            ],
            'groups' => [
                $this->option->get()['group_id']
            ]
        ]);
    }

}