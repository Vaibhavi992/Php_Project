<?php

include_once ('model.php');

class control extends model
{
    function __construct()
    {

        session_start(); // first create session in the login then in the control start for all page.

        model::__construct();

        $path = $_SERVER['PATH_INFO'];

        switch ($path) {
            case '/index':
                include_once ('index.php');
                break;
            case '/about':
                include_once ('about.php');
                break;
            case '/services':
                include_once ('services.php');
                break;

            case '/testimonial':
                $data = $this->table_select('testimonial');
                if (isset($_REQUEST['submit'])) {
                    $Cust_Name = $_REQUEST['Cust_Name'];
                    $Feedback = $_REQUEST['Feedback'];

                    $tst_img = $_FILES['tst_img']['name'];
                    $path = '../admin/upload/testimonialimg/' . $tst_img;
                    $tmp_file = $_FILES['tst_img']['tmp_name'];
                    move_uploaded_file($tmp_file, $path);

                    $data = array("tst_img" => $tst_img, "Cust_Name" => $Cust_Name, "Feedback" => $Feedback);

                    $res = $this->insert('testimonial', $data);

                    if ($res) {
                        echo "<script>
                            alert('Feedback Succesfully Added !');
                            window.location='testimonial';
                        </script>";
                    }
                }
                include_once ('testimonial.php');
                break;
            case '/contact':
                if (isset($_REQUEST['submit'])) {
                    $Full_Name = $_REQUEST['Full_Name'];
                    $Email = $_REQUEST['Email'];
                    $Phone_Number = $_REQUEST['Phone_Number'];
                    $Message = $_REQUEST['Message'];

                    $data = array("Full_Name" => $Full_Name, "Email" => $Email, "Phone_Number" => $Phone_Number, "Message" => $Message);

                    $res = $this->insert('contact', $data);

                    if ($res) {
                        echo "<script>
							alert(' Contact Succesfully Added ! Contact You Shortly !');
						</script>";
                    }
                }
                include_once ('contact.php');
                break;
            case '/signup':

                if (isset($_REQUEST['submit'])) {
                    $username = $_REQUEST['username'];
                    $email = $_REQUEST['email'];
                    $gender = $_REQUEST['gender'];
                    $password = md5($_REQUEST['password']); // password encrypted via md5 

                    $profileImg = $_FILES['profileImg']['name'];
                    // image upload in project folder
                    $path = '../admin/upload/userimg/' . $profileImg;
                    $tmp_file = $_FILES['profileImg']['tmp_name'];
                    move_uploaded_file($tmp_file, $path);

                    $data = array(
                        "username" => $username,
                        "profileImg" => $profileImg,
                        "email" => $email,
                        "gender" => $gender,
                        "password" => $password
                    );

                    $res = $this->insert('user_details', $data);
                    if ($res) {
                        echo "<script>
							alert('Registered Success !');
                            window.location='login';
						</script>";
                    }

                }
                include_once ('signup.php');
                break;
            case '/login':
                if (isset($_REQUEST['submit'])) {

                    $email = $_REQUEST['email'];
                    $password = md5($_REQUEST['password']); // password encrypted 

                    $where = array("email" => $email, "password" => $password);
                    $res = $this->select_where('user_details', $where);
                    $chk = $res->num_rows; // 0 means false & 1 means true  check row wise condition

                    if ($chk == 1) {

                        $data = $res->fetch_object(); // single data fetch 
                        if ($data->status == "Unblock") {

                            $_SESSION['uname'] = $data->username;
                            $_SESSION['uid'] = $data->ID;

                            echo "<script>
							alert('Login Success !');
                            window.location='index';
						</script>";
                        } else {
                            echo "<script>
								alert('Your Account Block || So Contact Us For More Information  !');
								window.location='index'
							</script>";
                        }
                    } else {
                        echo "<script>
							alert('Login Failed || Credential Not Match !');
						</script>";
                    }
                }
                include_once ('login.php');
                break;

            case '/profile':
                $where = array("ID" => $_SESSION['uid']);
                $res = $this->select_where('user_details', $where);
                $fetch = $res->fetch_object();

                include_once ('profile.php');
                break;

            case '/user_logout':
                unset($_SESSION['uid']);
                unset($_SESSION['uname']);
                echo "<script>
							alert('Logout Success !');
							window.location='index'
						</script>";
                break;

            case '/editprofile':
                if (isset($_REQUEST['eprofile'])) {
                    $id = $_REQUEST['eprofile'];

                    $where = array("ID" => $id);
                    $res = $this->select_where('user_details', $where);
                    $fetch = $res->fetch_object();

                    if (isset($_REQUEST['save'])) {
                        $username = $_REQUEST['username'];
                        $email = $_REQUEST['email'];
                        $gender = $_REQUEST['gender'];

                        $_SESSION['uname'] = $username;   // for the session uname update in header

                        if ($_FILES['Image']['size'] > 0) {
                            // get old_img name
                            $old_img = $fetch->profileImg;

                            $profileImg = $_FILES['profileImg']['name'];
                            $path = 'upload/userimg/' . $profileImg;
                            $tmp_file = $_FILES['profileImg']['tmp_name'];
                            move_uploaded_file($tmp_file, $path);

                            $data = array("username" => $username, "email" => $email, "profileImg" => $profileImg, "gender" => $gender);


                            $res = $this->update_where('blog', $data, $where);
                            if ($res) {
                                unlink('upload/userimg/' . $old_img);
                                echo "<script>
								alert('Update Profile Success !');
								window.location='profile';
							</script>";
                            }

                        } else {
                            $data = array("username" => $username, "email" => $email, "gender" => $gender);
                            $res = $this->update_where('user_details', $data, $where);
                            if ($res) {
                                echo "<script>
								alert('Update Profile Success !');
								window.location='profile';
							</script>";
                            }
                        }

                    }

                }
                include_once ('edit_profile.php');
                break;

            default:
                echo "<h1 style='color:red;text-align:center'> Page Not Found </h1>";
                break;
        }

    }
}
$obj = new control

    ?>