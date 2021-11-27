<?php
 require 'class.php';

?>


<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                List Articales
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Image</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        
                             <?php  
                             
                                while($data = mysqli_fetch_assoc($op)){
                             
                             ?>           
                                            <tr>
                                                <td><?php echo $data['id'];?></td>
                                                <td><?php echo $data['title']?></td>
                                                <td><?php echo substr($data['content'],0,30)?></td>
                                                <td><img src="./uploads/<?php echo $data['image']?>" width="50px"> </td>
                                           
                                            </tr>
                            <?php } ?>             

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>