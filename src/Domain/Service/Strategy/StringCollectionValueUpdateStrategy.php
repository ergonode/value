<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Value\Domain\Service\Strategy;

use Ergonode\Value\Domain\Service\ValueUpdateStrategyInterface;
use Ergonode\Value\Domain\ValueObject\StringCollectionValue;
use Ergonode\Value\Domain\ValueObject\ValueInterface;

/**
 */
class StringCollectionValueUpdateStrategy implements ValueUpdateStrategyInterface
{
    /**
     * @param ValueInterface $oldValue
     *
     * @return bool
     */
    public function isSupported(ValueInterface $oldValue): bool
    {
        return $oldValue instanceof StringCollectionValue;
    }

    /**
     * {@inheritDoc}
     */
    public function calculate(ValueInterface $oldValue, ValueInterface $newValue): ValueInterface
    {
        if (!$oldValue instanceof StringCollectionValue) {
            throw new \InvalidArgumentException(\sprintf('New value must be type %s', StringCollectionValue::class));
        }

        if (!$newValue instanceof StringCollectionValue) {
            throw new \InvalidArgumentException(\sprintf('New value must be type %s', StringCollectionValue::class));
        }

        return new StringCollectionValue($newValue->getValue());
    }
}
