
<?php $__env->startSection('content'); ?>
    
<div class="card">
     <h3 class="card-header" style="display: flex; justify-content: space-between">
          Departments List
          <div class="buttons">
            <button class="btn  btn-sm btn-success pull-right" data-bs-toggle="modal" data-bs-target="#dep-modal"> <span class="uil-plus-square"></span> &nbsp; Add New Department </button> 
        </div>
          
     </h3>
     <div class="card-body">
        
          <table id="basic-datatable" class="table dt-responsive nowrap w-100" style="margin-top: -2%">
                <div class="form-gourp col-md-1" style="position: absolute">
                    
                    <form action="<?php echo e(route('departments')); ?>" method="GET" id="pagLengthFrm">  
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
                       <th>Description</th>
                       <th>Options</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $id=0; ?>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                    <td><?php echo e(++$id); ?></td>
                   <td><?php echo e($data->name); ?></td>
                   <td><?php echo e($data->description); ?></td>
                  
                   <td style="width: 16%">
                       <a onclick="return confirm('Are you sure!')" href="<?php echo e(route('department.delete',['id'=>$data->id])); ?>" class="btn btn-sm btn-danger"> <span class=" uil-trash-alt"></span> &nbsp; Delete </a>
                       <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#dep-modal<?php echo e($data->id); ?>"> <span class=" uil-edit"></span> &nbsp; Edit </button>
                   </td>
               </tr>
                <?php echo $__env->make('departments.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
           </table>
           <div class="pagination" style="display: flex; justify-content: space-between">
            <?php echo $departments->links(); ?>  
            <p>
              Total  <?php echo $departments->total(); ?> Per Page  <?php echo $departments->perPage(); ?>

            </p>
           </div>

     </div> <!-- end card-body-->
 </div>

 <?php echo $__env->make('departments.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('scripts'); ?>
      <?php if($errors->any()): ?>
      <script>
         $(function(){
            $("#dep-modal").modal('show');  
         });
      </script>
    <?php endif; ?> 
    
    <?php if(\Session::has('depSuccess')): ?>
     <script>
         $.NotificationApp.send("Done","You have successfully added new department","bottom-right","success","success")
     </script>
    <?php endif; ?>

    <?php if(\Session::has('depSuccessUpdate')): ?>
    <script>
        $.NotificationApp.send("Done","You have successfully updated an department","bottom-right","success","success")
    </script>
   <?php endif; ?>


   <?php if(\Session::has('depSuccessDelete')): ?>
   <script>
       $.NotificationApp.send("Done","You have successfully deleted an department","bottom-right","success","success")
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\task2\resources\views/departments/index.blade.php ENDPATH**/ ?>