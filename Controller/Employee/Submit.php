<?php



namespace Codilar\Employee\Controller\Employee;

use Magento\Framework\App\Action\Action;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Framework\App\Action\Context;

class Submit extends Action
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
        $emptyBrands = $this->modelFactory->create();
        $data = $this->getRequest()->getParams();
        $updateBrand=$emptyBrands->load($data['id']);
        $updateBrand->setName($data['name'] );
        $updateBrand->setEmail($data['email'] );
        $updateBrand->setAddress($data['address'] );
        $updateBrand->setPhonenumber($data['phonenumber'] );
        $updateBrand->setDescription($data['description'] );
        $updateBrand->setIsActive($data['is_active'] );
        $this->resourceModel->save($updateBrand);
        $this->messageManager->addSuccessMessage(__('Employee details of %1 Updated successfully', $updateBrand->getName()));
        return $this->resultRedirectFactory->create()->setPath('employee/employee/view');
    }
}


