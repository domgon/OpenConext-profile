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

namespace OpenConext\EngineBlockApiClientBundle\Tests\DependencyInjection;

use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use OpenConext\EngineBlockApiClientBundle\DependencyInjection\Configuration;
use OpenConext\EngineBlockApiClientBundle\Tests\DataProvider;
use PHPUnit\Framework\TestCase;


final class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;
    use DataProvider;

    private $validConfig = [
        'base_url' => 'http://eb.invalid/',
        'username' => 'test user',
        'password' => 'test password',
    ];

    /**
     * @test
     * @group eb_api_config
     * @dataProvider nonStringScalarProvider
     */
    public function base_url_cannot_be_other_than_string($value)
    {
        $config = $this->validConfig;
        $config["base_url"] = $value;

        $this->assertPartialConfigurationIsInvalid(
            [['http_client' => $config]],
            'http_client',
            "The EngineBlock API base URL should be a string"
        );
    }

    /**
     * @test
     * @group eb_api_config
     */
    public function base_url_has_to_be_valid_url()
    {
        $config = $this->validConfig;
        $config["base_url"] = "not a valid URL";

        $this->assertPartialConfigurationIsInvalid(
            [['http_client' => $config]],
            'http_client',
            "The EngineBlock API base URL should be a valid URL"
        );
    }

    /**
     * @test
     * @group eb_api_config
     */
    public function base_url_must_end_in_forward_slash()
    {
        $config = $this->validConfig;
        $config["base_url"] = "https://eb.invalid";

        $this->assertPartialConfigurationIsInvalid(
            [['http_client' => $config]],
            'http_client',
            "The EngineBlock API base URL must end in a forward slash"
        );
    }

    /**
     * @test
     * @group eb_api_config
     * @dataProvider nonStringScalarProvider
     */
    public function username_cannot_be_other_than_string($value)
    {
        $config = $this->validConfig;
        $config["username"] = $value;

        $this->assertPartialConfigurationIsInvalid(
            [['http_client' => $config]],
            'http_client',
            "The EngineBlock API username should be a string"
        );
    }

    /**
     * @test
     * @group eb_api_config
     * @dataProvider nonStringScalarProvider
     */
    public function password_cannot_be_other_than_string($value)
    {
        $config = $this->validConfig;
        $config["password"] = $value;

        $this->assertPartialConfigurationIsInvalid(
            [['http_client' => $config]],
            'http_client',
            "The EngineBlock API password should be a string"
        );
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }
}
