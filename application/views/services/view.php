<div class="row">
    <div class="col-lg-12">
    	 
        <h1 class="page-header">Enquiries</h1>

    </div>
</div>

<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3>    
            <i class="fa fa-envelope fa-fw"></i>
            <?= $head_line ?>
        </h3>
        </div>
        <div class="panel-body">
           
           <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>Icon </th>
                            <th>:&nbsp;<?= $icon ?></th>    
                        </tr>
                        <tr>
                            <th>Service Name </th>
                            <th>:&nbsp;<?= $services_title ?></th>    
                        </tr>
                        
                        <tr>
                            <th>Services Description </th>
                            <th>:&nbsp;<?= nl2br($services_description)  ?></th>    
                        </tr>
                        <tr>
                            <th>Service Name Arabic </th>
                            <th>:&nbsp;<?= $services_title_ar ?></th>    
                        </tr>
                         <tr>
                            <th>Services Description Arabic </th>
                            <th>:&nbsp;<?= nl2br($services_description_ar)  ?></th>    
                        </tr>
                       
                    </thead>
                   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>