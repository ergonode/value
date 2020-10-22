<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Value\Domain\ValueObject;

use JMS\Serializer\Annotation as JMS;

class StringValue implements ValueInterface
{
    public const TYPE = 'string';

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!self::isValid($value)) {
            throw new \InvalidArgumentException('Given string can\'t be empty');
        }

        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     *
     * @JMS\VirtualProperty()
     */
    public function getType(): string
    {
        return self::TYPE;
    }

    /**
     * @return array
     */
    public function getValue(): array
    {
        return [null => $this->value];
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    public static function isValid(string $value): bool
    {
        return '' !== $value;
    }

    /**
     * @param ValueInterface $value
     *
     * @return bool
     */
    public function isEqual(ValueInterface $value): bool
    {
        return
            $value instanceof self
            && $value->value === $this->value;
    }
}
