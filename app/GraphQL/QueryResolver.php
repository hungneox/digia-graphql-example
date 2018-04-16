<?php

namespace App\GraphQL;

/**
 * Class QueryResolver
 * @package App\GraphQL
 */
class QueryResolver extends AbstractResolver
{
    protected static $channels = [
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

    /**
     * @return array
     */
    public function resolveChannels()
    {
        return self::$channels;
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

    /**
     * @param $_
     * @param array $args
     * @return array
     */
    public function resolveAddChannel($_, array $args)
    {
        $channel =  [
            'id' => '3',
            'name' => $args['name'],
            'messages' => []
        ];

        self::$channels[] = $channel;

        return $channel;
    }
}
