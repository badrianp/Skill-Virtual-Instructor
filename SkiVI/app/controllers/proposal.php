<?php

include_once "../app/models/auth.utils.php";

class Proposal extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        if (get__logged__user() != null)
            $this->view('proposal/index__proposal', ['syntax' => $to__root, 'params' => $data]);
        else
            $this->view('errors/first__login', ['syntax' => $to__root, 'params' => $data]);
    }

    public function send_proposal_mail()
    {
        if(isset($_POST['submit']))
        {
            $uploadStatus = 1;
            $name = "Bob"; // inlocuit cu numele utilizatorului
            $subject = "Proposal from " . $name;
            $author = $email = $type = $proposal_name = $label = $description = "";
            if(isset($_POST["author_name"]))
            {
                $author = "Author: " . $_POST["author_name"] . "\n";
            }
            if(isset($_POST["author_email"]))
            {
                $email = "Author's email: " . $_POST["author_email"] . "\n";
            }
            if(isset($_POST["type"]))
            {
                $type = "Proposal's type:" . $_POST["type"] . "\n";
            }
            if(isset($_POST["proposal_name"]))
            {
                $proposal_name = "Proposal's name: " . $_POST["proposal_name"] . "\n";
                $subject .= " - " . $proposal_name;
            }
            if(isset($_POST["labels"]))
            {
                $labels = "Proposal's suggested labels: " . $_POST["labels"] . "\n";
            }
            if(isset($_POST["description"]))
            {
                $description = "Proposal's description: " . $_POST["description"] . "\n";
            }
            if(!empty($_FILES["splash_art"]["name"]))
            {
                $targetDir = "C:/Users/40787/Desktop/TW/New folder/SkiVI/public/uploads/";
                $fileName = basename($_FILES["splash_art"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                if(move_uploaded_file($_FILES["splash_art"]["tmp_name"],$targetFilePath))
                {
                    $uploadedSplashArt = $targetFilePath;
                }
                else
                {
                    $uploadStatus = 0;
                }
            }
            if(!empty($_FILES["annex"]["name"]))
            {
                $targetDir = "C:/Users/40787/Desktop/TW/New folder/SkiVI/public/uploads/";
                $fileName = basename($_FILES["annex"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                if(move_uploaded_file($_FILES["annex"]["tmp_name"],$targetFilePath))
                {
                    $uploadedAnnex = $targetFilePath;
                }
                else
                {
                    $uploadStatus = 0;
                }
            }
            if($uploadStatus == 1)
            {
                $to = "skivibagrd@gmail.com";
                $from = "gheorghitard@gmail.com"; // inlocuit cu adresa email a utilizatorului logat
                $message = $author . $email . $type . $proposal_name . $description . $labels;
                $headers = "From: $name" . " <" . $from . ">";
                if(!empty($uploadedSplashArt) && !empty($uploadedAnnex) && file_exists($uploadedSplashArt) && file_exists($uploadedAnnex))
                {
                    $semi_rand = md5(time());
                    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
                    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
                    $body = "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"UTF-8\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
                    if(is_file($uploadedSplashArt))
                    {
                        $body .= "--{$mime_boundary}\n";
                        $fp = @fopen($uploadedSplashArt, "rb");
                        $data = @fread($fp, filesize($uploadedSplashArt));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $body .= "Content-Type : application/octet-stream; name=\"" . basename($uploadedSplashArt)."\"\n" .
                        "Content-Description: " . basename($uploadedSplashArt) . "\n" .
                        "Content-Disposition: attachment;\n" . " filename =\"" . basename($uploadedSplashArt) . "\"; size=" . filesize($uploadedSplashArt) . ";\n" . 
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }
                    if(is_file($uploadedAnnex))
                    {
                        $body .= "--{$mime_boundary}\n";
                        $fp = @fopen($uploadedAnnex, "rb");
                        $data = @fread($fp, filesize($uploadedAnnex));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $body .= "Content-Type : application/octet-stream; name=\"" . basename($uploadedAnnex)."\"\n" .
                        "Content-Description: " . basename($uploadedAnnex) . "\n" .
                        "Content-Disposition: attachment;\n" . " filename =\"" . basename($uploadedAnnex) . "\"; size=" . filesize($uploadedSplashArt) . ";\n" . 
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }

                    $body .= "--{mime_boundary}--";
                    mail($to,$subject,$body,$headers);
                    header("Location: ../proposal/proposal_thanks");
                    @unlink($uploadedSplashArt);
                    @unlink($uploadedAnnex);
                }
                else
                {
                   header("Location: ../proposal/failedlocate");
                }
            }
            else
            {
                header("Location: ../proposal/failedupload");
            }
            
        }
    }

    function proposal_thanks($data)
    {
        $to__root = $data[0];
        unset($data[0]);
        $this->view('proposal/proposal__thanks', ['syntax' => $to__root]);
    }

    function failedupload($data)
    {
        $to__root = $data[0];
        unset($data[0]);
        $this->view('proposal/proposal__failed__upload', ['syntax' => $to__root]);
    }

    function failedlocate($data)
    {
        $to__root = $data[0];
        unset($data[0]);
        $this->view('proposal/proposal__failed__locate', ['syntax' => $to__root]);
    }
}
