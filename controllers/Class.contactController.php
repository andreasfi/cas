<?php

/**
 * Created by PhpStorm.
 * User: andreasfi
 * Date: 27.09.16
 * Time: 14:46
 */
class contactController extends Controller
{
    function contact()
    {

    }

    function sendEmail()
    {
        //0. Get the posted data from the form
        $name = $_POST['name'];
        $from = $_POST['from'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $this->sendMail("casphphes@gmail.com", "CAS", $subject, $message, null);
    }

    function sendVideo()
    {
        //0. Create a tmp folder if not already existing

        if(!file_exists("tmp"))
        {
            mkdir("tmp", 0777, true);
        }

        $date = new DateTime();
        $filename = "video_".$date->getTimestamp().".webm";

        $file = fopen("tmp/$filename", "w");
        $blob_file = file_get_contents('php://input');
        fwrite($file, $blob_file);
        fclose($file);

        //Check the size of the video.

        //Send the video by email
        $this->sendMail("casphphes@gmail.com", "CAS", "New video", "Hello, you have a new video ! ", "tmp/$filename");

        //Delete the video

        $this->deleteFile("tmp/$filename");

    }

    private function deleteFile($filename)
    {
        if(file_exists($filename))
            unlink($filename);
    }
}