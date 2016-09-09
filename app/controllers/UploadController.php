<?php

/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 6/2/2016
 * Time: 12:24 PM
 */
class UploadController extends BaseController
{
    function __construct()
    {

    }

    public function upload() {
        return View::make('homeold.upload');
    }

    public function handle() {

        //return $this->save(Input::file('image'));

        return Input::file('image')->getMimeType();
    }

    private function save($image) {

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=laraveltest;", 'root','');

        } catch(PDOException $ex) {
            return $ex->getMessage();
        }

        if($pdo) {
            $blob = fopen($image->getRealPath(), 'rb');

            $date = new DateTime();
            $now = $date->format('U = Y-m-d H:i:s');

            $sql = "INSERT INTO image_upload(name,image,created_at, updated_at) VALUES(:a ,:b, :c ,:d )";

            $smt = $pdo->prepare($sql);

            $smt->bindParam(':a', $image->getMimeType());
            $smt->bindParam(':b', $blob, PDO::PARAM_LOB);
            $smt->bindParam(':c', $now);
            $smt->bindParam(':d', $now);

            $smt->execute();

            return "Image uploaded";
        }
    }
}