<?php
class authModel extends model
{
    public function restrict_access()
    {
        // USER IS NOT LOGGED IN
        if(!($_SESSION[session_name]))
        {
            header('location:'.URL.'auth/login');
        }
        else
        {
            $user = base64_decode($_SESSION[session_name]);
            $query = $this->db->query("SELECT * FROM users WHERE BINARY username= BINARY '{$user}'");

            // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
            // core/controller.php! If you prefer to get an associative array as the result, then do
            // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
            // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
            while ($row = $query->fetch_array())
                {

                $AdminID = $row['id'];
                $AdminName = $row['fname'] .' ' .$row['surname'] . ' ' . $row['othernames'];

            }
            @$AdminDetails = array("names"=>$AdminName,"id"=>$AdminID,"username"=>$user);
            return $AdminDetails;
        }
    }
    public function doLogin($username,$password)
    {   
        $sql = "SELECT * FROM users WHERE BINARY username = BINARY '$username'";
        $result = $this->db->query($sql);
        if($result->num_rows === 1)
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            
            if(password_verify($password, $row['password']))
            {
                $_SESSION[session_name] = base64_encode($username);
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    public function verify_and_pass_link($email,$token)
    {
        $sql = "SELECT * FROM users WHERE BINARY email = BINARY '$email'";
        $result = $this->db->query($sql);
        if($result->num_rows === 1)
        {
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
            {
                $userid = $row['id'];
                $SQL2 = "SELECT * FROM password_resets WHERE user_id='{$userid}'";
                $query = $this->db->query($SQL2);
                if($query->num_rows === 1)
                {
                    $deleteKey3 = "DELETE FROM password_resets WHERE user_id='{$userid}'";
                    if(!($this->db->query($deleteKey3)))
                    {
                      die($this->db->error);
                    }
                    else
                    {
                        $SQL3 = "INSERT INTO password_resets(reset_key,user_id)VALUES('{$token}','{$userid}')";
                        if(!$this->db->query($SQL3))
                        {
                            die($this->db->error);
                        }
                        else
                        {
                            return true;
                        }
                    }
                }
                else
                {
                    $SQL3 = "INSERT INTO password_resets(reset_key,user_id)VALUES('{$token}','{$userid}')";
                    if(!$this->db->query($SQL3))
                    {
                        die($this->db->error);
                    }
                    else
                    {
                        return true;
                    }
                }
            }
        }
    }
    public function verify_token($token)
    {
        $sql = "SELECT * FROM password_resets WHERE reset_key='{$token}'";
        $qry = $this->db->query($sql);
        if($qry->num_rows === 1)
        {
            return true;
        }
        else
        {
                return false;
        }
    }
    public function resetPassword($token,$password)
    {
        $sql = "SELECT * FROM password_resets WHERE reset_key='{$token}'";
        $qry = $this->db->query($sql);
        if($qry->num_rows === 1)
        {
            //return true;
            while($row = $qry->fetch_array())
            {
                $user_id = $row['user_id'];
                $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                
                $updateSQL = "UPDATE users SET password='{$hashedPassword}' WHERE id='{$user_id}'";
                if(!$this->db->query($updateSQL))
                {
                    return false;
                }
                else
                {
                    $updateSQL2 = "DELETE FROM password_resets WHERE reset_key='{$token}'";
                    if(!$this->db->query($updateSQL2))
                    {
                        return false;
                    }
                    else
                    {
                        return true;
                    }
                }
            }
        }
        else
        {
                return false;
        }
    }
    public function registerUser($email,$surname,$fname,$othernames,$prefix,$postTitle,$directorate,$fileno,$idno,$classification)
    {
        $y=date('y');$m= date('m'); $d = date('d');
        $slug = $y.$m.$d.mt_rand(1000, 9999);
        $sql = "SELECT * FROM users WHERE BINARY email = BINARY '$email'";
        $query = $this->db->query($sql);
        $num_rows = $query->num_rows;
        if($num_rows)
        {
            return "<div class='alert alert-block alert-danger text-center'><strong>ERROR : </strong> The Email : <strong>{$email}</strong>, is already in use within the system. </div>";
        }
        else
        {
            $SQL2 = "INSERT INTO users(email,sname,fname,oname,prefix,designation,directorate,fileNo,idNo,classification,slug,accountStatus)VALUES('{$email}','{$surname}','{$fname}','{$othernames}','{$prefix}',
            '{$postTitle}','{$directorate}','{$fileno}','{$idno}','{$classification}','{$slug}',0)";

            if(!($this->db->query($SQL2)))
            {
                return "<div class='alert alert-block alert-danger'>".$this->db->error."</div>";
            }
            else
            {
                return "<div class='alert alert-block alert-success text-center'><strong>SUCCESS : </strong> Your Account was successfully created, Once verified, You will recieve an email with further instructions. </div> <script type='text/javascript'>setTimeout(function() { window.location.href = '".URL."';}, 9000);</script>";
            }
        }
    }
}

?>