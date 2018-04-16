<?php

namespace App\GraphQL;

use Illuminate\Support\ServiceProvider;
use function Digia\GraphQL\buildSchema;

class GraphQLServiceProvider extends ServiceProvider
{

    private const CONFIG_KEY = 'graphql';

    /**
     * @inheritdoc
     */
    public function register()
    {
        // In Lumen application configuration files neevagrads to be loaded implicitly
        if ($this->app instanceof \Laravel\Lumen\Application) {
            $this->app->configure(self::CONFIG_KEY);
        } else {
            /** @noinspection PhpUndefinedMethodInspection */
            /** @noinspection PhpUndefinedFunctionInspection */
            $this->publishes([$this->configPath() => config_path('graphql.php')]);
        }

        $config = $this->app['config']->get(self::CONFIG_KEY);

        $this->loadViewsFrom(resource_path('views/graphql'), 'graphql');

        $this->app->singleton(GraphQLService::class, function () use ($config) {
            $schema = buildSchema(file_get_contents(__DIR__ . '/schema.graphqls'), [
                'Query' => QueryResolver::class,
                'Mutation' => MutationResolver::class
            ]);

            return new GraphQLService($schema, $config);
        });
    }
}
