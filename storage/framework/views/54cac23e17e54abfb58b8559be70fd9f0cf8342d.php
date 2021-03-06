<!DOCTYPE html>
<html lang="en">
<head>
<title><?php if(Auth::user()->user_type == 'vendor'): ?><?php echo e(__('Attribute Type')); ?><?php else: ?><?php echo e(__('404 Page Not Found!')); ?><?php endif; ?>  - <?php echo e($allsettings->site_title); ?></title>
<?php echo $__env->make('style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(Auth::user()->user_type == 'vendor'): ?>
    <section class="headerbg" style="background-image: url('<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_header_background); ?>');">
      <div class="container text-left">
        <h2 class="mb-0"><?php echo e(__('Attribute Type')); ?></h2>
        <p class="mb-0"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(__('Home')); ?></a> <span class="split">&gt;</span> <span><?php echo e(__('Attribute Type')); ?></span></p>
      </div>
    </section>
    <main role="main">
     <div class="container page-white-box mt-3">
     <div class="row mb-2">
           <div class="col-md-12 text-right">
           <a href="<?php echo e(URL::to('/add-attribute-type')); ?>" class="btn button-color"><i class="fa fa-plus"></i><?php echo e(__('Add Attribute Type')); ?></a>
           </div>
        </div>
     <div class="row">
	     <div class="col-md-12">
             <?php if($message = Session::get('success')): ?>
                   <div class="alert alert-success" role="alert">
                      <span class="alert_icon lnr lnr-checkmark-circle"></span>
                       <?php echo e($message); ?>

                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span class="fa fa-close" aria-hidden="true"></span>
                       </button>
                   </div>
            <?php endif; ?>
            <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger" role="alert">
                  <span class="alert_icon lnr lnr-warning"></span>
                   <?php echo e($message); ?>

                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span class="fa fa-close" aria-hidden="true"></span>
                   </button>
            </div>
            <?php endif; ?>
            <?php if(!$errors->isEmpty()): ?>
            <div class="alert alert-danger" role="alert">
            <span class="alert_icon lnr lnr-warning"></span>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-close" aria-hidden="true"></span>
            </button>
            </div>
            <?php endif; ?>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
             <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Sno')); ?></th>
                                            <th><?php echo e(__('Attribute Type')); ?></th>
                                            <th><?php echo e(__('Display Order')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php $__currentLoopData = $typeData['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($no); ?></td>
                                            <td><?php echo e($type->attribute_name); ?> </td>
                                            <td><?php echo e($type->attribute_order); ?> </td>
                                            <td><?php if($type->attribute_status == 1): ?><span class="badge badge-success"><?php echo e(__('Active')); ?></span><?php else: ?><span class="badge badge-danger"><?php echo e(__('InActive')); ?></span><?php endif; ?></td>
                                            <td>
                                            <?php if(Auth::user()->id == $type->user_id): ?>
                                            <a href="edit-attribute-type/<?php echo e(base64_encode($type->attribute_id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; <?php echo e(__('Edit')); ?></a> 
                                            <?php if($demo_mode == 'on'): ?> 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;<?php echo e(__('Delete')); ?></a>
                                            <?php else: ?> 
                                            <a href="attribute-type/<?php echo e(base64_encode($type->attribute_id)); ?>" class="btn btn-danger btn-sm" onClick="return confirm('<?php echo e(__('Are you sure you want to delete?')); ?>');"><i class="fa fa-trash"></i>&nbsp;<?php echo e(__('Delete')); ?></a><?php endif; ?> <?php else: ?>
                                           <a href="javascript:void(0);" class="btn btn-secondary btn-sm" onClick="alert('<?php echo e(__('Sorry you can not edit this attribute type')); ?>');"><i class="fa fa-ban"></i>&nbsp; <?php echo e(__('Edit')); ?></a><a href="javascript:void(0);" class="btn btn-secondary btn-sm" onClick="alert('<?php echo e(__('Sorry you can not delete this attribute type')); ?>');"><i class="fa fa-ban"></i>&nbsp;<?php echo e(__('Delete')); ?></a><?php endif; ?></td></tr><?php $no++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
</main>
<?php else: ?>
<?php echo $__env->make('not-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\zigkart\resources\views/attribute-type.blade.php ENDPATH**/ ?>