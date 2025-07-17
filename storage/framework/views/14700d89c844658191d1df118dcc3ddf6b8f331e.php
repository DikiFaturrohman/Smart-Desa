<?php if($paginator->total() > $paginator->perPage()): ?>
<ul class="pagination" aria-label="Pagination">

  <li class="<?php echo e(($paginator->currentPage() == 1) ? ' disabled' : ''); ?>"><a href="<?php echo e($paginator->url(1)); ?>"><span>First</span></a></li>

  <li class="<?php echo e(($paginator->currentPage() == 1) ? ' disabled' : ''); ?>"><a href="<?php echo e($paginator->url($paginator->currentPage()-1)); ?>"><span>Previous</span></a></li>

  <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>

  <li class="<?php echo e(($paginator->currentPage() == $i) ? ' active' : ''); ?>"><a href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a></li>

  <?php endfor; ?>

  <li class="<?php echo e(($paginator->currentPage() == 1) ? ' disabled' : ''); ?>"><a href="<?php echo e($paginator->url($paginator->currentPage()+1)); ?>"><span>Next</span></a></li>

  <li class="<?php echo e(($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : ''); ?>"><a href="<?php echo e($paginator->url($paginator->currentPage()+1)); ?>"><span>Last</span></a></li>

</ul>
<?php endif; ?>
<?php /**PATH C:\laragon\www\smartdesa\resources\views/frontend/layout/pagination.blade.php ENDPATH**/ ?>