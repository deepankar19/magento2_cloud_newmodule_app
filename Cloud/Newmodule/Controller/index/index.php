<?php
namespace Cloud\Newmodule\Controller\Index;
use Cloud\Newmodule\Model\DataExampleFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
class Index extends \Magento\Framework\App\Action\Action
{
    /** @var  \Magento\Framework\View\Result\Page */
    protected $_dataExample;
   // protected $resultRedirect;
    protected $resultPageFactory;
    /**      * @param \Magento\Framework\App\Action\Context $context      */
    public function __construct(\Magento\Framework\App\Action\Context $context, 
    \Cloud\Newmodule\Model\DataExampleFactory  $dataExample,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->_dataExample = $dataExample;
        $this->resultPageFactory = $resultPageFactory;
       
    }
    /**
     * Blog Index, shows a list of recent blog posts.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $getPost = (array) $this->getRequest()->getPost();
        if(!empty($getPost)){
            $dob=$getPost['dob'];
            $bloodgrp=$getPost['bloodgrp'];
            $fathersname=$getPost['fathersname'];
            $mothersname=$getPost['mothersname'];
            $firstname=$getPost['firstname'];
            $lastname=$getPost['lastname'];
            $phone=$getPost['phone'];
            $martial_staus=$getPost['martial_staus'];
            $bookingTime=$getPost['bookingTime'];
            $country=$getPost['country'];
            $resultPage = $this->resultPageFactory->create(ResultFactory::TYPE_REDIRECT);
           // $resultPage->setUrl($this->_redirect->getRefererUrl());
		     $model = $this->_dataExample->create();
		     $model->addData([
			"dob" => $dob,
			"bloodgrp" => $bloodgrp,
            "fathersname" => $fathersname,
            "mothersname" => $mothersname,
            "country" => $country,
            "martial_staus" => $martial_staus
			]);
           $saveData = $model->save();
            if($saveData){
            $this->messageManager->addSuccess( __('Insert Record Successfully !') );
            }
           
            $resultPage->getConfig()->getTitle()->prepend(__('Booking View'));
           // $resultPage->setPath('newmodule/index/index');
           $this->_redirect('newmodule/index/index');
            return $resultPage;
            
        }else{
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Booking View'));
        return $resultPage;
        }
    }
}