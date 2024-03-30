<?php

/**
 * Created by PhpStorm.
 * User: Denis Mariano
 * Date: 1/11/2017
 * Time: 12:02
 */
class homeModel extends Model
{
    public function getAllResources()
    {
        $resources = "";
        $count =0;

        $SQL = "SELECT * FROM resources ORDER BY resource_name ASC";
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
                                    <p><span class='text-muted'> Resource ID #{$unique_id} <span class='pull-right text-warning'>{$resource_category}</span> </span></p>
                                </div>
                             ";
            }
            return "<div class='list-group'>{$resources}</div>";
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
            return "<div class='alert alert-block alert-warning'><strong>WARNING : </strong>No Resources found in the Database</div>";
        }
        else
        {
            while($row = $QRY->fetch_array())
            {
                $categoryId = $row['id'];
                $categoryName = $row['category_name'];

                $categories .="<li><a href='".URL."home/load/{$categoryId}'>{$categoryName}</a></li>";
            }
            return $categories;
        }
    }
    public function loadFrontResourcesByCategory($category_id)
    {
        $resources = "";
        $count =0;

        $_category_id = $this->db->real_escape_string($category_id);

        $SQL = "SELECT * FROM resources WHERE category_id = '{$_category_id}' ORDER BY resource_name ASC";
        $QRY = $this->db->query($SQL);
        $num_rows = $QRY->num_rows;
        if(!$num_rows)
        {
            $resources .="
                                <div class='list-group-item'>
                                    <p class='list-group-item-heading text-danger'>Sorry, this category has no resources listed at the moment. Check back later please ........</p>
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
                                    <p><span class='text-muted'> Resource ID #{$unique_id} <span class='pull-right text-warning'>{$resource_category}</span></span></p>
                                </div>
                             ";
            }
            return "<div class='list-group'>{$resources}</div>";
        }
    }
}