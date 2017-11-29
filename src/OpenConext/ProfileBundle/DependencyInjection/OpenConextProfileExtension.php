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

namespace OpenConext\ProfileBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use \DateTime;

class OpenConextProfileExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('controllers.yml');
        $loader->load('services.yml');

        $this->parseEngineBlockEntityIdConfiguration($config['engine_block_entity_id'], $container);

        $this->parseAttributeSupportMailConfiguration($config['attribute_support'], $container);
        $this->parseInformationRequestMailConfiguration($config['information_request'], $container);

        $this->parseDefaultLocaleConfiguration($config['default_locale'], $container);
        $this->parseAvailableLocaleConfiguration($config['locales'], $container);
        $this->parseLocaleCookieStorageConfiguration(
            $config['locale_cookie_domain'],
            $config['locale_cookie_key'],
            $config['locale_cookie_expires_in'],
            $config['locale_cookie_secure'],
            $config['locale_cookie_http_only'],
            $container
        );
    }

    private function parseEngineBlockEntityIdConfiguration($engineBlockEntityId, ContainerBuilder $container)
    {
        $container
            ->getDefinition('profile.engine_block_entity_id')
            ->replaceArgument(0, $engineBlockEntityId);
    }

    private function parseAttributeSupportMailConfiguration(array $attributeSupportConfig, ContainerBuilder $container)
    {
        $container
            ->getDefinition('profile.attribute_support.email_from')
            ->replaceArgument(0, $attributeSupportConfig['email_from']);
        $container
            ->getDefinition('profile.attribute_support.email_to')
            ->replaceArgument(0, $attributeSupportConfig['email_to']);
    }

    private function parseInformationRequestMailConfiguration(array $attributeSupportConfig, ContainerBuilder $container)
    {
        $container
            ->getDefinition('profile.information_request.email_from')
            ->replaceArgument(0, $attributeSupportConfig['email_from']);
        $container
            ->getDefinition('profile.information_request.email_to')
            ->replaceArgument(0, $attributeSupportConfig['email_to']);
    }

    private function parseDefaultLocaleConfiguration($defaultLocaleConfig, ContainerBuilder $container)
    {
        $container
            ->getDefinition('profile.default_locale')
            ->replaceArgument(0, $defaultLocaleConfig);
    }

    private function parseAvailableLocaleConfiguration(array $availableLocaleConfig, ContainerBuilder $container)
    {
        $availableLocales = array_map(function ($availableLocale) {
            return new Definition('OpenConext\Profile\Value\Locale', [$availableLocale]);
        }, $availableLocaleConfig);

        $container
            ->getDefinition('profile.available_locales')
            ->replaceArgument(0, $availableLocales);
    }

    private function parseLocaleCookieStorageConfiguration(
        $localeCookieDomain,
        $localeCookieKey,
        $localeCookieExpiresIn,
        $localeCookieSecure,
        $localeCookieHttpOnly,
        ContainerBuilder $container
    ) {

        if ($localeCookieExpiresIn !== null) {
            $localeCookieExpirationDateDefinition = new Definition(DateTime::class);
            $localeCookieExpirationDateDefinition->addMethodCall('modify', [$localeCookieExpiresIn]);
        } else {
            $localeCookieExpirationDateDefinition = null;
        }

        $container
            ->getDefinition('profile.storage.locale_cookie')
            ->replaceArgument(0, $localeCookieDomain)
            ->replaceArgument(1, $localeCookieKey)
            ->replaceArgument(2, $localeCookieExpirationDateDefinition)
            ->replaceArgument(3, $localeCookieSecure)
            ->replaceArgument(4, $localeCookieHttpOnly);
    }
}
