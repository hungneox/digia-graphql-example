<?php

namespace App\GraphQL;

use Digia\GraphQL\Error\InvariantException;
use Digia\GraphQL\Schema\SchemaInterface;
use function Digia\GraphQL\graphql;

class GraphQLService
{

    /**
     * @var SchemaInterface
     */
    private $schema;

    /**
     * @var array
     */
    private $config;

    /**
     * GraphQLService constructor.
     *
     * @param $schema
     */
    public function __construct(SchemaInterface $schema, array $config)
    {
        $this->schema = $schema;
        $this->config = $config;
    }

    /**
     * @param string      $query
     * @param array       $variables
     * @param null|string $operationName
     * @return array
     * @throws InvariantException
     */
    public function executeQuery(string $query, array $variables, ?string $operationName): array
    {
        return graphql($this->schema, $query, null, null, $variables, $operationName);
    }
}
