<?php
/*
 * Copyright (c) 2023 ALMEFY GmbH
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
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
    private ?string $id;

    private ?string $createdAt;

    private ?string $updatedAt;

    private ?string $expiresAt;

    private ?SessionClient $client;

    private ?Token $token;

    /**
     * Session constructor.
     */
    public function __construct(
        ?string        $id,
        ?string        $createdAt,
        ?string        $updatedAt,
        ?string        $expiresAt,
        ?SessionClient $client,
        ?Token         $token
    )
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->expiresAt = $expiresAt;
        $this->client = $client;
        $this->token = $token;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    public function getClient(): ?SessionClient
    {
        return $this->client;
    }

    public function getToken(): ?Token
    {
        return $this->token;
    }

    public static function fromArray($array): Session
    {
        return new Session(
            $array['id'] ?? null,
            $array['createdAt'] ?? null,
            $array['updatedAt'] ?? null,
            $array['expiresAt'] ?? null,
            isset($array['client']) ? SessionClient::fromArray($array['client']) : null,
            isset($array['token']) ? Token::fromArray($array['token']) : null,
        );
    }

    /**
     * @return Session[]
     */
    public static function fromSessionArray($array): array
    {
        $sessions = [];
        foreach ($array as $item) {
            $sessions[] = Session::fromArray($item);
        }

        return $sessions;
    }

}
