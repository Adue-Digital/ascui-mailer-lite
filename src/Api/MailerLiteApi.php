<?php

namespace Adue\Ascui\Api;

use Adue\WordPressBasePlugin\Modules\Misc\BaseApiEndopint;
use MailerLite\MailerLite;

class MailerLiteApi extends BaseApiEndopint
{

    protected string $namespace = 'ascui/v1';
    protected string $uri = '/add-subscriber';
    protected array $methods = ['POST'];

    public function handle($request)
    {
        $mailerLite = new MailerLite(['api_key' => MAILER_LITE_KEY]);

        $groupId = '113792144225863660';

        return  $mailerLite->subscribers->create([
            'email' => $request->get_param('email'),
            'fields' => [
                'first_name' => $request->get_param('name'),
            ],
            'groups' => [
                '113792144225863660'
            ]
        ]);
    }

}