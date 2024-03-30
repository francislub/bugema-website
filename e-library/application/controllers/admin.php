<?php

/**
 * Created by PhpStorm.
 * User: Denis Mariano
 * Date: 1/10/2017
 * Time: 20:12
 */
class admin extends controller
{
    public function index()
    {
        $user_info = $this->bootstrap();
        $adminModel = $this->loadModel('adminModel');
        require_once APP_DIR.'views/templates/header.php';
        $categoryLinks = $adminModel->getResourceCategories();
        $resources = $adminModel->getAllResources();
        require_once APP_DIR.'views/admin/index.php';
        require_once APP_DIR.'views/templates/footer.php';
    }
    public function new_resource()
    {
        $user_info = $this->bootstrap();
        $adminModel = $this->loadModel('adminModel');
        $resourceCategories = $adminModel->getCategoryList();
        require_once APP_DIR.'views/templates/header.php';
        if(isset($_POST['submit']))
        {
            //var_dump($_POST);
            $feedback = $adminModel->addNewResource($_POST['resource_name'],$_POST['resource_link'],$_POST['resource_description'],$_POST['category']);
        }
        require_once APP_DIR.'views/admin/new_resource.php';
        require_once APP_DIR.'views/templates/footer.php';
    }
    public function new_category()
    {
        $user_info = $this->bootstrap();
        $adminModel = $this->loadModel('adminModel');
        require_once APP_DIR.'views/templates/header.php';
        if(isset($_POST['submit']))
        {
            //var_dump($_POST);
            $feedback = $adminModel->addNewCategory($_POST['category_name']);
        }
        require_once APP_DIR.'views/admin/new_category.php';
        require_once APP_DIR.'views/templates/footer.php';
    }
    public function categories()
    {
        $user_info = $this->bootstrap();
        $adminModel = $this->loadModel('adminModel');
        require_once APP_DIR.'views/templates/header.php';
        $categories = $adminModel->resourceCategories();
        require_once APP_DIR.'views/admin/categories.php';
        require_once APP_DIR.'views/templates/footer.php';
    }
    public function delete_cat($id)
    {
        $user_info = $this->bootstrap();
        $adminModel = $this->loadModel('adminModel');
        $feedback = $adminModel->deleteCategory($id);
        if($feedback)
        {
            header("location:".URL."admin");
        }
    }
    public function delete($unique_id)
    {
        $user_info = $this->bootstrap();
        $adminModel = $this->loadModel('adminModel');
        $resourceDetails = $adminModel->loadResourceById($unique_id);
        $feedback = $adminModel->deleteResource($resourceDetails[0]->id);
        if($feedback)
        {
            header("location:".URL."admin");
        }
    }
    public function edit_cat($id)
    {
        $user_info = $this->bootstrap();
        $adminModel = $this->loadModel('adminModel');
        $catDetails = $adminModel->loadCategoryById($id);
        require_once APP_DIR.'views/templates/header.php';
        if(isset($_POST['update']))
        {
            //var_dump($_POST);
            $feedback = $adminModel->updateCategory($_POST['category_name'],$id);
        }
        require_once APP_DIR.'views/admin/edit_category.php';
        require_once APP_DIR.'views/templates/footer.php';
    }
    public function edit($unique_id)
    {
        $user_info = $this->bootstrap();
        $adminModel = $this->loadModel('adminModel');
        $resourceDetails = $adminModel->loadResourceById($unique_id);
        $resourceCategories = $adminModel->getCategoryList($resourceDetails[0]->category_id);
        require_once APP_DIR.'views/templates/header.php';
        if(isset($_POST['update']))
        {
            //var_dump($_POST);
            $feedback = $adminModel->updateResource($_POST['resource_name'],$_POST['resource_link'],$_POST['resource_description'],$resourceDetails[0]->id,$unique_id,$_POST['category']);
        }
        require_once APP_DIR.'views/admin/edit_resource.php';
        require_once APP_DIR.'views/templates/footer.php';
    }
    public function g($category_id=NULL)
    {
        $model = $this->loadModel('adminModel');
        if($category_id==NULL)
        {
            $resources = $model->getAllResources();
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
    public function pull_data()
    {
        $model = $this->loadModel('adminModel');
        $model->pull_data();
    }
}