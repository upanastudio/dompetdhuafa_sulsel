<?php

namespace App\Helpers;

if (!function_exists('upload_image')) {
    function upload_image($uploaded, $folder)
    {
        $request = \Config\Services::request();
        $image = \Config\Services::image();

        $files = $request->getFiles();

        foreach ($files[$uploaded] as $file) {
            if (!$file->isValid()) {
                return ['success' => false, 'message' => 'File tidak valid!'];
            } else {
                $allowedExt     = ['jpg', 'png'];
                $uploadPath     = WRITEPATH . 'uploads/' . $folder;
                $size           = $file->getSizeByUnit('mb');
                $ext            = $file->guessExtension();
                $newName        = $file->getRandomName();

                if ($size > 2) {
                    return ['success' => false, 'message' => 'Image terlalu besar. Max 2 MB.'];
                }

                if (!in_array($ext, $allowedExt)) {
                    return ['success' => false, 'message' => 'File yang diperbolehkan hanya JPG dan PNG.'];
                }

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, TRUE);
                }

                $upload = $file->move($uploadPath, $newName);
                if ($upload) {
                    # image processing
                    $image->withFile($uploadPath . '/' . $newName)
                        ->resize(500, 500, true, 'height')
                        ->save($uploadPath . '/' . $newName, 60);
                }
                $uploadedFiles[] = $newName;
            }
        }
        return ['success' => true, 'message' => $uploadedFiles];
    }
}
