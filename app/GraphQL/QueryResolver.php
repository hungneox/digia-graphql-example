<?php

namespace App\GraphQL;

class QueryResolver extends AbstractResolver
{
    public function resolveChannels()
    {
        return [
            [
                'id' => '1',
                'name' => 'soccer',
                'messages' => [
                    [
                        'id' => '1',
                        'text' => 'soccer is football',
                    ],
                    [
                        'id' => '2',
                        'text' => 'hello soccer world cup',
                    ]
                ]
            ],
            [
                'id' => '2',
                'name' => 'baseball',
                'messages' => [
                    [
                        'id' => '3',
                        'text' => 'baseball is life',
                    ],
                    [
                        'id' => '4',
                        'text' => 'hello baseball world series',
                    ]
                ]
            ],
        ];
    }
}
