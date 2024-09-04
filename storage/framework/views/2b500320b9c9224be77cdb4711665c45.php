    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/steps.css">

    </head>
    <div class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="w-5/6">
                    <form action="<?php echo e(route('acceptterms')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if($errors->any()): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline">There were some errors with your submission:</span>
                                <ul class="mt-3 list-disc list-inside text-sm">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <br>
                        <?php endif; ?>
                        <div class="bg-white shadow-md rounded-lg">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold mb-2">Certification/Authorization</h3>
                                <!-- Adjusted text size to text-2xl -->
                                <span class="text-xl font-semibold">Step 9:</span>
                                <!-- Added Step 1 on the hard right -->
                                <?php echo e(__("You're logged in!")); ?>

                                <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                                    <label for="acceptTerms" class="flex items-center text-justify">
                                        <input type="checkbox" id="acceptTerms" name="acceptTerms" class="mr-4"
                                            <?php echo e(old('acceptTerms', isset($formData9['acceptTerms']) ? $formData9['acceptTerms'] : false) ? 'checked' : ''); ?>>
                                        This is to certify that all data/information that I have
                                        provided in this form are true to the best of my knowledge. This
                                        is also to authorize PDAD Mandaluyong to include my profile in
                                        the Employment Information System and use my personal
                                        information for employment facilitation.
                                    </label>
                                </div>
                                <div class="mt-4 text-right">
                                    <a href="<?php echo e(route('otherskills')); ?>"
                                        class="inline-block py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">Previous</a>

                                    <button type="submit"
                                        class="inline-block py-2 px-4 bg-green-600 text-white rounded-md shadow-md hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Submit</button>
                                </div>
                            </div>
                        </div>
<?php /**PATH C:\xampp\htdocs\finalproj\resources\views\steps\step9.blade.php ENDPATH**/ ?>