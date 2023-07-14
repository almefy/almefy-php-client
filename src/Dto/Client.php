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

namespace Almefy\Dto;

class Client
{

    private ?string $ip;

    private ?string $label;

    private ?string $browser;

    private ?string $platform;

    private ?string $location;

    /**
     * Client constructor.
     */
    public function __construct(
        ?string $ip,
        ?string $label,
        ?string $browser,
        ?string $platform,
        ?string $location)
    {
        $this->ip = $ip;
        $this->label = $label;
        $this->browser = $browser;
        $this->platform = $platform;
        $this->location = $location;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getBrowser(): ?string
    {
        return $this->browser;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public static function fromArray(array $array = []): Client
    {
        return new Client(
            $array['ip'] ?? null,
            $array['label'] ?? null,
            $array['browser'] ?? null,
            $array['platform'] ?? null,
            $array['location'] ?? null
        );
    }

}