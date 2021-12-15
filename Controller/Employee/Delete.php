<?php

namespace Codilar\Employee\Controller\Employee;

use Magento\Framework\App\Action\Action;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Framework\App\Action\Context;

class Delete extends Action
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

    public function execute()
    {
        $emptyBrand = $this->modelFactory->create();
        try {
            $data = $this->getRequest()->getParam('id');

            $deleteBrand=$emptyBrand->load($data);
            $deleteBrand->delete();
            $this->messageManager->addSuccessMessage(__('Employee details of %1 deleted successfully', $emptyBrand->getName()));
            return $this->resultRedirectFactory->create()->setPath('employee/employee/view');

        }
        catch (\Exception $e) {
            // $this->messageManager->addError($e->getMessage());
            echo "Error";
        }
    }
}
