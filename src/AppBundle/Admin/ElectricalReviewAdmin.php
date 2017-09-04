<?php
/**
 * Created by PhpStorm.
 * User: parem
 * Date: 1/17/17
 * Time: 1:11 PM
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Image;
use Sonata\AdminBundle\Admin\AbstractAdmin as Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class ElectricalReviewAdmin extends Admin
{

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'id' // field name
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->tab('Main')
            ->with(' ', array(
                'class' => 'col-sm-12',
                'box-class' => 'box box-solid box-danger',
                'description' => 'Settings create part'
            ))
            ->add('tavern')
            ->add('reviewDate', 'sonata_type_date_picker', array(
                'dp_side_by_side'       => false,
                'dp_use_current'        => false,
                'widget' => 'single_text',
                'format' => 'y-dd-MM',
                'required' => false,
                'label'=>'Exp. Date',
                'attr'=>['style' => 'width: 100px !important']
            ))
            ->add('value', 'text', ['required' => true])
            ->add('price', 'text', ['required' => true])
            ->add('difference', 'text', ['required' => false])
            ->end();

    }

    /**
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('id')
            ->add('tavern')
            ->add('reviewDate', 'date', ['editable'=>true])
            ->add('value', null, ['editable'=>true])
            ->add('price', null, ['editable'=>true])
            ->add('difference', null, ['editable'=>true])
            ->add('_action', 'actions',
                array('actions' =>
                    array(
                        'show' => array(), 'edit' => array(), 'delete' => array())
                ));

    }

    /**
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('tavern')
            ->add('reviewDate')
            ->add('value')
            ->add('price')
            ->add('difference')
        ;
    }

    /**
     * @param ShowMapper $show
     */
    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('tavern')
            ->add('reviewDate')
            ->add('value')
            ->add('price')
            ->add('difference')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
//        $object->uploadFile();
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
//        $object->uploadFile();
    }
}