<?php

namespace App;
use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos'; //to override the table name which is 'flyer_photos'

    protected $fillable = ['path', 'name', 'thumbnail_path'];

    protected $baseDir = 'flyers/photos';

    public function flyer() {
    	return $this->belongsTo('App\Flyer');
    }

    // public static function fromForm(UploadedFile $file) {
    // 	$photo = new static;
    // 	$name = time() . $file->getClientOriginalName();
    // 	$photo->path = $photo->baseDir . '/' . $name;
    // 	$file->move($photo->baseDir, $name);
    // 	return $photo;
    // }

    public static function named($name) {
        return (new static)->saveAs($name);
    }

    public function saveAs($name) {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);
        return $this;
    }

    public function move(UploadedFile $file) {
        $file->move($this->baseDir, $this->name);
        Image::make($this->path)
                ->fit(200)
                ->save($this->thumbnail_path);
        return $this;
    }
}
