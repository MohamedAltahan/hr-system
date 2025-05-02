<?php

namespace Modules\Common\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait UploadFile
{
    public function uploadFile(string $inputName, string $folderName, string $diskName = 'public', int $imageHeight = 1080)
    {
        if ($file = request()->file($inputName)) {
            if (str_starts_with($file->getMimeType(), 'image/')) {

                $filename = Str::random(12).'.'.$file->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/'.$folderName);
                $manager = new ImageManager(new Driver);
                $image = $manager->read($file->getPathname());
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $image->scaleDown(null, $imageHeight, function ($constraint) {
                    // $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->save($destinationPath.'/'.$filename);

                return $folderName.'/'.$filename;
            } else {

                $path = $file->store($folderName, ['disk' => $diskName]);

                return $path;
            }
        }
    }

    public function fileUpdate(string $inputName, string $folderName, string $diskName = 'public', ?string $oldFileName = null, int $imageHeight = 1080)
    {
        $path = $this->uploadFile($inputName, $folderName, $diskName, $imageHeight);

        // delete the old file from storage
        if (($oldFileName != null) && (Storage::disk($diskName)->exists($oldFileName))) {
            Storage::disk($diskName)->delete($oldFileName);
        }

        return $path;
    }

    public function deleteFile(string $fileName, string $diskName = 'public')
    {
        if ($fileName == null) {
            return;
        }
        // delete the old file from storage
        if ($fileName != null && Storage::disk($diskName)->exists($fileName)) {
            Storage::disk($diskName)->delete($fileName);
        }
    }

    public function uploadFiles(Request $request, string $folderName, string $inputName, string $diskName = 'public')
    {
        $files = $request->file($inputName);
        foreach ($files as $file) {
            $path[] = $file->store($folderName, ['disk' => $diskName]);
        }

        return $path;
    }
}
