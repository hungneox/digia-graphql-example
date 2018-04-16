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
        return Channel::all()->toArray();
    }

    /**
     * @param $_
     * @param array $args
     * @return array
     */
    public function resolveChannel($_, array $args)
    {
        return  Channel::find($args['id'])->toArray();
    }
}
