<?php 
include '../dbconn.php';
session_start();
$id_user = $_POST['id_user'];
$status = '1';




$sql = ('UPDATE instashop SET status = :status, date_submit = now() WHERE id_user = :id_user');
$stmt = $con->prepare($sql);
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);



$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
    echo 'asd';
}



//upload
if(isset($_POST['btn_submit'])){

    /*$sqlst = ('UPDATE instashop SET status = :status WHERE id_user = :id_user');
    $stmt = $con->prepare($sqlst);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':status', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    $num = $stmt->rowCount();
    if($num){
        echo 'success';
    }
    else{
        echo "error";
    }*/
    $documentType = 'SSM Document';



            /**$resultAI = mysqli_query($mysqli_conn,"SHOW TABLE STATUS LIKE 'banner'");
            $dataAI = mysqli_fetch_assoc($resultAI);
            $next_increment = $dataAI['Auto_increment'];*/

            $resultAI=$con->prepare("SHOW TABLE STATUS LIKE 'document'");
            $resultAI->execute();
            $dataAI=$resultAI->fetch(PDO::FETCH_ASSOC);
            $next_increment= $dataAI['Auto_increment'];
            
            date_default_timezone_set("Asia/Kuala_Lumpur"); 
            $productimagename=$next_increment."_".date('dmyHis');
            $location_file = $_FILES['ssmdocument']['tmp_name'];
            $type_file   = $_FILES['ssmdocument']['type'];
            $name_file   = $_FILES["ssmdocument"]["name"];
            $extension=pathInfo($name_file, PATHINFO_EXTENSION);
            $newfilename=$productimagename .".".$extension;

            $directory   = "/document/$newfilename";
            $file_type = $_FILES['ssmdocument']['type'];
            $allowed = array('.doc'=>'application/msword',
                '.docx'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                '.rtf'=>'application/rtf',
                '.pdf'=>'application/pdf');
            
           /* echo $newfilename;
           exit();*/
           if(in_array($file_type, $allowed)) 
            {//File is image

                //if($_FILES['photo']['size'] < (1000000))
                //{ //can't be larger than 1 MB
                $image_info = getimagesize($_FILES["ssmdocument"]["tmp_name"]);
                $image_width = $image_info[0];
                $image_height = $image_info[1];

                if(empty($subtitle)){
                    $subtitle=NULL;
                }

                        //move it to where we want it to be
                $root = getcwd();
                echo realpath($root.$directory);
                move_uploaded_file($location_file, $root.$directory); 

                        //DELETE OLD IMAGE FROM SERVER
                /**/

                        //put to database
                        /**$qInsert="INSERT INTO `banner` 
                                (`filename` ,`sub_title`)
                        VALUES ('$newfilename','$subtitle');";
                        mysqli_select_db($mysqli_conn,$db_name);
                        $rInsert=mysqli_query($mysqli_conn,$qInsert)or die(mysqli_error());*/

                        $sInsert=$con->prepare("INSERT INTO `document`(`id_user`,`document_type`,`document`,`date_upload`) 
                                                    VALUES (:id_user,:document_type,:filename,now())");
                        $sInsert->bindParam(':id_user',$id_user);
                        $sInsert->bindParam(':document_type',$documentType);
                        $sInsert->bindParam(':filename',$newfilename);
                        $sInsert->execute();    
                        $row2 = $sInsert->rowCount();
                        if ($row2) {
                         header('location:../instashop/submitstatus.php?stats=1');
                     }
                     else{
                        echo $id_user;
                        echo $newfilename;
                        echo $documentType;
                    }

                /*else
                {
                    //Image size is large than requirement
                    echo "<script>sweetAlert('Image to large', 'Please upload size under 1MB','error');</script>";
                }*/
                
            }
            else
            {
                //File is not image
                echo "<script>sweetAlert('File invalid', 'Files should be .Docx or .Pdf or .Rtf or .Doc.','error');</script>";
            }

        }

