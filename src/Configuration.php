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

class Configuration
{

    private ?string $websiteUrl;

    private ?string $authenticationUrl;

    /**
     * @deprecated Will not be used anymore
     */
    private ?string $registrationUrl;

    private bool $sessionsEnabled;

    public function __construct(?string $websiteUrl, ?string $authenticationUrl, ?string $registrationUrl, bool $sessionsEnabled)
    {
        $this->websiteUrl = $websiteUrl;
        $this->authenticationUrl = $authenticationUrl;
        $this->registrationUrl = $registrationUrl;
        $this->sessionsEnabled = $sessionsEnabled;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function getAuthenticationUrl(): ?string
    {
        return $this->authenticationUrl;
    }

    /**
     * @deprecated Will not be used anymore
     */
    public function getRegistrationUrl(): ?string
    {
        return $this->registrationUrl;
    }

    public function hasSessionSupport(): bool
    {
        return $this->sessionsEnabled;
    }

    public static function fromArray(array $array = []): Configuration
    {
        return new Configuration(
            $array['websiteUrl'] ?? null,
            $array['authenticationUrl'] ?? null,
            $array['registrationUrl'] ?? null,
            $array['sessionsEnabled'] === true
        );
    }

}