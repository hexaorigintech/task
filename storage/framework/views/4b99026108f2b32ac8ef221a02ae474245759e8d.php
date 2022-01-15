
<?php $__env->startSection('content'); ?>
    
<div class="card">
     <h3 class="card-header" style="display: flex; justify-content: space-between">
          Employees List
          <div class="buttons">
            <button class="btn  btn-sm btn-dark pull-right" data-bs-toggle="modal" data-bs-target="#xml-modal"> <span class="uil-download-alt"></span> &nbsp; Import XML </button>
             &nbsp;
            <button class="btn  btn-sm btn-success pull-right" data-bs-toggle="modal" data-bs-target="#emp-modal"> <span class="uil-plus-square"></span> &nbsp; Add New Employee </button> 
        </div>
          
     </h3>
     <div class="card-body">
        
          <table id="basic-datatable" class="table dt-responsive nowrap w-100" style="margin-top: -2%">
                <div class="form-gourp" style="position: absolute; width: 5% !important">
                   <form action="<?php echo e(route('employees')); ?>" method="GET" id="pagLengthFrm">  
                    <?php echo csrf_field(); ?>
                    <select name="pagLength" class="form-control form-control-sm choicebox">
                        <option <?php if(isset($_GET['pagLength']) && $_GET['pagLength']==10): ?> selected <?php endif; ?> value="10" selected> 10 </option>
                        <option <?php if(isset($_GET['pagLength']) && $_GET['pagLength']==25): ?> selected <?php endif; ?> value="25" > 25 </option>
                        <option <?php if(isset($_GET['pagLength']) && $_GET['pagLength']==50): ?> selected <?php endif; ?> value="50" > 50 </option>
                        <option <?php if(isset($_GET['pagLength']) && $_GET['pagLength']==100): ?> selected <?php endif; ?> value="100" > 100 </option>
                    </select>
                </form>
                </div>
               <thead class="">
                  
                   <tr>
                        <th>#</th>
                       <th>Name</th>
                       <th>DOB</th>
                       <th>Postion</th>
                       <th>Type</th>
                      
                       <th>Amount</th>
                       <th>Department</th>
                       <th>Options</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $id=0; ?>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                    <td><?php echo e(++$id); ?></td>
                   <td><?php echo e($data->name); ?></td>
                   <td><?php echo e($data->dob); ?></td>
                   <td><?php echo e($data->position); ?></td>
                   <td><?php echo e($data->type); ?></td>
                   <td><?php echo e($data->amount); ?></td>

                   <td><?php echo e($data->department); ?> </td>
                   <td style="width: 16%">
                       <a onclick="return confirm('Are you sure!')" href="<?php echo e(route('employee.delete',['id'=>$data->id])); ?>" class="btn btn-sm btn-danger"> <span class=" uil-trash-alt"></span> &nbsp; Delete </a>
                       <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#emp-modal<?php echo e($data->id); ?>"> <span class=" uil-edit"></span> &nbsp; Edit </button>
                   </td>
               </tr>
                <?php echo $__env->make('employees.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
           </table>
           <div class="pagination" style="display: flex; justify-content: space-between">
            <?php echo $employees->links(); ?>  
            <p>
              Total  <?php echo $employees->total(); ?> Per Page  <?php echo $employees->perPage(); ?>

            </p>
           </div>

     </div> <!-- end card-body-->
 </div>

 <?php echo $__env->make('employees.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('scripts'); ?>
      <?php if($errors->any()): ?>
      <script>
         $(function(){
            $("#emp-modal").modal('show');  
         });
      </script>
    <?php endif; ?> 
    
    <?php if(\Session::has('empSuccess')): ?>
     <script>
         $.NotificationApp.send("Done","You have successfully added new employee","bottom-right","success","success")
     </script>
    <?php endif; ?>

    <?php if(\Session::has('empSuccessUpdate')): ?>
    <script>
        $.NotificationApp.send("Done","You have successfully updated an employee","bottom-right","success","success")
    </script>
   <?php endif; ?>


   <?php if(\Session::has('empSuccessDelete')): ?>
   <script>
       $.NotificationApp.send("Done","You have successfully deleted an employee","bottom-right","success","success")
   </script>
  <?php endif; ?>


  <?php if(\Session::has('empSuccessImport')): ?>
  <script>
      $.NotificationApp.send("Done","You have successfully imported XML employee list","bottom-right","success","success")
  </script>
 <?php endif; ?>


 <script>
     $(function(){
        $(".choicebox").on('change',function(){
           $("#pagLengthFrm")[0].submit();
        });
     });
 </script>
  

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\client\resources\views/employees/index.blade.php ENDPATH**/ ?>