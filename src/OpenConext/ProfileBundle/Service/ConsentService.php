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

namespace OpenConext\ProfileBundle\Service;

use OpenConext\Profile\Exception\InvalidArgumentException;
use OpenConext\Profile\Repository\ConsentRepository;
use OpenConext\Profile\Value\ConsentList;

final class ConsentService
{
    /**
     * @var ConsentRepository
     */
    private $consentRepository;

    public function __construct(ConsentRepository $consentRepository)
    {
        $this->consentRepository = $consentRepository;
    }

    /**
     * @param string $userId
     * @return ConsentList
     * @throws InvalidArgumentException When $userId is not a non-empty string
     */
    public function findAllFor($userId)
    {
        return $this->consentRepository->findAllFor($userId);
    }
}
