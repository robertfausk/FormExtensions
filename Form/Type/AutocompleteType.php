<?php

namespace Avocode\FormExtensionsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * See `Resources/doc/autocomplete/overview.md` for documentation
 *
 * @author Robert Freigang <robertfreigang@gmx.de>
 */
class AutocompleteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (empty($options['source']) && empty($options['sourceRouteName'])) {
            throw new InvalidOptionsException('The "source" option or the "sourceRouteName" option have to be set.');
        }

        $view->vars = array_merge(
            $view->vars,
            array(
                'appendTo' => $options['appendTo'],
                'autoFocus' => $options['autoFocus'],
                'delay' => $options['delay'],
                'disabled' => $options['disabled'],
                'minLength' => $options['minLength'],
                'position' => $options['position'],
                'source' => $options['source'],
                'sourceRouteName' => $options['sourceRouteName'],
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $defaults = array(
            'appendTo' => null,
            'autoFocus' => null,
            'delay' => null,
            'disabled' => null,
            'minLength' => null,
            'position' => null,
            'source' => null,
            'sourceRouteName' => null,
        );

        $resolver
            ->setDefaults($defaults)
        ;

        $resolver->setAllowedTypes(array(
            'appendTo' => array('string', 'null'),
            'autoFocus' => array('bool', 'null'),
            'delay' => array('integer', 'null'),
            'disabled' => array('bool', 'null'),
            'minLength' => array('integer', 'null'),
            'position' => array('array', 'null'),
            'source' => array('string', 'array', 'null'),
            'sourceRouteName' => array('string', 'null'),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'afe_autocomplete';
    }
}
