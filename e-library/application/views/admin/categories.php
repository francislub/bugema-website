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
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6>Resource Categories <span class="pull-right"><a href="<?php echo URL;?>admin/new-category"><i class="fa fa-plus-circle"></i> Add New Category</a></span></h6>
                    <hr>
                    <table class="table table-bordered table-striped table-responsive">
                        <theead>
                            <th>#</th>
                            <th>Resource Category Name</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </theead>
                        <tbody>
                            <?php if(isset($categories)){echo $categories;}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>