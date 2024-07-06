<?php
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Helpers\FileHelper;

if (!function_exists('handleFileUpload')) {
    /**
     * Handle file upload and store file path.
     *
     * @param UploadedFile $file
     * @param string $oldFilePath
     * @return string|null
     */
    function handleFileUpload(UploadedFile $file, ?string $oldFilePath = null): ?string
    {
        if ($file->isValid()) {
            $path = $file->store('uploads', 'public');
            FileHelper::storeFilePath($path); // Store file path in FileHelper
            return $path;
        } else {
            return $oldFilePath;
        }
    }
}

?>