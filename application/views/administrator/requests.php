<?php include("header.php") ; ?>
<div class="main-panel">
<div class="main-content">
   <div class="content-wrapper"><!--Statistics cards Starts-->
        
      <div class="row">
    <div class="col-12">
        <div class="content-header">Manage Requests </div>
        <p class="content-sub-header">All Requests data and details.</p>
       
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
                        <table class="table table-responsive-md-md" id="mytable">
                            <thead>
                                <tr>
                                          <th>#</th>
                                          <th>User</th>
                                          <th>Service</th>
                                          <th>Price</th>
                                          <th>Payment Status</th>
                                          <th>Status</th>
                                          <th>Action</th>
                               </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1 ; foreach($view as $ad){ ?>
                                <tr>
                                    <td><?php echo $i ; ?></td>
                                    <td><?php echo $this->db->get_where("users",array("id"=>$ad->user_id))->row()->name ; ?></td>
                                    <td><?php  echo $this->db->get_where("services",array("id"=>$ad->service_id))->row()->name ; ?></td>
                                    <td><?php echo $ad->payment_amount ; ?></td>
                                    <td><?php echo $ad->payment_status ; ?></td>
                                    <td><?php 
                                        if($ad->status == 0)
                                            { echo "pending" ;  
                                            }
                                        elseif($ad->status == 1)
                                            { echo "Review" ; }
                                            elseif($ad->status == 2){ echo "Cancled" ; }
                                            else{ echo "Complete" ; } 
                                        ?>
                                    </td>
                                    <td>
                                      <?php if($ad->payment_status == 1){ ?>
                                      <a href="<?php echo base_url('administrator/Requests/invoice/').$ad->id ?>" target="_blank"><button class="btn btn-success btn-primary">Invoice</button></a>
                                      <?php } ?>
                                      <a href="<?php echo base_url('administrator/Requests/view/').$ad->id ; ?>"><button class="btn btn-raised btn-primary">View</button></a>
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




