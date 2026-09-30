 <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h3>Upload new theme (zip file)</h3>
                <p>Your new theme will be applied to users dashboard upon upload success.</p>
            </div>

        </div>
        <div class="text-center">
            <form method="post" action="<?php echo e(route('theme.update')); ?>" enctype="multipart/form-data" id="themeForm">
                 <?php echo csrf_field(); ?>
                <input type="file" name='theme' required>
                <button type="submit" class="px-4 btn btn-primary btn-sm" id="themeBtn">Save</button>
                <?php $__errorArgs = ['theme'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger d-block mt-2"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php if(session()->has('error')): ?>
                    <span class="text-danger d-block mt-2"><?php echo e(session('error')); ?></span>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <div class="mt-2 d-none" id="loadingTheme">
        <progress max="100"></progress>
        <p>Please wait while the theme is being uploaded, do not refresh this...</p>
    </div>
</div>
 <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.theme-display', [])->html();
} elseif ($_instance->childHasBeenRendered('PO532D9')) {
    $componentId = $_instance->getRenderedChildComponentId('PO532D9');
    $componentTag = $_instance->getRenderedChildComponentTagName('PO532D9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PO532D9');
} else {
    $response = \Livewire\Livewire::mount('admin.theme-display', []);
    $html = $response->html();
    $_instance->logRenderedChild('PO532D9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH /home/admin/web/primeimperialtrade.live/public_html/resources/views/admin/Settings/AppSettings/theme.blade.php ENDPATH**/ ?>