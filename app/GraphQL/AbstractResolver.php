<?php

namespace App\GraphQL;

use Digia\GraphQL\Schema\Resolver\ResolverInterface;

class AbstractResolver implements ResolverInterface
{
    /**
     * @inheritdoc
     */
    public function getResolveMethod(string $fieldName): ?callable
    {
        $resolveMethod = 'resolve' . \ucfirst($fieldName);

        if (\method_exists($this, $resolveMethod)) {
            return [$this, $resolveMethod];
        }

        return null;
    }

    /**
     * @return callable|null
     */
    public function getTypeResolver(): ?callable
    {
        // TODO: Implement getTypeResolver() method.
    }
}
