<!-- resources/views/components/work-experience-row.blade.php -->
<tr class="hover:bg-gray-100 dark:hover:bg-gray-300 dark:hover:text-gray-900">
    <td class="border-b border-gray-300 py-2 px-3">
        <form action="<?php echo e(route('workexp.destroy', $workExperience->id)); ?>" method="POST" style="display: inline;">
            <?php echo method_field('delete'); ?>
            <?php echo e(csrf_field()); ?>

            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                <?php echo e(__('messages.workexperience.delete')); ?>

            </button>
        </form>
    </td>
    <td class="border-b border-gray-300 py-2 px-3"><?php echo e($workExperience->employer_name); ?></td>
    <td class="border-b border-gray-300 py-2 px-3"><?php echo e($workExperience->employer_address); ?></td>
    <td class="border-b border-gray-300 py-2 px-3"><?php echo e($workExperience->position_held); ?></td>
    <td class="border-b border-gray-300 py-2 px-3"><?php echo e($workExperience->skills); ?></td>
    <td class="border-b border-gray-300 py-2 px-3"><?php echo e($workExperience->employment_status); ?></td>
    <td class="border-b border-gray-300 py-2 px-3"><?php echo e($workExperience->from_date); ?></td>
    <td class="border-b border-gray-300 py-2 px-3"><?php echo e($workExperience->to_date); ?></td>
</tr>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\components\work-experience-row.blade.php ENDPATH**/ ?>