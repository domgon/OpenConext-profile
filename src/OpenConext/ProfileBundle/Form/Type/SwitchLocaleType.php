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

namespace OpenConext\ProfileBundle\Form\Type;

use OpenConext\ProfileBundle\Profile\Command\ChangeLocaleCommand;
use OpenConext\ProfileBundle\Service\LocaleService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SwitchLocaleType extends AbstractType
{
    /**
     * @var \Symfony\Component\Routing\Generator\UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var LocaleService
     */
    private $localeService;

    public function __construct(
        UrlGeneratorInterface $urlGenerator,
        LocaleService $localeService
    ) {
        $this->urlGenerator  = $urlGenerator;
        $this->localeService = $localeService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $availableLocales = $this->localeService->getAvailableLocales();
        $localeChoices = array_combine($availableLocales, array_map(function ($locale) {
            return 'profile.locale.' . $locale;
        }, $availableLocales));

        $builder
            ->setAction(
                $this->urlGenerator->generate(
                    'profile.locale_switch_locale',
                    ['return-url' => $options['return_url']]
                )
            )
            ->setMethod('POST')
            ->add('newLocale', 'choice', [
                'choices' => $localeChoices,
                'data'    => $this->localeService->getLocale()->getLocale(),
                'attr'    => [
                    'data-locale-options' => ''
                ]
            ])
            ->add('changeLocale', 'submit', ['label' => 'profile.locale.choose_locale']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'return_url' => '',
            'data_class' => '\OpenConext\ProfileBundle\Profile\Command\ChangeLocaleCommand'
        ]);

        $resolver->setRequired('return_url');
        $resolver->setAllowedTypes('return_url', 'string');
    }

    public function getName()
    {
        return 'profile_switch_locale';
    }
}
