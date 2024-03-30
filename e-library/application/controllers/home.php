<?php
class home extends controller
{
    public function index()
    {
        $model = $this->loadModel('homeModel');
        require_once APP_DIR.'views/templates/home_header.php';
        $resources = $model->getAllResources();
        $categoryLinks = $model->getResourceCategories();
        require_once APP_DIR.'views/home/index.php';
        require_once APP_DIR.'views/templates/footer.php';
    }
    public function load($category_id=NULL)
    {
        $model = $this->loadModel('homeModel');
        if($category_id==NULL)
        {
            $resources = $model->getAllResources();
        }
        else if($category_id=="iframe")
        {
            $resources = "<iframe src='http://gen.lib.rus.ec/' width='100%' height='680'></iframe>";
        }
        else
        {
            $resources = $model->loadFrontResourcesByCategory($category_id);
        }
        if(isset($resources))
        {
            echo $resources;
        }
    }
}
?>