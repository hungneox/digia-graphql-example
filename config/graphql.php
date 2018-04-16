<?php

return [
    'schema' => \Digia\GraphQL\Schema\Schema::class,

    // Whether the GraphiQL interface should be enabled
    'enable_graphiql' => env('ENABLE_GRAPHIQL', false),

    // The (optional) token that can be used to access the GraphiQL interface, even when "enable_graphiql" is false
    'graphiql_token'  => env('GRAPHIQL_TOKEN'),

    'type_attribute' => 'type',

    'types' => [

    ]
];
