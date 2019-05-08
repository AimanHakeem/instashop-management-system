
<?php
if(isset($_POST['update']))
{
    $sqlst = ('UPDATE instashop SET status = :status WHERE id_user = :id_user');
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
    }
    
    
    
            /**$resultAI = mysqli_query($mysqli_conn,"SHOW TABLE STATUS LIKE 'banner'");
            $dataAI = mysqli_fetch_assoc($resultAI);
            $next_increment = $dataAI['Auto_increment'];*/

            $resultAI=$pdo_conn->prepare("SHOW TABLE STATUS LIKE 'instashop'");
            $resultAI->execute();
            $dataAI=$resultAI->fetch(PDO::FETCH_ASSOC);
            $next_increment= $dataAI['Auto_increment'];
            
            date_default_timezone_set("Asia/Kuala_Lumpur"); 
            $productimagename=$next_increment."_".date('dmyHis');
            $location_file = $_FILES['productimage']['tmp_name'];
            $type_file   = $_FILES['productimage']['type'];
            $name_file   = $_FILES["productimage"]["name"];
            $extension=end(explode(".", $name_file));
            $newfilename=$productimagename .".".$extension;
            $directory   = "../img/$newfilename";
            $file_type = $_FILES['productimage']['type'];
            $allowed = array("image/jpeg", "image/gif", "image/png", "image/jpg");
            
            if(in_array($file_type, $allowed)) 
            {//File is image
                
                if($_FILES['photo']['size'] < (1000000))
                { //can't be larger than 1 MB
            $image_info = getimagesize($_FILES["productimage"]["tmp_name"]);
            $image_width = $image_info[0];
            $image_height = $image_info[1];
            
            if(empty($subtitle)){$subtitle=NULL;}
            if($image_width==1490 && $image_height==835)
            {
                        //move it to where we want it to be
                move_uploaded_file($location_file,$directory); 
                
                        //DELETE OLD IMAGE FROM SERVER
                $path = '../img';
                $olderImage=$dBanner['filename'];
                unlink($path.$olderImage);
                
                        //put to database
                        /**$qInsert="INSERT INTO `banner` 
                                (`filename` ,`sub_title`)
                        VALUES ('$newfilename','$subtitle');";
                        mysqli_select_db($mysqli_conn,$db_name);
                        $rInsert=mysqli_query($mysqli_conn,$qInsert)or die(mysqli_error());*/

                        $sInsert=$pdo_conn->prepare("INSERT INTO `instashop`(`profile_picture`) 
                            VALUES (:profile_picture)");
                        $sInsert->bindValue(':profile_picture',$newfilename);
                        $sInsert->execute();    
                        
                        echo "
                        <script>
                        sweetAlert({
                            title: 'Successfully',   
                            text: 'Your banner has been updated.',   
                            type: 'success'},
                            function(){
                                window.location.href ='banner.php'
                                });
                                </script>";
                            }
                            else
                            {
                        //Image size is large than requirement
                                {$size_image="1490x835";}
                                echo "<script>sweetAlert('Image size not compatible', 'Size must be $size_image ','error');</script>";
                            }
                        }
                        else
                        {
                    //Image size is large than requirement
                            echo "<script>sweetAlert('Image to large', 'Please upload size under 1MB','error');</script>";
                        }
                        
                    }
                    else
                    {
                //File is not image
                        echo "<script>sweetAlert('File invalid', 'Please upload images file only.','error');</script>";
                    }
                }
                ?>