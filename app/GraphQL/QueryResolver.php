<?php

namespace App\GraphQL;

/**
 * Class QueryResolver
 * @package App\GraphQL
 */
class QueryResolver extends AbstractResolver
{
    /**
     * @return array
     */
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

    /**
     * @param $_
     * @param array $args
     * @return array
     */
    public function resolveChannel($_, array $args)
    {
        return  collect($this->resolveChannels())->firstWhere('id', $args['id']);
    }
}
