<?php

namespace Codilar\Employee\Block;

use Magento\Framework\View\Element\Template;
use Codilar\Employee\Model\Employee;
use Codilar\Employee\Model\ResourceModel\Employee\CollectionFactory;

use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;

class View extends Template
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;
    /**
     * @var ModelFactory
     */
    protected $modelFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        ModelFactory  $modelFactory,
        ResourceModel $resourceModel,
        array $data = []
    )
    {
        parent::__construct($context, $data,);
        $this->collectionFactory = $collectionFactory;
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * @return Brand[]
     */
    public function getAllEmployees()
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('is_active', ['eq' => 1]);
        return $collection->getItems();
    }

    public function getAddUrl()
    {
        return $this->getUrl('employee/employee/form');
    }

    public function getView(){
        return $this->getUrl('employee/employee/add');
    }

    public function getAddDetails(){
        return $this->getUrl('employee/employee/details');
    }

    public function getAddUpdate(){
        return $this->getUrl('employee/employee/update');
    }

    public function getAddDelete(){
        return $this->getUrl('employee/employee/delete');
    }

    public  function  getAddSubmit(){
        return $this->getUrl('employee/employee/submit');
    }

    public function getAllData()
    {
        $id = $this->getRequest()->getParam("id");
        $model = $this->modelFactory->create();
        return $model->load($id);
    }

}
