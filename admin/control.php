<?php

include_once ('../website/model.php'); // step 1 model include 


class control extends model  // step 2  extend model for func call 
{
    function __construct()
    {

        session_start();

        model::__construct(); // step 3 call model __construct for db connection

        $path = $_SERVER['PATH_INFO'];

        switch ($path) {
            case '/logo':
                include_once ('index.php');
                break;
            case '/dashboard':
                include_once ('index.php');
                break;
            case '/admin':
                if (isset($_REQUEST['submit'])) {

                    $email = $_REQUEST['email'];
                    $password = $_REQUEST['password']; // pass encripted 

                    $where = array("email" => $email, "password" => $password);
                    $res = $this->select_where('admin', $where);
                    $chk = $res->num_rows; // 0 means false & 1 means true  check row wise condition

                    if ($chk == 1) {

                        $data = $res->fetch_object(); // single data fetch 
                        $_SESSION['aname'] = $data->admin_name;
                        $_SESSION['aid'] = $data->id;

                        echo "<script>
							alert('Login Success !');
							window.location='dashboard';
						</script>";
                    } else {
                        echo "<script>
							alert('Login Failed !');
						</script>";
                    }
                }
                include_once ('login.php');
                break;

            case '/add_blog':
                include_once ('add_blog.php');
                if (isset($_REQUEST['submit'])) {
                    $Blog_Name = $_REQUEST['Blog_Name'];
                    $Blog_Description = $_REQUEST['Blog_Description'];
                    $Image = $_FILES['Image']['name'];

                    // image upload in project folder
                    $path = '../admin/upload/blogimg/' . $Image;
                    $tmp_file = $_FILES['Image']['tmp_name'];
                    move_uploaded_file($tmp_file, $path);

                    $data = array("Blog_Name" => $Blog_Name, "Blog_Description" => $Blog_Description, "Image" => $Image);
                    $res = $this->insert('blog', $data);

                    if ($res) {
                        echo "<script>
							alert('Blog Added !');
						</script>";
                    } else {
                        echo "Not Successfully Added";
                    }
                }
                break;

            case '/add_services':
                include_once ('add_services.php');
                if (isset($_REQUEST['submit'])) {
                    $Service_Name = $_REQUEST['Service_Name'];
                    $Total_Service = $_REQUEST['Total_Service'];
                    $Price = $_REQUEST['Price'];
                    $Service_Image = $_FILES['Service_Image']['name'];

                    // image upload in project folder
                    $path = '../admin/upload/serviceimg/' . $Service_Image;
                    $tmp_file = $_FILES['Service_Image']['tmp_name'];
                    move_uploaded_file($tmp_file, $path);

                    $data = array("Service_Name" => $Service_Name, "Total_Service" => $Total_Service, "Price" => $Price, "Service_Image" => $Service_Image);
                    $res = $this->insert('services', $data);

                    if ($res) {
                        echo "<script>
							alert('Service Added !');
						</script>";
                    } else {
                        echo "Not Successfully Added";
                    }
                }
                break;

            case '/manage_blog':
                $data = $this->table_select('blog');
                include_once ('manage_blog.php');
                break;

            case '/manage_contact':
                $data = $this->table_select('contact');
                include_once ('manage_contact.php');
                break;

            case '/manage_user':
                $data = $this->table_select('user_details');
                include_once ('manage_user.php');
                break;

            case '/manage_services':
                $data = $this->table_select('services');
                include_once ('manage_services.php');
                break;

            case '/manage_testimonial':
                $data = $this->table_select('testimonial');
                include_once ('manage_testimonial.php');
                break;

            case '/admin_logout':
                unset($_SESSION['aid']);
                unset($_SESSION['aname']);
                echo "<script>
							alert('Logout Success !');
							window.location='admin'
						</script>";
                break;

            case '/delete':
                if (isset($_REQUEST['dblog'])) {
                    $id = $_REQUEST['dblog'];

                    $where = array("id" => $id);

                    // get data for img delete
                    $resdata = $this->select_where('blog', $where);
                    $fetch = $resdata->fetch_object();
                    $del_img = $fetch->Image;

                    $res = $this->delete_where('blog', $where); // folder name
                    if ($res) {
                        unlink('upload/blogimg/' . $del_img); // delete image from path
                        echo "<script>
						alert('Blog Deleted !');
						window.location='manage_blog'
					</script>";
                    }
                }
                if (isset($_REQUEST['dcontact'])) {
                    $id = $_REQUEST['dcontact'];

                    $where = array("id" => $id);

                    $res = $this->delete_where('contact', $where); // folder name
                    if ($res) {
                        echo "<script>
						alert('Contact Deleted !');
						window.location='manage_contact'
					</script>";
                    }
                }

                if (isset($_REQUEST['dtestimonial'])) {
                    $id = $_REQUEST['dtestimonial'];
                    $where = array("id" => $id);
                    // get data for img delete
                    $resdata = $this->select_where('testimonial', $where);
                    $fetch = $resdata->fetch_object();
                    $del_img = $fetch->Image;

                    $res = $this->delete_where('testimonial', $where); // folder name
                    if ($res) {
                        unlink('upload/testimonialimg/' . $del_img); // delete image from path
                        echo "<script>
						alert('Feedback Deleted !');
						window.location='manage_testimonial'
					</script>";
                    }
                }
                if (isset($_REQUEST['dservice'])) {
                    $id = $_REQUEST['dservice'];
                    $where = array("id" => $id);
                    // get data for img delete
                    $resdata = $this->select_where('services', $where);
                    $fetch = $resdata->fetch_object();
                    $del_img = $fetch->Service_Image;

                    $res = $this->delete_where('services', $where); // folder name
                    if ($res) {
                        unlink('upload/serviceimg/' . $del_img); // delete image from path
                        echo "<script>
						alert('Service Deleted !');
						window.location='manage_services'
					</script>";
                    }
                }
                if (isset($_REQUEST['duser'])) {
                    $id = $_REQUEST['duser'];
                    $where = array("id" => $id);
                    // get data for img delete
                    $resdata = $this->select_where('user_details', $where);
                    $fetch = $resdata->fetch_object();
                    $del_img = $fetch->profileImg;

                    $res = $this->delete_where('user_details', $where); // folder name
                    if ($res) {
                        unlink('upload/userimg/' . $del_img); // delete image from path
                        echo "<script>
						alert('User Deleted !');
						window.location='manage_user'
					</script>";
                    }
                }
                break;
            case '/editservice':
                if (isset($_REQUEST['eservice'])) {
                    $id = $_REQUEST['eservice'];

                    $where = array("ID" => $id);
                    $res = $this->select_where('services', $where);
                    $fetch = $res->fetch_object();

                    if (isset($_REQUEST['save'])) {
                        $Service_Name = $_REQUEST['Service_Name'];
                        $Total_Service = $_REQUEST['Total_Service'];
                        $Price = $_REQUEST['Price'];

                        if ($_FILES['Service_Image']['size'] > 0) {
                            // get old_img name
                            $old_img = $fetch->Service_Image;

                            $Service_Image = $_FILES['Service_Image']['name'];
                            $path = 'upload/serviceimg/' . $Service_Image;
                            $tmp_file = $_FILES['Service_Image']['tmp_name'];
                            move_uploaded_file($tmp_file, $path);

                            $data = array("Service_Name" => $Service_Name, "Service_Image" => $Service_Image, "Total_Service" => $Total_Service, "Price" => $Price);

                            $res = $this->update_where('services', $data, $where);
                            if ($res) {
                                unlink('upload/serviceimg/' . $old_img);
                                echo "<script>
								alert('Service Update Success !');
								window.location='manage_services';
							</script>";
                            }

                        } else {
                            $data = array("Service_Name" => $Service_Name, "Total_Service" => $Total_Service, "Price" => $Price);
                            $res = $this->update_where('services', $data, $where);
                            if ($res) {
                                echo "<script>
								alert('Service Update Success !');
								window.location='manage_services';
							</script>";
                            }
                        }

                    }

                }
                include_once ('editservice.php');
                break;
            case '/edit_blog':
                if (isset($_REQUEST['eblog'])) {
                    $id = $_REQUEST['eblog'];

                    $where = array("ID" => $id);
                    $res = $this->select_where('blog', $where);
                    $fetch = $res->fetch_object();

                    if (isset($_REQUEST['save'])) {
                        $Blog_Name = $_REQUEST['Blog_Name'];
                        $Blog_Description = $_REQUEST['Blog_Description'];


                        if ($_FILES['Image']['size'] > 0) {
                            // get old_img name
                            $old_img = $fetch->Image;

                            $Image = $_FILES['Image']['name'];
                            $path = 'upload/blogimg/' . $Image;
                            $tmp_file = $_FILES['Image']['tmp_name'];
                            move_uploaded_file($tmp_file, $path);

                            $data = array("Blog_Name" => $Blog_Name, "Blog_Description" => $Blog_Description, "Image" => $Image);

                            $res = $this->update_where('blog', $data, $where);
                            if ($res) {
                                unlink('upload/blogimg/' . $old_img);
                                echo "<script>
								alert('Blog Update Success !');
								window.location='manage_blog';
							</script>";
                            }

                        } else {
                            $data = array("Blog_Name" => $Blog_Name, "Blog_Description" => $Blog_Description);
                            $res = $this->update_where('blog', $data, $where);
                            if ($res) {
                                echo "<script>
								alert('Blog Update Success !');
								window.location='manage_blog';
							</script>";
                            }
                        }

                    }

                }
                include_once ('edit_blog.php');
                break;

            case '/status':
                if (isset($_REQUEST['status_show'])) {
                    $id = $_REQUEST['status_show'];

                    $where = array("ID" => $id);

                    // get data 
                    $resdata = $this->select_where('user_details', $where);
                    $fetch = $resdata->fetch_object();
                    $status = $fetch->status;
                    if ($status == "Block") {
                        $data = array("status" => "Unblock");

                        $res = $this->update_where('user_details', $data, $where);
                        if ($res) {
                            echo "<script>
							alert('User Unblock !');
							window.location='manage_user';
						</script>";
                        }
                    } else {
                        $data = array("status" => "Block");

                        $res = $this->update_where('user_details', $data, $where);
                        if ($res) {
                            unset($_SESSION['uid']);
                            unset($_SESSION['uname']);
                            echo "<script>
							alert('User Block !');
							window.location='manage_user';
						</script>";
                        }
                    }



                }
                break;

            default:
                echo "<h1 style='color:red; text-align:center'>Page Not Found</h1>";
                break;
        }

    }
}
$obj = new control

    ?>