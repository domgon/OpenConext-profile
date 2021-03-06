<?php

/**
 * Copyright 2015 SURFnet B.V.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace OpenConext\Profile\Value;

use OpenConext\Profile\Assert;

final class EntityType
{
    const TYPE_SP  = 'saml20-sp';
    const TYPE_IDP = 'saml20-idp';

    /**
     * @var string
     */
    private $type;

    /**
     * @param string $type
     */
    public function __construct($type)
    {
        Assert::inArray($type, [self::TYPE_SP, self::TYPE_IDP]);

        $this->type = $type;
    }

    /**
     * Creates a new ServiceProvider Type
     * @return EntityType
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public static function SP()
    {
        return new EntityType(self::TYPE_SP);
    }

    // @codingStandardsIgnoreStart
    /**
     * Creates a new IdentityProvider Type
     * @return EntityType
     *
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    public static function IdP()
    {
        return new EntityType(self::TYPE_IDP);
    }

    /**
     * @return bool
     */
    public function isSP()
    {
        return $this->type === self::TYPE_SP;
    }

    /**
     * @return bool
     */
    public function isIdP()
    {
        return $this->type === self::TYPE_IDP;
    }
    // @codingStandardsIgnoreEnd

    /**
     * @param EntityType $other
     * @return bool
     */
    public function equals(EntityType $other)
    {
        return $this->type === $other->type;
    }

    public function __toString()
    {
        return $this->type;
    }
}
