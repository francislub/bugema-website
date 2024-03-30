<div class="container">
    <div class='row'>
        <div class='col-sm-12'>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Administration</li>
                <li class="active">Categories</li>
            </ol>
        </div>
        <div class="col-sm-offset-2 col-sm-8">
            <?php if(isset($feedback)){ echo $feedback; }?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6><i class="fa fa-plus-circle"></i> Add New Category <span class="pull-right"><a href="<?php echo URL;?>admin/categories"><i class="fa fa-angle-double-left"></i> Back to Categories</a></span></h6>
                    <hr>
                    <form class="form-horizontal" method="POST" action="<?php //echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="catName" name="category_name" value="<?php echo $catDetails[0]->category_name; ?>" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name='update' class="btn btn-success"><i class="fa fa-check-circle"></i> Update Category</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>