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

    private ?Token $token;

    public ?string $clientIp;

    public ?string $clientLabel;

    public ?string $clientBrowser;

    public ?string $clientPlatform;

    /**
     * Session constructor.
     */
    public function __construct(?string $id, ?string $createdAt, ?string $updatedAt, ?string $expiresAt, ?Token $token,
                                ?string $clientIp, ?string $clientLabel, ?string $clientBrowser, ?string $clientPlatform
    )
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->expiresAt = $expiresAt;
        $this->token = $token;
        $this->clientIp = $clientIp;
        $this->clientLabel = $clientLabel;
        $this->clientBrowser = $clientBrowser;
        $this->clientPlatform = $clientPlatform;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    public function getToken(): ?Token
    {
        return $this->token;
    }

    public function getClientIp(): ?string
    {
        return $this->clientIp;
    }

    public function getClientLabel(): ?string
    {
        return $this->clientLabel;
    }

    public function getClientBrowser(): ?string
    {
        return $this->clientBrowser;
    }

    public function getClientPlatform(): ?string
    {
        return $this->clientPlatform;
    }

    public static function fromArray($array): Session
    {
        $id = $array['id'] ?? null;
        $createdAt = $array['createdAt'] ?? null;
        $updatedAt = $array['updatedAt'] ?? null;
        $expiresAt = $array['expiresAt'] ?? null;
        $clientIp = $array['clientIp'] ?? null;
        $clientLabel = $array['clientLabel'] ?? null;
        $clientBrowser = $array['clientBrowser'] ?? null;
        $clientPlatform = $array['clientPlatform'] ?? null;

        $token = isset($array['token']) ? Token::fromArray($array['token']) : null;

        return new Session($id, $createdAt, $updatedAt, $expiresAt, $token, $clientIp, $clientLabel, $clientBrowser, $clientPlatform);
    }

    /**
     * @return Session[]
     */
    public static function fromSessionArray($array): array
    {
        $sessions = [];
        foreach ($array as $key => $item) {
            $session = Session::fromArray($item);
            $sessions[$session->getId()] = $session;
        }

        return $sessions;
    }
}
