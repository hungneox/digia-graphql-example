<?php

namespace App\GraphQL;

use App\Models\Channel;

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
        return Channel::with('messages')->get()->toArray();
    }

    /**
     * @param $_
     * @param array $args
     * @return array
     */
    public function resolveChannel($_, array $args)
    {
        /** @var Channel $channel */
        $channel = Channel::with('messages')->find($args['id']);

        return $channel->toArray();
    }
}
