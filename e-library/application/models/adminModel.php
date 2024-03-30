<?php

/**
 * Created by PhpStorm.
 * User: Denis Mariano
 * Date: 1/11/2017
 * Time: 00:01
 */
class adminModel extends Model
{
    public function addNewResource($resourceName,$resourceLink,$resourceDescription,$category)
    {
        $unique_id = uniqid();
        $date = date('jS, F Y (h:i:s A)');
        //
        $_resourceName = $this->db->real_escape_string($resourceName);
        $_resourceLink = $this->db->real_escape_string($resourceLink);
        $_resourceDescription = $this->db->real_escape_string($resourceDescription);
        //
        $sql = "SELECT * FROM resources WHERE resource_name='{$_resourceName}'";
        $query = $this->db->query($sql);
        $num_rows = $query->num_rows;
        if($num_rows)
        {
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>Similar Resource already exists in the Database</div>";
        }
        else
        {
            $insertSQL = "INSERT INTO resources(resource_name,resource_link,resource_description,date_added,unique_id,category_id)VALUES('{$_resourceName}','{$_resourceLink}','{$_resourceDescription}','{$date}','{$unique_id}','{$category}')";

            if (!($this->db->query($insertSQL)))
            {
                return "<div class='alert alert-block alert-danger'><strong>SQL [2] ERROR (" . $this->db->errno . ") : </strong>" . $this->db->error . "</div>";
            }
            else
            {
                //header("location:".URL."");
                return "<div class='alert alert-block alert-success'><i class='fa fa-spinner fa-spin'></i> Resource added Successfully. Resource ID # {$unique_id} ......</div><script type='text/javascript'>setTimeout(function() { window.location.href = '" . URL . "admin/#{$unique_id}';}, 3000);</script>";
            }
        }
    }
    public function getCategoryList($id=NULL)
    {
        $options = "";
        $SQL = "SELECT * FROM resource_categories";
        $QRY = $this->db->query($SQL);
        While($row = $QRY->fetch_array())
        {
            $cat_id = $row['id'];
            $cat_name = $row['category_name'];
            $options .="<option value='{$cat_id}'"; if(isset($id)){if($id==$cat_id){ $options.='selected';}} $options.=">{$cat_name}</option>";
        }
        return $options;
    }
    public function getAllResources()
    {
        $resources = "";
        $count =0;

        $SQL = "SELECT * FROM resources";
        $QRY = $this->db->query($SQL);
        $num_rows = $QRY->num_rows;
        if(!$num_rows)
        {
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>No Resources found in the Database</div>";
        }
        else
        {
            while($row = $QRY->fetch_array())
            {
                $resourceName = $row['resource_name'];
                $resourceLink = $row['resource_link'];
                $resourceDescription = $row['resource_description'];
                $date_added = $row['date_added'];
                $unique_id = $row['unique_id'];

                $count++;

                $resources .="
                                <div class='list-group-item' id='{$unique_id}'>
                                    <h5 class='list-group-item-heading'><span class='text-danger'>{$count} |</span> <a href='{$resourceLink}' target='_blank'>{$resourceName} <span class='pull-right'><i class='fa fa-external-link'></i></span> </a></h5>
                                    <p>&nbsp;</p>
                                    <div class=''>{$resourceDescription}</div>
                                    <p>&nbsp;</p>
                                    <p><span class='text-muted'> Resource ID #{$unique_id}</span> <span class='pull-right'><a href='".URL."admin/edit/{$unique_id}' data-toggle='tooltip' data-placement='left' title='Edit Resource'><i class='fa fa-pencil'></i></a><span class='joiner'></span><a href='".URL."admin/delete/{$unique_id}' class='delete text-danger' data-toggle='tooltip' data-placement='right' title='Delete Resource'><i class='fa fa-trash'></i> </a></span> </p>
                                </div>
                             ";
            }
            return "<div class='list-group'>".$resources."</div>";
        }
    }
    public function getResourceCategories()
    {
        $categories = "";
        $count =0;

        $SQL = "SELECT * FROM resource_categories";
        $QRY = $this->db->query($SQL);
        $num_rows = $QRY->num_rows;
        if(!$num_rows)
        {
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>Similar Resource already exists in the Database</div>";
        }
        else
        {
            while($row = $QRY->fetch_array())
            {
                $categoryId = $row['id'];
                $categoryName = $row['category_name'];

                $categories .="<li><a href='".URL."admin/g/{$categoryId}'>{$categoryName}</a></li>";
            }
            return $categories;
        }
    }
    public function loadFrontResourcesByCategory($category_id)
    {
        $resources = "";
        $count =0;

        $_category_id = $this->db->real_escape_string($category_id);

        $SQL = "SELECT * FROM resources WHERE category_id = '{$_category_id}'";
        $QRY = $this->db->query($SQL);
        $num_rows = $QRY->num_rows;
        if(!$num_rows)
        {
            $resources .="
                                <div class='list-group-item'>
                                    <p class='list-group-item-heading text-danger'>Oops, This category has no resources listed</p>
                                </div>
                             ";
            return "<div class='list-group'>{$resources}</div>";
        }
        else
        {
            while($row = $QRY->fetch_array())
            {
                $resourceName = $row['resource_name'];
                $resourceLink = $row['resource_link'];
                $resourceDescription = $row['resource_description'];
                $date_added = $row['date_added'];
                $unique_id = $row['unique_id'];

                $resource_cat_id = $row['category_id'];
                $SQL2  = "SELECT * FROM resource_categories WHERE id='{$resource_cat_id}'";
                $QRY2  = $this->db->query($SQL2);
                while($row2 = $QRY2->fetch_array())
                {
                    $resource_category = $row2['category_name'];
                }
                $count++;

                $resources .="
                                <div class='list-group-item' id='{$unique_id}'>
                                    <h5 class='list-group-item-heading'><span class='text-danger'>{$count} |</span> <a href='{$resourceLink}' target='_blank'>{$resourceName} <span class='pull-right'><i class='fa fa-external-link'></i></span> </a></h5>
                                    <p>&nbsp;</p>
                                    <div class=''>{$resourceDescription}</div>
                                    <p>&nbsp;</p>
                                    <p><span class='text-muted'> Resource ID #{$unique_id}</span> <span class='pull-right'><a href='".URL."admin/edit/{$unique_id}' data-toggle='tooltip' data-placement='left' title='Edit Resource'><i class='fa fa-pencil'></i></a><span class='joiner'></span><a href='".URL."admin/delete/{$unique_id}' class='delete text-danger' data-toggle='tooltip' data-placement='right' title='Delete Resource'><i class='fa fa-trash'></i> </a></span> </p>
                                </div>
                             ";
            }
            return "<div class='list-group'>{$resources}</div>";
        }
    }
    public function loadResourceById($unique_id)
    {
        $SQL = "SELECT * FROM resources WHERE unique_id='{$unique_id}'";
        $QRY = $this->db->query($SQL);
        $num_rows = $QRY->num_rows;
        if(!$num_rows)
        {
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>Similar Resource already exists in the Database</div>";
        }
        else
        {
            while($row = $QRY->fetch_object())
            {
                $data[] = $row;
            }
            return @$data;
        }
    }
    public function updateResource($resourceName,$resourceLink,$resourceDescription,$id,$unique_id,$category)
    {
        //
        $_resourceName = $this->db->real_escape_string($resourceName);
        $_resourceLink = $this->db->real_escape_string($resourceLink);
        $_resourceDescription = $this->db->real_escape_string($resourceDescription);

        $insertSQL = "UPDATE resources SET resource_name='{$_resourceName}',resource_link='{$_resourceLink}',resource_description='{$_resourceDescription}', category_id='{$category}' WHERE id='{$id}'";

            if (!($this->db->query($insertSQL)))
            {
                return "<div class='alert alert-block alert-danger'><strong>SQL [2] ERROR (" . $this->db->errno . ") : </strong>" . $this->db->error . "</div>";
            }
            else
            {
                //header("location:".URL."");
                return "<div class='alert alert-block alert-success'><i class='fa fa-spinner fa-spin'></i> Resource ID # {$unique_id}, successfully updated ! ......</div><script type='text/javascript'>setTimeout(function() { window.location.href = '" . URL . "admin/#{$unique_id}';}, 3000);</script>";
            }

    }
    public function deleteResource($id)
    {
        $SQL = "DELETE FROM resources WHERE id='{$id}'";
        if(!($this->db->query($SQL)))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    public function deleteCategory($id)
    {
        $SQL = "DELETE FROM resource_categories WHERE id='{$id}'";
        if(!($this->db->query($SQL)))
        {
            return $this->db->error;
        }
        else
        {
            return true;
        }
    }
    public function resourceCategories()
    {
        $categories = "";
        $count =0;

        $SQL = "SELECT * FROM resource_categories";
        $QRY = $this->db->query($SQL);
        $num_rows = $QRY->num_rows;
        if(!$num_rows)
        {
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>No Resources found in the Database</div>";
        }
        else
        {
            while($row = $QRY->fetch_array())
            {
                $categoryId = $row['id'];
                $categoryIdx = base64_encode($categoryId);
                $categoryName = $row['category_name'];
                $count++;

                $categories .="<tr>
                                    <td>$count</td>
                                    <td>{$categoryName}</td>
                                    <td class='text-center'><a href='".URL."admin/edit-cat/{$categoryIdx}' class='text-success'><i class='fa fa-pencil'></i></a></td>
                                    <td class='text-center'><a href='".URL."admin/delete-cat/{$categoryId}' class='text-danger delete'><i class='fa fa-trash'></i></a></td>
                                </tr>";
            }
            return $categories;
        }
    }
    public function loadCategoryById($id)
    {
        $unique_id = base64_decode($id);
        $SQL = "SELECT * FROM resource_categories WHERE id='{$unique_id}'";
        $QRY = $this->db->query($SQL);
        $num_rows = $QRY->num_rows;
        if(!$num_rows)
        {
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>Similar Resource already exists in the Database</div>";
        }
        else
        {
            while($row = $QRY->fetch_object())
            {
                $data[] = $row;
            }
            return @$data;
        }
    }
    public function updateCategory($name,$id)
    {
        $unique_id = base64_decode($id);
        $_name = $this->db->real_escape_string($name);
        $SQL = "UPDATE resource_categories SET category_name='{$_name}' WHERE id='{$unique_id}'";
        if (!($this->db->query($SQL)))
        {
            return "<div class='alert alert-block alert-danger'><strong>SQL [2] ERROR (" . $this->db->errno . ") : </strong>" . $this->db->error . "</div>";
        }
        else
        {
            //header("location:".URL."");
            return "<div class='alert alert-block alert-success'><i class='fa fa-spinner fa-spin'></i> Category successfully updated ! ......</div><script type='text/javascript'>setTimeout(function() { window.location.href = '" . URL . "admin/categories';}, 3000);</script>";
        }

    }
    public function addNewCategory($categoryName)
    {

        //
        $_catName = $this->db->real_escape_string($categoryName);
        //
        $sql = "SELECT * FROM resource_categories WHERE category_name='{$_catName}'";
        $query = $this->db->query($sql);
        $num_rows = $query->num_rows;
        if($num_rows)
        {
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>Similar Resource Category already exists in the Database</div>";
        }
        else
        {
            $insertSQL = "INSERT INTO resource_categories(category_name)VALUES('{$_catName}')";

            if (!($this->db->query($insertSQL)))
            {
                return "<div class='alert alert-block alert-danger'><strong>SQL [2] ERROR (" . $this->db->errno . ") : </strong>" . $this->db->error . "</div>";
            }
            else
            {
                //header("location:".URL."");
                return "<div class='alert alert-block alert-success'><i class='fa fa-spinner fa-spin'></i> Category added Successfully.......</div><script type='text/javascript'>setTimeout(function() { window.location.href = '" . URL . "admin/categories';}, 3000);</script>";
            }
        }
    }
    public function pull_data()
    {
        $count =0;
        $sqlxx = "";
        $SQL = "SELECT * FROM slau_lib_content";
        $QRY = $this->db->query($SQL);
        $num_rows = $QRY->num_rows;
        if(!$num_rows)
        {
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>No Resources found in the Database</div>";
        }
        else
        {
            while($row = $QRY->fetch_array())
            {
                $unique_id = uniqid();
                $date = date('jS, F Y (h:i:s A)');
                $category = $row['category'];
                if($category=="Books"){$category="1";}else if($category=="Journals"){$category="2";}else if($category=="links"){$category="4";}
                
                $description = $this->db->real_escape_string($row['description']);
                $link = $this->db->real_escape_string($row['link']);
                $name = $this->db->real_escape_string($row['name']);

                $sqlxx ="INSERT INTO resources(resource_name,resource_link,resource_description,unique_id,date_added,category_id)VALUES('{$name}','{$link}','{$description}','{$unique_id}','{$date}','{$category}')";
                if(!$this->db->query($sqlxx))
                {
                    die($this->db->error);
                }
                else
                {
                    $count++;
                    //echo  $this->db->affected_rows." Rows Populated";
                }
            }
            echo  $count." Rows Populated";
            
        }
           
    }
}