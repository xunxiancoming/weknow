<style>
	ul{
		list-style: none;
	}
	li{
		background: red;
		color: white;
		padding: 2px;
	}
</style>
<?php if(count($errors)>0): ?>
	<ul class="alert alert-danger">
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
<?php endif; ?>