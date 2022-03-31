<?php
declare (strict_types=1);

namespace Test\Infrastructure\Slim\Action\Companies;

use App\Infrastructure\Slim\Action\ActionPayload;
use Tests\Infrastructure\Slim\Action\ActionTestCase;

class CompaniesActionTest extends ActionTestCase
{
    private const FILE_PATH = '/var/www/src/Infrastructure/Slim/Action/Action.php';

    public function testAction()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET','/companies/1');
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
                "id" => "4",
                "title" => "Columns",
                "type" => "Puzzle",
                "released_on" => "1990-10-06",
                "company_id" => "1",
                "system_id" => "2",
                "tag" => [
                    0 => "Nipon",
                    1 => "Oldie but Goldie"
                ]
            ]
        ];
        $expectedPayload = new ActionPayload(200,[
            'message'=>$result,
            'FILE'=>self::FILE_PATH
        ]);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);
        $this->assertEquals($serializedPayload, $payload);
    }

}