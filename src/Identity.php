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

class Identity
{

    private ?string $id;

    private ?string $createdAt;

    private bool $locked;

    private ?string $identifier;

    private ?string $nickname;

    private ?string $name;

    /**
     * @var Token[]
     */
    private array $tokens;

    /**
     * Identity constructor.
     */
    public function __construct(?string $id, ?string $createdAt, bool $locked, ?string $identifier, ?string $nickname, ?string $name, array $tokens = [])
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->locked = $locked;
        $this->identifier = $identifier;
        $this->nickname = $nickname;
        $this->name = $name;
        $this->tokens = $tokens;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function isLocked(): bool
    {
        return $this->locked;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return Token[]
     */
    public function getTokens(): array
    {
        return $this->tokens;
    }

    public static function fromArray(array $array = []): Identity
    {
        $id = $array['id'] ?? null;
        $createdAt = $array['createdAt'] ?? null;
        $locked = $array['locked'] ?? false;
        $identifier = $array['identifier'] ?? null;
        $nickname = $array['nickname'] ?? null;
        $name = $array['name'] ?? null;
        $tokens = [];

        foreach ($array['tokens'] as $item) {
            $tokens[] = Token::fromArray($item);
        }

        return new Identity($id, $createdAt, $locked, $identifier, $nickname, $name, $tokens);
    }

}