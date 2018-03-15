<?php

/**
 * �����ļ���
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
 * ����Ŀ¼��
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
    
    // ��϶������ʵ����ӷ�������Ϊ��������涨ΪFilesystem���ͣ�
    // ����Ŀ¼���ļ��������
    public function add(Filesystem $filesystem) {
        $key = array_search($filesystem,$this->filesystems);
        
        if($key === false){
            
            $this->filesystems[] = $filesystem;
        }
    }
    
    /**
     * ��϶������ʵ���Ƴ�����
     * @param Filesystem $filesystem
     */
    public function remove(Filesystem $filesystem){
        $key =array_search($filesystem, $this->filesystems);
        if($key !==false){
            
            unset($this->filesystems[$key]);
        }
    }
    
    public function getName(){
        return 'Ŀ¼'. $this->name;
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
 * ���������ı��ļ���
 * @author SINCE
 *
 */
class TextFile extends Filesystem{
    
    public function getName(){
        return '�ı��ļ�'.$this->name;
    }
    
    public function getSize(){
        
        return 10;
    }
}


class ImageFile extends Filesystem{
    
    public function getName(){
        return 'ͼƬ:' . $this->name;
    }
    
    public function getSize(){
        return 100;
    }
    
}

class VideoFile extends Filesystem{
    
    public function getName(){
        return '��Ƶ:'.$this->name;
    }
    public function getSize(){
        
        return 200;
    }
    
}


