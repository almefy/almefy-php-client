<?php
/*
 * Copyright (c) 2022 ALMEFY GmbH
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

namespace Almefy;

class Session
{
    public const DEFAULT_TTL = 350;
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @var string
     */
    private $expiresAt;

    /**
     * @var string
     */
    private $updatedAt;


    /**
     * Session constructor.
     *
     * @param string $id
     * @param string $createdAt
     * @param string $identifier
     * @param string $expires
     * @param string $updatedAt
     */
    public function __construct($id, $createdAt, $identifier, $expires, $updatedAt)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->identifier = $identifier;
        $this->expiresAt = $expires;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function withUpdatedExpiration(string $updatedAt, string $expiresAt): Session
    {
        $this->updatedAt = $updatedAt;
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function withUpdateAt(?string $updatedAt = null): Session
    {
        $this->updatedAt = $updatedAt ?? date(DATE_ATOM);

        return $this;
    }

    /**
     * @param $array
     *
     * @return Session
     */
    public static function fromArray($array)
    {
        $id = $array['id'] ?? null;
        $createdAt = $array['createdAt'] ?? date(DATE_ATOM);
        $identifier = $array['identityIdentifier'] ?? null;
        $expires = $array['expiresAt'] ?? null;
        if (is_int($expires)) {
            $expires = date(DATE_ATOM, $expires);
        }
        $updatedAt = $array['updatedAt'] ?? date(DATE_ATOM);

        return new Session($id, $createdAt, $identifier, $expires, $updatedAt);
    }

    public static function fromSessionArray($array)
    {
        $sessions = [];
        foreach ($array as $key => $item) {
            $session = Session::fromArray($item);
            $sessions[$session->getId()] = $session;
        }

        return $sessions;
    }
}
