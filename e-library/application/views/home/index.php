<div class="container" id="body">
    <div class="row">
        <div class="col-sm-4">
        <p>&nbsp;</p>
        <img src="<?php echo URL;?>static/images/banner_new.png" class="img-responsive"></div>
        <div class="col-sm-8 text-right">
            <p>&nbsp;</p>
            <a href="http://137.63.146.2/"><i class="fa fa-angle-double-left"></i> OPAC</a>
            <span class="joiner"> | </span>
            <a href="http://bugemauniv.ac.ug/"><i class="fa fa-angle-double-left"></i> Back to Main Website</a>
            <span class="joiner"> | </span>
            <a href="<?php echo URL;?>auth/login"><i class="fa fa-unlock"></i> Login</a>
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-sm-12">
            <div class="jumbotron">
                <h3>Open Access Library</h3>
                <p>Welcome to our  Open Access Library, a vast collection of resources that support both student learning and staff research. Open Access Library content is free and open to the general public.
                The following is a list of on-line books and journals that are available for download or to read on-line:</p>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <h5>Browse by Category</h5>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href='<?php echo URL;?>/home/load/'>All Categories</a></li>
                <?php if(isset($categoryLinks)){echo $categoryLinks;}?>
                <li><a href='<?php echo URL;?>/home/load/iframe'>E-LIBRARY</a></li>
            </ul>
        </div>
        <div class="col-sm-10">
                <div  id="resources">
                <?php if(isset($resources)){ echo $resources;}?>
                </div>
        </div>
    </div>

</div> <!-- /container -->