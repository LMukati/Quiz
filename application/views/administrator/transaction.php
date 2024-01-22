<?php include("header.php") ; ?>
 <div class="main-panel">

<div class="main-content">
   <div class="content-wrapper"><!--Statistics cards Starts-->
        
      <div class="row">
    <div class="col-12">
        <div class="content-header">All Transactions</div>
       
       
    </div>
</div>
<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <table class="table" id="mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Txn Id</th>
                                    <th>Deposit</th>
                                    <th>Payment Mode</th>
                                    <th>Status</th>
                                    <th>Invoice</th>
                                 </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1 ; foreach($view as $ad){ ?>
                                <tr>
                                    <td><?php echo $i ; ?></td>
                                    <td><?php echo $ad->user_id ; ?></td>
                                    <td><?php echo number_format($ad->amount,2) ; ?></td>
                                    <td><?php echo $ad->transaction_id ; ?></td>
                                    <td>Advance</td>
                                    <td><?php echo $ad->payment_method ; ?></td>
                                    <td>
                                        <?php if($ad->payment_status == 1){ ?>
                                        <a class="success p-0"><i class="fa fa-check"></i> Complete</a>
                                        <?php }elseif($ad->payment_status == 2){ ?>
                                        <a class="danger p-0"><i class="fa fa-times"></i> Declined</a>
                                        <?php }else{ ?>
                                        <a class="warning p-0"><i class="fa fa-circle"></i> notdone</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                         <?php if( $ad->purchase_coupons !='1'){ ?><a href="<?php echo base_url('administrator/Home/invoice/').$ad->result_id ?>" class="info p-0 " target="_blank"><i class="fa fa-file"></i> Result </a>
                                        <?php } ?>
                                    </td>
                                 </tr>
                              <?php $i++ ; } ?>   
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  </div>
</div>
 
 
        
<?php include("footer.php") ; ?> 



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script>
$(document).ready( function () {
    $('#mytable').DataTable();
     $('#mytable1').DataTable();
} );    
</script> 
<style>
input[type="search"] {
    height: 40px;
    border-radius: 10px;
}
div#mytable_length select {
    height: 40px;
    border-radius: 10px;
}
</style>  




