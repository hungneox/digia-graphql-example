<?php

namespace App\GraphQL;

use App\Models\Channel;

/**
 * Class MutationResolver
 * @package App\GraphQL
 */
class MutationResolver extends AbstractResolver
{
    /**
     * @param $_
     * @param array $args
     * @return array
     */
    public function resolveAddChannel($_, array $args)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return Channel::create([
            'name' => $args['name']
        ])->toArray();
    }

    /**
     * @param $_
     * @param array $args
     * @return mixed
     */
    public function resolveAddMessage($_, array $args)
    {
        $messageInput = $args['message'];
        /** @noinspection PhpUndefinedMethodInspection */
        $channel = Channel::find($messageInput['channelId']);

        /** @noinspection PhpUndefinedMethodInspection */
        $message = $channel->messages()->create([
            'text' => $messageInput['text'],
        ]);

        return $message;
    }
}
