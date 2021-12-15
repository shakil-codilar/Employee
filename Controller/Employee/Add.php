<?php

namespace Codilar\Employee\Controller\Employee;

use Magento\Framework\App\Action\Action;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Framework\App\Action\Context;

class Add extends Action
{
    /**
     * @var ModelFactory
     */
    protected $modelFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    public function __construct(
        Context       $context,
        ModelFactory  $modelFactory,
        ResourceModel $resourceModel
    )
    {
        parent::__construct($context);
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }

    public function execute()//we are not calling this function but how it is running
    {
        $emptyBrand = $this->modelFactory->create();
        $data = $this->getRequest()->getParams();
        $emptyBrand->setName($data['name'] ?? null);
        $emptyBrand->setEmail($data['email'] ?? null);
        $emptyBrand->setAddress($data['address'] ?? null);
        $emptyBrand->setPhonenumber($data['phonenumber'] ?? null);
        $emptyBrand->setDescription($data['description'] ?? null);
        $emptyBrand->setIsActive($data['is_active'] ?? 0);
        $this->resourceModel->save($emptyBrand);
        $this->messageManager->addSuccessMessage(__('Employee details of %1 saved successfully', $emptyBrand->getName()));
        return $this->resultRedirectFactory->create()->setPath('employee/employee/view');
    }
}
