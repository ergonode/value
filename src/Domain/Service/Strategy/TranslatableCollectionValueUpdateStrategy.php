<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Value\Domain\Service\Strategy;

use Ergonode\Core\Domain\ValueObject\TranslatableString;
use Ergonode\Value\Domain\Service\ValueUpdateStrategyInterface;
use Ergonode\Value\Domain\ValueObject\TranslatableCollectionValue;
use Ergonode\Value\Domain\ValueObject\ValueInterface;

/**
 */
class TranslatableCollectionValueUpdateStrategy implements ValueUpdateStrategyInterface
{
    /**
     * @param ValueInterface $oldValue
     *
     * @return bool
     */
    public function isSupported(ValueInterface $oldValue): bool
    {
        return $oldValue instanceof TranslatableCollectionValue;
    }

    /**
     * {@inheritDoc}
     */
    public function calculate(ValueInterface $oldValue, ValueInterface $newValue): ValueInterface
    {
        if (!$oldValue instanceof TranslatableCollectionValue) {
            throw new \InvalidArgumentException(\sprintf('New value must be type %s', TranslatableCollectionValue::class));
        }

        if (!$newValue instanceof TranslatableCollectionValue) {
            throw new \InvalidArgumentException(\sprintf('New value must be type %s', TranslatableCollectionValue::class));
        }

        $collection = [];
        foreach ($oldValue->getValue() as $key => $translation) {
            $collection[$key] = new TranslatableString($translation->getTranslations());
        }

        foreach ($newValue->getValue() as $key => $translation) {
            $collection[$key] = new TranslatableString($translation->getTranslations());
        }

        return new TranslatableCollectionValue($collection);
    }
}
