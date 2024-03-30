<div class="container">
    <div class='row'>
        <div class='col-sm-12'>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Administration</li>
                <li class="active">Edit Resource ( <?php echo $resourceDetails[0]->unique_id;?> )</li>
            </ol>
        </div>
        <div class="col-sm-offset-2 col-sm-8">
            <?php if(isset($feedback)){ echo $feedback; }?>
            <fieldset class="edits">
                <legend><i class="fa fa-plus-circle"></i> Edit Resource ( <?php echo $resourceDetails[0]->unique_id;?> ) <span class="pull-right"><a href="<?php echo URL;?>admin"><i class="fa fa-angle-double-left"></i> Back to Resources</a></span> </legend>
                <form class="form-horizontal" method="POST" action="<?php //echo $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                        <label for="link" class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="resource_link" value="<?php echo $resourceDetails[0]->resource_link;?>" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="resource_name" value="<?php echo $resourceDetails[0]->resource_name;?>" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control chosen" name="category" data-placeholder="Choose Resource Type..." required>
                                <option></option>
                                <?php if(isset($resourceCategories)){echo $resourceCategories;}?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div id="preview">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Full Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control trumbowyg" name="resource_description"><?php echo $resourceDetails[0]->resource_description;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name='update' class="btn btn-success"><i class="fa fa-check-circle"></i> Update Resource</button>
                        </div>
                    </div>
        </div>
        </form>
        </fieldset>
    </div>
</div>
</div>