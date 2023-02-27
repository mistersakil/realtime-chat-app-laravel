<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class ImageService
{
    /**
     * Upload images
     * @param array $options
     * @return mixed [boolean|string]
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    public function upload(array $options)
    {
        ## Destructure options array
        ['srcFile' => $srcFile, 'fileType' => $fileType, 'filePath' => $filePath, 'dimension' => $dimension, 'quality' => $quality] = $options;

        ## Get file name
        $fileName = $this->getFileName($fileType);

        ## Get upload path
        $filePath = $this->getFilePath($filePath, $fileName);

        ## Move uploaded file to destination folder
        $result = Image::make($srcFile)
            ->fit(...$dimension)
            ->save($filePath, $quality, $fileType);

        return $result ? ['fileName' => $fileName, 'status' => true] : ['status' => false, 'fileName' => ''];
    }

    /**
     * Get image customize file name
     * @param object $srcFile
     * @param string $fileType
     * @return string $fileName
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */

    private function getFileName($fileType)
    {
        $fileName = Str::uuid() . '_' . date('Ymd_his') . '.' . $fileType;
        return $fileName;
    }


    /**
     * Get image upload path
     * @param string $filePath
     * @param string $fileName
     * @return string $filePath
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */

    private function getFilePath($filePath, $fileName)
    {
        $filePath = _os_relevant_file_upload_path(resource_path($filePath));
        if (!File::ensureDirectoryExists($filePath)) {
            File::makeDirectory($filePath, 0755, true, true);
        }
        $filePath = "{$filePath}/{$fileName}";
        return $filePath;
    }


    /**
     * Delete records from database
     * @param object $model
     * @param string $filePath
     * @return null
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */

    public function delete($model, $filePath)
    {
        if ($model->image) {
            $model->image()->delete();
            $this->unlink($filePath, $model->image->fileName);
        }
    }


    /**
     * Unlink image from storage
     * @param string $filePath
     * @param string $fileName
     * @return boolean true|false
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */

    public function unlink($filePath, $fileName)
    {
        $filePath = _os_relevant_file_upload_path(resource_path($filePath)) . '/' . $fileName;

        if (File::isFile($filePath)) {
            File::delete($filePath);
            return true;
        }
        return false;
    }

    /**
     * getAvatar method return real image path from storage
     * @param string $filePath
     * @param object $model
     * @return string $avatarPath
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */

    public function getAvatar($filePath, $model)
    {
        $avatarPath = "resources/images/avatar.png";
        if ($model->image) {
            $fileAbsolutePath = _os_relevant_file_upload_path(resource_path($filePath)) . '/' . $model->image->fileName;

            if (File::isFile($fileAbsolutePath)) {
                $avatarPath = "resources/{$filePath}/{$model->image->fileName}";
            }
        }
        return $avatarPath;
    }
}
