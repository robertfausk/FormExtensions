<?php

namespace Avocode\FormExtensionsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
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
        $view->vars['configs'] = $options['configs'];
        $view->vars['hidden'] = $options['hidden'];
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $defaults = array(
            'source' => "['lorem', 'ipsum', 'larum', 'käse', 'käserei']",
        );

        $resolver
            ->setDefaults(array(
                'hidden'        => false,
                'configs'       => $defaults,
                'transformer'   => null,
            ))
        ;
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
