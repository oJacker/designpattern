<?php

/**
 * 创建文件类
 * @author SINCE
 *
 */
abstract class File{
    
    
    abstract function getSize();
}

// class TextFile extends File{
    
//     public function getSize(){
//         return 2;
//     }
// }

// class ImageFile extends File{
    
//     public function getSize(){
        
//         return 100;
//     }
// }


/**
 * 创建目录类
 * @author SINCE
 *
 */
/*class Dir{
    private $files =[];
    
    public function addFile(File $file){
        $this->files[] =$file;
    }
    
    public function getSize(){
        
        $size =0;
        foreach ($this->files as $file) {
            $size += $file->getSize();
        }
        
        return $size;
    }

}

class NewDir{
    private $files = [];
    private $dirs = [];
    
    public function  addFile(File $file){
        
        $this->files[] = $file;
    }
    
    public function addDir(NewDir $newDir){
        $this->dirs =$newDir;
    }
    
    public function getSize(){
        
        $size = 0;
        foreach ($this->files as $file) {
            $size += $file->getSize();
        }
        
        foreach ($this->dirs as $dir) {
            $size += $dir->getSize();
        }
        
        return $size;
    }
}*/

abstract class Filesystem{
    protected $name;
    
    public function __construct($name){
        
        $this->name =$name;
    }
    
    public abstract function getName();
    public abstract function getSize();
    
}


class Dir extends Filesystem{
    
    private $filesystems = [];
    
    // 组合对象必须实现添加方法。因为传入参数规定为Filesystem类型，
    // 所以目录和文件都能添加
    public function add(Filesystem $filesystem) {
        $key = array_search($filesystem,$this->filesystems);
        
        if($key === false){
            
            $this->filesystems[] = $filesystem;
        }
    }
    
    /**
     * 组合对象必须实现移除方法
     * @param Filesystem $filesystem
     */
    public function remove(Filesystem $filesystem){
        $key =array_search($filesystem, $this->filesystems);
        if($key !==false){
            
            unset($this->filesystems[$key]);
        }
    }
    
    public function getName(){
        return '目录'. $this->name;
    }
    
    public function getSize(){
        $size =0 ;
        
        foreach ($this->filesystems as $filesystem){
            $size += $filesystem->getSize();
        }
        return $size;
    }
     
}

/**
 * 独立对象：文本文件类
 * @author SINCE
 *
 */
class TextFile extends Filesystem{
    
    public function getName(){
        return '文本文件'.$this->name;
    }
    
    public function getSize(){
        
        return 10;
    }
}


class ImageFile extends Filesystem{
    
    public function getName(){
        return '图片:' . $this->name;
    }
    
    public function getSize(){
        return 100;
    }
    
}

class VideoFile extends Filesystem{
    
    public function getName(){
        return '视频:'.$this->name;
    }
    public function getSize(){
        
        return 200;
    }
    
}


