<?php

namespace Codilar\Employee\Controller\Employee ;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;//??
use Magento\Framework\View\Result\PageFactory;

class Details extends  Action
{
    protected $pageFactory;

    public function __construct(Context $context, pageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory =$pageFactory;
    }

    public  function  execute()
    {
        return $this->pageFactory->create();
    }
}
