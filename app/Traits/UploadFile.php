<?php
namespace App\Traits;
trait UploadFile{ 
    private $file;
    public function uploadFile($file,$filePath){
        $this->file = $file;
        $file_name= $this->file->getClientOriginalName();
        $file = htmlentities($file_name);
        $file = preg_replace('/\&(.)[^;]*;/', '\\1', $file);
        $file_name = preg_replace('([^A-Za-z0-9. ])', '', $file);           
        $file_name = time().'_'.md5($file_name).'.'.$this->file->extension();
        $file_route = $filePath.'/'.$file_name;     
        $size = $this->file->getSize();   

        \Storage::disk($this->disk)->put($file_route, file_get_contents($this->file->getRealPath() ) );
        $complet_path = \Storage::disk($this->disk)->url($file_route);

        $file = new \App\Models\File();
        $file->original_name = $this->file->getClientOriginalName();   
        $file->encrypt_name = $file_name;  
        $file->path = $complet_path; 
        $file->size = $size;             
        $file->save();

        return $file;
    }

    public function setDisk($disk){
        $this->disk = $disk;
        return $this;
    }

    public function imageDecode($file){
        //$this->disk = $disk;
        $this->file = base64_decode($file);
        return $this;
    }

}
