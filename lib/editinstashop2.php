<?php 
include '../dbconn.php';
session_start();
$id_user = $_POST['id_user'];
$instagram = $_POST['instagram'];
$facebook = $_POST['facebook'];
$service_provided = $_POST['service_provided'];
$website = $_POST['website'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$ssm_no = $_POST['ssm_no'];
$company_address = $_POST['company_address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];
$year = $_POST['year'];


$sql = ('UPDATE instashop SET instagram = :instagram, facebook = :facebook, website = :website, email = :email, ssm_no = :ssm_no, company_address = :company_address, city = :city, postcode = :postcode, state = :state, year_involved = :year, phone_number = :phone_number, service_provided = :service_provided WHERE id_user = :id_user');
$stmt = $con->prepare($sql);
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt->bindParam(':instagram', $instagram, PDO::PARAM_STR);
$stmt->bindParam(':facebook', $facebook, PDO::PARAM_STR);
$stmt->bindParam(':website', $website, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':ssm_no', $ssm_no, PDO::PARAM_STR);
$stmt->bindParam(':company_address', $company_address, PDO::PARAM_STR);
$stmt->bindParam(':city', $city, PDO::PARAM_STR);
$stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
$stmt->bindParam(':state', $state, PDO::PARAM_STR);
$stmt->bindParam(':year', $year, PDO::PARAM_STR);
$stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
$stmt->bindParam(':service_provided', $service_provided, PDO::PARAM_STR);


$stmt->execute();
$num = $stmt->rowCount();
if ($num) {
    echo 'asd';
    else{
	echo $sql;//header('location:../instashop/accountsetting.php?stats=2');
}

}

//upload
if(isset($_POST['btn_submit'])){



            /**$resultAI = mysqli_query($mysqli_conn,"SHOW TABLE STATUS LIKE 'banner'");
            $dataAI = mysqli_fetch_assoc($resultAI);
            $next_increment = $dataAI['Auto_increment'];*/

            $resultAI=$con->prepare("SHOW TABLE STATUS LIKE 'instashop'");
            $resultAI->execute();
            $dataAI=$resultAI->fetch(PDO::FETCH_ASSOC);
            $next_increment= $dataAI['Auto_increment'];
            
            date_default_timezone_set("Asia/Kuala_Lumpur"); 
            $productimagename=$next_increment."_".date('dmyHis');
            $location_file = $_FILES['productimage']['tmp_name'];
            $type_file   = $_FILES['productimage']['type'];
            $name_file   = $_FILES["productimage"]["name"];
            $extension=pathInfo($name_file, PATHINFO_EXTENSION);
            $newfilename=$productimagename .".".$extension;

            $directory   = "/img/$newfilename";
            $file_type = $_FILES['productimage']['type'];
            $allowed = array("image/jpeg", "image/gif", "image/png", "image/jpg");
            
           /* echo $newfilename;
           exit();*/
           if(in_array($file_type, $allowed)) 
            {//File is image

                //if($_FILES['photo']['size'] < (1000000))
                //{ //can't be larger than 1 MB
                $image_info = getimagesize($_FILES["productimage"]["tmp_name"]);
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

                        $sInsert=$con->prepare("UPDATE instashop SET profile_picture = ? WHERE id_user = ?");
                        $sInsert->bindParam(1,$newfilename);
                        $sInsert->bindParam(2,$id_user);
                        $sInsert->execute();    
                        $row2 = $sInsert->rowCount();
                        if ($row2) {
                         header('location:../instashop/accountsetting.php?stats=1');
                     }
                     else{
                        echo "error";
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
                echo "<script>sweetAlert('File invalid', 'Please upload images file only.','error');</script>";
            }

        }




<?php 
include '../dbconn.php';
session_start();
$id_user = $_POST['id_user'];
$instagram = $_POST['instagram'];
$facebook = $_POST['facebook'];
$service_provided = $_POST['service_provided'];
$website = $_POST['website'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$ssm_no = $_POST['ssm_no'];
$company_address = $_POST['company_address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];
$year = $_POST['year'];

if(isset($_POST['btn_submit'])){
    $resultAI=$con->prepare("SHOW TABLE STATUS LIKE 'instashop'");
    $resultAI->execute();
    $dataAI=$resultAI->fetch(PDO::FETCH_ASSOC);
    $next_increment= $dataAI['Auto_increment'];

    date_default_timezone_set("Asia/Kuala_Lumpur"); 
    $productimagename=$next_increment."_".date('dmyHis');
    $location_file = $_FILES['productimage']['tmp_name'];
    $type_file   = $_FILES['productimage']['type'];
    $name_file   = $_FILES["productimage"]["name"];
    $extension=pathInfo($name_file, PATHINFO_EXTENSION);
    $newfilename=$productimagename .".".$extension;

    $directory   = "/img/$newfilename";
    $file_type = $_FILES['productimage']['type'];
    $allowed = array("image/jpeg", "image/gif", "image/png", "image/jpg");

           /* echo $newfilename;
           exit();*/
           if(in_array($file_type, $allowed)) 
            {//File is image

                //if($_FILES['photo']['size'] < (1000000))
                //{ //can't be larger than 1 MB
                $image_info = getimagesize($_FILES["productimage"]["tmp_name"]);
                $image_width = $image_info[0];
                $image_height = $image_info[1];

                if(empty($subtitle)){
                    $subtitle=NULL;
                }

                //move it to where we want it to be
                $root = getcwd();
                echo realpath($root.$directory);
                move_uploaded_file($location_file, $root.$directory); 
                /* Delete Old Image
                $path = '/img';
                $olderImage=$dBanner['filename'];
                unlink($path.$olderImage);
                */

                $sql = ('UPDATE instashop SET instagram = :instagram, facebook = :facebook, website = :website, email = :email, ssm_no = :ssm_no, company_address = :company_address, city = :city, postcode = :postcode, state = :state, year_involved = :year, profile_picture = :newfilename, phone_number = :phone_number, service_provided = :service_provided  WHERE id_user = :id_user');
                $stmt = $con->prepare($sql);


                $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $stmt->bindParam(':instagram', $instagram, PDO::PARAM_STR);
                $stmt->bindParam(':facebook', $facebook, PDO::PARAM_STR);
                $stmt->bindParam(':website', $website, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':ssm_no', $ssm_no, PDO::PARAM_STR);
                $stmt->bindParam(':company_address', $company_address, PDO::PARAM_STR);
                $stmt->bindParam(':city', $city, PDO::PARAM_STR);
                $stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
                $stmt->bindParam(':state', $state, PDO::PARAM_STR);
                $stmt->bindParam(':year', $year, PDO::PARAM_STR);
                $stmt->bindParam(':newfilename',$newfilename);
                $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
                $stmt->bindParam(':service_provided', $service_provided, PDO::PARAM_STR);




                $stmt->execute();
                $num = $stmt->rowCount();
                if ($num) {


                    header('location:../instashop/accountsetting.php?stats=1');



                }
                else
                {
                //File is not image
                    echo "<script>sweetAlert('File invalid', 'Please upload images file only.','error');</script>";
                }

            }
        }
        else{
    echo $sql;//header('location:../instashop/accountsetting.php?stats=2');
}


//upload

