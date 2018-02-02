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
                            <th>Sender Name </th>
                            <th>:<?= $sender_name ?></th>    
                        </tr>
                        <tr>
                            <th>Sender E-Mail </th>
                            <th>:<?= $sender_email ?></th>    
                        </tr>
                        <tr>
                            <th>Sender Phone </th>
                            <th>:<?= $sender_phone ?></th>    
                        </tr>
                        <tr>
                            <th>Subject </th>
                            <th>:<?= $subject ?></th>    
                        </tr>
                        <tr>
                        	<th>Content </th>
                            <th>:<?= nl2br($content) ?></th>  
                        </tr>
                         <tr>
                        	<th>Date Sent </th>
                            <th>:<?= date('d, M Y', $date_created) ?></th>  
                        </tr>
                    </thead>
                   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>