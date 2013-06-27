<?php

namespace Avocode\FormExtensionsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Bootstrap Collection type
 *
 * @author Piotr Gołębiewski <loostro@gmail.com>
 */
class BootstrapCollectionType extends AbstractType
{
    private $widget;

    public function __construct($widget)
    {
        $this->widget = $widget;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAttribute('sortable', $options['sortable']);
        $builder->setAttribute('sortable_name', $options['sortable_name']);
        $builder->setAttribute('new_label', $options['new_label']);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['sortable'] = $form->getConfig()->getAttribute('sortable');
        $view->vars['sortable_name'] = $form->getConfig()->getAttribute('sortable_name');
        $view->vars['new_label'] = $form->getConfig()->getAttribute('new_label');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'sortable' => false,
            'sortable_name' => 'position',
            'new_label' => 'collection.new_label'
        ));

        $resolver->setAllowedTypes(array(
            'sortable' => array('bool'),
            'sortable_name' => array('string'),
            'new_label' => array('string'),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'collection';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'collection_' . $this->widget;
    }
}
