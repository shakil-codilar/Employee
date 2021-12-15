<?php

namespace Codilar\Employee\Controller\Employee ;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Update extends  Action
{
    protected $pageFactory;
    /**
     * @var ModelFactory
     */
    protected $modelFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    public function __construct(Context $context, pageFactory $pageFactory,
    ModelFactory  $modelFactory,
        ResourceModel $resourceModel)
    {
        parent::__construct($context);
        $this->pageFactory =$pageFactory;
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }

    public  function  execute()
    {
        if ($this->isCorrectData()) {
            return $this->pageFactory->create();
        }
        else{
            return $this->resultRedirectFactory->create()->setPath('employee/employee/view');
        }
    }
    public function isCorrectData()
    {
        if ($id = $this->getRequest()->getParam("id")) {
        $model = $this->modelFactory->create();
        $model->load($id);
        if ($model->getId()) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}
}
