<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel ">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Wallet connect settings</h1>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="mb-5 row">
                    <div class="col-lg-8 offset-lg-2 card p-3  shadow">
                        <form method="POST" action="<?php echo e(url('admin/dashboard/mwalletconnectsave')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('min_balance') ? ' has-error' : ''); ?>">
                                <h4 class="">Min Balance</h4>
                                <div>
                                    <input id="name" type="text" class="form-control  " name="min_balance"
                                        value="<?php echo e($settings->min_balance); ?>" required>
                                    <?php if($errors->has('min_balance')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('min_balance')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('min_return') ? ' has-error' : ''); ?>">
                                <h4 class="">Return (Profit)</h4>
                                <div>
                                    <input id="name" type="text" class="form-control  " name="min_return"
                                        value="<?php echo e($settings->min_return); ?>" required>
                                    <?php if($errors->has('min_return')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('min_return')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group">
    <h4 class="">Turn On/Off</h4>
    <div>
        <select name="wallet_status" class="form-control" required>
            <option value="on" <?php echo e($settings->wallet_status == 'on' ? 'selected' : ''); ?>>On</option>
            <option value="off" <?php echo e($settings->wallet_status == 'off' ? 'selected' : ''); ?>>Off</option>
        </select>

        <?php if($errors->has('wallet_status')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('wallet_status')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>





                            <div class="form-group">
                                <div>
                                    <button type="submit" class="px-3 btn btn-primary btn-lg">
                                        <i class="fa fa-plus"></i> Update Settings
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/web/primeimperialtrade.live/public_html/resources/views/admin/wallet/mwalletsettings.blade.php ENDPATH**/ ?>