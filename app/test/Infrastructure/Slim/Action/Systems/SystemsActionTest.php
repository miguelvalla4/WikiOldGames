<?php
declare (strict_types=1);

namespace Test\Infrastructure\Slim\Action\Systems;

use App\Infrastructure\Slim\Action\ActionPayload;
use Tests\Infrastructure\Slim\Action\ActionTestCase;

class SystemsActionTest extends ActionTestCase
{
    private const FILE_PATH = '/var/www/src/Infrastructure/Slim/Action/Action.php';

    public function testAction()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET','/systems/1');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();

        $result = [
            [
                "id" => '1',
                "title" => 'Alex Kidd in Miracle world',
                'type' => 'Plataformas',
                "released_on" => "1986-11-01",
                "company_id" => "1",
                "system_id" => "1",
                "tag" => [
                    0 => "Nipon",
                    1 => "Oldie but Goldie"
                ]
            ],

            [
                "id" => "2",
                "title" => "Phantasy Star",
                "type" => "JRPG",
                "released_on" => "1987-12-20",
                "company_id" => "1",
                "system_id" => "1",
                "tag" => [
                    0 => "Nipon",
                    1 => "Oldie but Goldie",
                ]
            ],
            [
                "id" => "3",
                "title" => "Sonic 2",
                "type" => "Plataformas",
                "released_on" => "1992-11-01",
                "company_id" => "7",
                "system_id" => "1",
                "tag" => [
                    0 => "Nipon",
                    1 => "Vintage"
                ]
            ]
        ];

        $expectedPayload = new ActionPayload(200, [
            'message'=>$result,
            'FILE'=>self::FILE_PATH
        ]);

        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}