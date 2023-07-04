<?php
class SomeFunctionDB
{

    public function recursive_dir($dir) {
        foreach(scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) $this->recursive_dir("$dir/$file");
            else unlink("$dir/$file");
        }
        rmdir($dir);
    }

    public function handleFileUpload() {
        $myMsg = "";
        if(isset($_FILES["files"]["name"])) {
            $filename = $_FILES["files"]["name"];
            $source = $_FILES["files"]["tmp_name"];
            $type = $_FILES["files"]["type"];

            $accepted_types = [
                'application/zip',
                'application/x-zip-compressed',
                'multipart/x-zip',
                'application/x-compressed',
                'application/x-rar-compressed'
            ];

            foreach($accepted_types as $mime_type) {
                if($mime_type == $type) {
                    break;
                }
            }

            /* PHP current path */
            $path = dirname(dirname(dirname(__FILE__))).'/';
            $filenoext = basename($filename, '.zip');
            $filenoext = basename($filenoext, '.ZIP');

            $myDir = $path . $filenoext; // target directory
            $myFile = $path . $filename; // đường dẫn mở file zip

            if (is_dir($myDir)) $this->recursive_dir($myDir);
            mkdir($myDir, 0777);

            if(move_uploaded_file($source, $myFile)) {
                $zip = new ZipArchive();
                $extractZip = $zip->open($myFile); // giải nén file zip
                if ($extractZip === true) {
                    /*$zip->extractTo($myDir);*/ // chuyển các file giải nén vào folder cùng tên
                    $zip->extractTo($path); // giải nén và chuyển và đường dẫn $path vào folder Modules
                    $zip->close();
                    unlink($myFile);
                }
            }
        }
        return $myMsg;
    }

    static function deletePlugin($folderPath)
    {
        $files = array_diff(scandir($folderPath), array('.', '..'));

        foreach ($files as $file) {
            $filePath = "$folderPath/$file";
            if (is_dir($filePath)) {
                self::deletePlugin($filePath);
            } else {
                unlink($filePath);
            }
        }
        return rmdir($folderPath);
    }
}



