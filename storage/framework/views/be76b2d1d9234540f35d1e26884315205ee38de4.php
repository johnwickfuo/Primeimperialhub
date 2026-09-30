<?php $__env->startSection('title', 'Notification Details'); ?>

<?php
    // Helper function to safely get user name
    function safeGetUserName($user) {
        if (!$user) {
            return 'N/A';
        }

        if(is_object($user)) {
            return $user->name;
        } elseif(is_numeric($user)) {
            $userObj = \App\Models\User::find($user);
            return $userObj ? $userObj->name : 'User #' . $user;
        }

        return 'N/A';
    }
?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-4">
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">Notification Details</h1>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?php echo e($notification->title); ?></h5>
                <span class="badge badge-<?php echo e($notification->type === 'warning' ? 'warning' : ($notification->type === 'success' ? 'success' : ($notification->type === 'danger' ? 'danger' : 'info'))); ?>">
                    <?php echo e(ucfirst($notification->type)); ?>

                </span>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>User:</strong>
                                <?php
                                    $userId = null;
                                    $userName = 'N/A';

                                    if($notification->user) {
                                        if(is_object($notification->user)) {
                                            $userId = $notification->user->id;
                                            $userName = $notification->user->name;
                                        } elseif(is_numeric($notification->user)) {
                                            $userId = $notification->user;
                                            $userObj = \App\Models\User::find($userId);
                                            $userName = $userObj ? $userObj->name : 'User #' . $userId;
                                        }
                                    }
                                ?>

                                <?php if($userId): ?>
                                    <a href="<?php echo e(route('admin.users.show', $userId)); ?>"><?php echo e($userName); ?></a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Message:</strong></p>
                            <div class="p-3 bg-light rounded">
                                <?php echo e($notification->message); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Date:</strong> <?php echo e($notification->created_at->format('F d, Y h:i A')); ?></p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <p><strong>Status:</strong> <?php echo e($notification->is_read ? 'Read' : 'Unread'); ?></p>
                    </div>
                </div>

                <?php if($notification->source_id && $notification->source_type): ?>
                    <hr>
                    <div class="mt-3">
                        <h6>Related Information</h6>
                        <?php
                            $sourceModel = null;
                            try {
                                if (class_exists($notification->source_type)) {
                                    $sourceModel = $notification->source_type::find($notification->source_id);
                                }
                            } catch (\Exception $e) {
                                // Model not found or error
                            }
                        ?>

                        <?php if($sourceModel): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <?php if($notification->source_type == 'App\\Models\\Deposit'): ?>
                                            <tr>
                                                <th>User</th>
                                                <td><?php echo e(safeGetUserName($sourceModel->user)); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td><?php echo e($sourceModel->amount); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?php echo e($sourceModel->status); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Payment Mode</th>
                                                <td><?php echo e($sourceModel->payment_mode); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Action</th>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-primary">View Deposit</a>
                                                </td>
                                            </tr>
                                        <?php elseif($notification->source_type == 'App\\Models\\Withdrawal'): ?>
                                            <tr>
                                                <th>User</th>
                                                <td><?php echo e(safeGetUserName($sourceModel->user)); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td><?php echo e($sourceModel->amount); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?php echo e($sourceModel->status); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Payment Mode</th>
                                                <td><?php echo e($sourceModel->payment_mode); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Action</th>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-primary">View Withdrawal</a>
                                                </td>
                                            </tr>
                                        <?php elseif($notification->source_type == 'App\\Models\\User_plans'): ?>
                                            <tr>
                                                <th>User</th>
                                                <td><?php echo e(safeGetUserName($sourceModel->user)); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td><?php echo e($sourceModel->amount); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?php echo e($sourceModel->active ? 'Active' : 'Inactive'); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Asset</th>
                                                <td><?php echo e($sourceModel->assets); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Action</th>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-primary">View Plan</a>
                                                </td>
                                            </tr>
                                        <?php elseif($notification->source_type == 'App\\Models\\UserBotInvestment'): ?>
                                            <tr>
                                                <th>User</th>
                                                <td><?php echo e(safeGetUserName($sourceModel->user)); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td><?php echo e($sourceModel->investment_amount); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?php echo e($sourceModel->status); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Current Balance</th>
                                                <td><?php echo e($sourceModel->current_balance); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Action</th>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-primary">View Bot Investment</a>
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="2">No detailed information available.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>No related information available.</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="mt-4">
                    <a href="<?php echo e(route('admin.notifications')); ?>" class="btn btn-secondary">Back to Notifications</a>

                    <form action="<?php echo e(route('admin.notifications.delete')); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="hidden" name="notification_id" value="<?php echo e($notification->id); ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this notification?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/web/primeimperialtrade.live/public_html/resources/views/admin/notifications/show.blade.php ENDPATH**/ ?>