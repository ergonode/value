<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Value\Domain\Service\Strategy;

use Ergonode\Value\Domain\ValueObject\StringValue;
use Ergonode\Value\Domain\ValueObject\ValueInterface;
use Ergonode\Value\Domain\Service\ValueUpdateStrategyInterface;

/**
 */
class StringValueUpdateStrategy implements ValueUpdateStrategyInterface
{
    /**
     * @param ValueInterface $oldValue
     *
     * @return bool
     */
    public function isSupported(ValueInterface $oldValue): bool
    {
        return $oldValue instanceof StringValue;
    }

    /**
     * @param ValueInterface|StringValue $oldValue
     * @param ValueInterface|StringValue $newValue
     *
     * @return ValueInterface
     */
    public function calculate(ValueInterface $oldValue, ValueInterface $newValue): ValueInterface
    {
        if (!$oldValue instanceof StringValue) {
            throw new \InvalidArgumentException(\sprintf('Old value must be type %s given %s', StringValue::class, get_class($newValue)));
        }

        if (!$newValue instanceof StringValue) {
            throw new \InvalidArgumentException(\sprintf('New value must be type %s given %s ', StringValue::class, get_class($newValue)));
        }

        return new StringValue($newValue->getValue());
    }
}
