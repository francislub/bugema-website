<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user-circle-o"></i> My Account </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4"><img src="<?php echo URL;?>user_thumbs/icon-user-default.png" class="img-circle" width="60px;"> </div>
            <div class="col-sm-8">
                <?php if(isset($user_info['names'])){echo $user_info['names']; }?>
                <hr class="no-margins">
                <p class="text-muted no-margins"><?php if(isset($user_info['AdminRoleName'])){echo $user_info['AdminRoleName']; }?></p>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading"> <h3 class="panel-title"><i class="fa fa-database"></i> Storage Details</h3></div>
    <div class="panel-body">
        <p>Storage Drive Size : <span class="pull-right text-info"><strong><?php if(isset($storageSize)){echo $storageSize;}?></strong></span></p>
        <hr>
        <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?php if(isset($storageUsedPercentage)){echo $storageUsedPercentage;}?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(isset($storageUsedPercentage)){echo $storageUsedPercentage.'%';}?>;">
                <?php if(isset($storageUsedPercentage)){echo $storageUsedPercentage.'%';}?>
            </div>
        </div>
        <hr>
        <p>Used Storage  Space : <span class="pull-right text-danger"><strong><?php if(isset($storageUsed)){echo $storageUsed;}?></strong> </span></p>
        <hr>
        <p>Available Storage Space : <span class="pull-right"><strong><?php if(isset($storageFree)){echo $storageFree;}?></strong></span></p>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Chart</h3>
    </div>
    <div class="panel-body">
        <div id="hero-donut" style="height: 250px;"></div>
    </div>
</div>