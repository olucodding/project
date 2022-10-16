<?php
    // define variables and set to empty values
    $error="";
    $name1 ="";
    $name2 = "";
    $email = "";
    $gender = "";
    $dob = "";
    $country = "";
    $message="";
    
  //  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   //   $nam1 = test_input($_POST["Lastst Name"]);
   //   $name2 = test_input($_POST["name"]);
   //   $email = test_input($_POST["Email Address"]);
  //    $gender = test_input($_POST["gender"]);
  //    $dob = test_input($_POST["comment"]);
   //   $country = test_input($_POST["country"]);
   // }
    
function t($string)

{$string = trim($string);
$string = stripslashes($string);
return $string;
}

   if (isset ($_POST["submit"]))
    
        if(empty($_POST["submit"]))
        {
            $error  = '<p><label class="text-danger"> Please Enter your Name</label></p>';
        }

        else
        {

        $name = clean_text($_POST["name"]);
        if (!preg_match("/^[a-za-Z]*$/",$same))
          {
            $error  = '<p><label class="text-danger"> only letters and white spaces allowed</label></p>';

                }

            }
            if(empty($_POST[email]))
            {
        
                $error  = '<p><label class="text-danger"> Please enter your email</label></p>';

            }
            else
            {   
            
        $email = clean_text($_POST["email"]);
        if(!filter_ver ($email, filter_Validate_email))
            {
                 $error  = '<p><label class="text-danger"> invalid email format</label></p>';

                    }
                }
    
if(empty($_POST["subject"]))
{
    $error = '<p><label class="text-danger"> Subject is required</label></p>';
}
    else
{
    $subject = clean_text($_POST["subject"]);
}
if(empty($_POST["message"]))
{
$error = '<p><label class="text-danger"> message is required</label></p>';

}
else
{
    $message = clean_text($_POST["message"]);
}
 if($error == '')    
 
 

    $file_open = fopen("contact_data.csv", "a");
    $no_rows = count(file("contact_data.csv"));
    if($no_rows > 1)
    {
        $no_rows = ($no_rows - 1) + 1;
    }
    $form_data = array(
        'sr_no' => $no_rows,
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message

    );
    fputcsv($file_open, $form_data);
    $error = '<label class="text-sucess">Thank you for contacting us</label>';
    $name = '';
    $email= '';
    $subject = '';
    $message = '';
    

   
echo "<h2>Your Input:</h2>";
echo $name1;
echo $name2;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $dob;
echo "<br>";
echo $country;
?>

