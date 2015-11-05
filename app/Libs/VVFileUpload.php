<?php

namespace App\Libs;
class VVFileUpload{
    private   $max_file_size;
    private   $max_file_uploads;
    private   $destination;
    private   $bad_files      = ['.bin', '.cgi', '.exe', '.js', '.pl', '.php', '.py', '.sh'];
    private   $allowed_files  = [];
    private   $uploaded_files = [];
    private   $errors;
    protected $default_max_file_size;
    protected $default_max_file_uploads;

    public  function __construct()
    {
        $this->default_max_file_size    = $this->convertToBytes(ini_get('upload_max_filesize'));
        $this->default_max_file_uploads = ini_get('max_file_uploads');

        $this->max_file_size            = $this->default_max_file_size;
        $this->max_file_uploads         = $this->default_max_file_uploads;
        $this->setDestination(dirname(__FILE__));
    }

    public function setAllowedFiles($allowed_arr)
    {
        $this->allowed_files = $allowed_arr;
    }

    public function setBadFiles($bad_arr)
    {
        $this->bad_files = $bad_arr;
    }

    public function setDestination($path)
    {
        $this->destination = rtrim($path,'/').'/';
    }

    public function setMaxFileSize($size)
    {
        $this->max_file_size = $this->convertToBytes($size);
        if($this->max_file_size > $this->default_max_file_size){
            $this->errors[] = ' Max file size can\'t be greater than '.$this->convertFromBytes($this->default_max_file_size);
            $this->max_file_size = $this->default_max_file_size;
        }

    }

    public function setMaxfileUploads($limit)
    {
        $this->max_file_uploads = intval($limit);
        if($this->max_file_uploads > $this->default_max_file_uploads){
            $this->errors[] = ' Max file uploads can\'t be greater than '.$this->default_max_file_uploads;
            $this->max_file_uploads = $this->default_max_file_uploads;
        }

    }

    public function getErrors(){
        return $this->errors;
    }

    public function showErrors(){
      return implode('<br>',$this->errors);
    }




    public function upload()
    {
        if($this->checkDestination()){
            foreach($_FILES as $files){

                if(!is_array($files['name'])){   // make  pretty
                    $arr['name'][] = $files['name'];
                    $arr['type'][] = $files['type'];
                    $arr['tmp_name'][] = $files['tmp_name'];
                    $arr[] = $files;
                    $arr['size'][] = $files['size'];
                    $files = $arr;
                }

                $count = count($files['name']);
                if(!$this->checkMaxFileUploads($count)) break;


                for ($i = 0; $i < $count; $i++) {
                    $temp_name   = $files['tmp_name'][$i];
                    $file_name   =  $this->translit($files['name'][$i]);
                    $file_size   = $files['size'][$i];
                    $file_ext    = strtolower(strrchr($file_name, "."));
                    if(empty($file_name)) break;

                    $result = true;

                    if(!$this->checkMaxFileSize($file_name,$file_size))       $result = false;
                    if(!$this->checkBadFile($file_name,$file_ext))     $result = false;
                    if(!$this->checkAllowedFile($file_name,$file_ext)) $result = false;

                    if($result){
                       $file_name = uniqid().$i.rand(1,9).$file_ext;
                       move_uploaded_file($temp_name, $this->destination.$file_name);

                       $this->uploaded_files['file_name'][]     = $file_name;
                       $this->uploaded_files['absolute_path'][] = $this->destination.$file_name;
                     }

                }
            }
            return $this->uploaded_files;
        }
    }

    public static function htmlFileField($name, $multiple=false, $attributes=[])
    {
        if($multiple) $multiple = ' multiple="multiple" ';
        $html  = '<input type="file" name="'.$name.'[]"'.$multiple.self::genHtmlAttributes($attributes).'/>'."\r\n";
         return $html;
    }

    private function checkMaxFileSize($file_name, $file_size)
    {
        if($file_size > $this->max_file_size){
            $this->errors[] = $file_name.' - bad file size! Max allowed:'.$this->convertFromBytes($this->max_file_size);
              return false;
        }
        return true;
    }

    private function checkMaxFileUploads($files_count)
    {
        if($files_count > $this->max_file_uploads){
            $this->errors[] = 'To many files. Allowed:'.$this->max_file_uploads;
            return false;
        }
        return true;
    }

    private function checkBadFile($file_name, $file_ext)
    {
        if(!empty($this->bad_files)){
            if(in_array($file_ext, $this->bad_files)){
                $this->errors[] = $file_name.' - bad file type!';
                  return false;
            }
        }
        return true;
    }

    private function checkAllowedFile($file_name, $file_ext)
    {
        if(!empty($this->allowed_files)){
            if(!in_array($file_ext, $this->allowed_files)){
                $this->errors[] = $file_name.' - file type is not allowed!';
                return false;
            }
        }
        return true;
    }

    private function checkDestination()
    {
        if (!is_dir($this->destination)){
            $this->errors[] = 'Invalid destination path';
            return false;
        }

        if (!is_writable($this->destination)) {
            $this->errors[] = 'Upload folder must be writable';
            return false;
         }
         return true;
    }

    private function convertToBytes($val)
    {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        if (in_array($last, array('g', 'm', 'k'))){
            switch ($last) {
                case 'g':
                    $val *= 1024;
                case 'm':
                    $val *= 1024;
                case 'k':
                    $val *= 1024;
            }
        }
        return $val;
    }

    private function convertFromBytes($bytes)
    {
        $bytes /= 1024;
        if ($bytes > 1024) {
            return number_format($bytes/1024, 1) . ' M';
        } else {
            return number_format($bytes, 1) . ' K';
        }
    }

    private static function genHtmlAttributes($attributes)
    {
        $str ='';
        foreach($attributes as $key=>$value){
            $str .= $key.'="'.$value.'" ';
        }
        return $str;
    }

    private  function translit($str)
    {
         $tr = array(
                "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
                "Д"=>"d","Е"=>"e","Ё"=>"e","Ж"=>"zh","З"=>"z","И"=>"i",
                "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
                "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
                "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
                "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"y","Ь"=>"",
                "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
                "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"zh",
                "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
                "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
                "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
                "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"",
                "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
                " "=> "-", "?"=> "", "!"=> "",
                "("=> "", ")"=> "", "”"=> "","“"=> "",
                "\""=> "", "/"=> "-", ","=> "", ":"=> "",
                ";"=> "");

            return preg_replace("/-{2,}/","-",strtr($str,$tr));

    }
  
}