<div class="container">
    <div class='row'>
        <div class='col-sm-12'>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Administration</li>
                <li class="active">Resources</li>
            </ol>
        </div>
        <div class="col-sm-2">
            <h5>Browse By Category</h5>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href='<?php echo URL;?>/admin/g/'>All Categories</a></li>
                <?php if(isset($categoryLinks)){echo $categoryLinks;}?>
            </ul>
        </div>
        <div class="col-sm-10" id="resources">
                <?php if(isset($resources)){ echo $resources;}?>
        </div>
    </div>
</div>