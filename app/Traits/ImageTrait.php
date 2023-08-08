<?php

namespace App\Traits;

trait ImageTrait
{
    protected function saveImage($photo, $folder)
    {
            // $path = $photo->store($folder, [
            //     'disk' => 'public',
            // ]);
            // return $data['image'] = $path;
            
        // $file_extension =  $photo->getclientoriginalExtension().  $photo->getclientoriginalName();
        // $file_name = time() . '_' . $file_extension;
        $file_extension =  $photo->getclientoriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = $folder;
        $photo->move($path, $file_name);
        return $file_name;
    }
}
