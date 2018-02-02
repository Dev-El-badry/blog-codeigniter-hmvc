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
            <i class="fa fa-cog fa-fw"></i>
            Manage Enquiries
        </h3>
        </div>
        <div class="panel-body">
           
           <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Date Sent</th>
                            <th>Sent By</th>
                            <th>Subject</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($query->result() as $row) {
                           if($row->opend == 0) {
                            $icon = 'envelope';
                            $color = 'orange';
                           } elseif($row->opend == 1) {
                            $icon = 'envelope-o';
                            $color = '';
                           }
                        ?>
                            <td  class="text-center"><i style="color: <?= $color ?>" class="fa fa-<?= $icon ?> fa-fw fa-lg"></i></td>
                            <td><?php echo date('d, M Y', $row->date_created) ?></td>
                            <td><?= $row->sender_name ?></td>
                            <td><?= $row->subject ?></td>
                            <td class="text-center"><a href="<?= base_url() ?>enquiries/view/<?= $row->id ?>" class="btn btn-default"><i class="fa fa-eye"></i></a></td>
                        <?php } ?>
                    </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>