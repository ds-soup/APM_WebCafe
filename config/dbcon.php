<?php


    class instance_DB {
        
        private $mysqli;
        private $host = "localhost";
        private $user = "webuser";
        private $password = "1234";
        private $dbname = "userDB";
        
        function __construct() {
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->dbname);
            $this->mysqli->set_charset('utf8');
            if($this->mysqli->connect_errno) {
                echo "DB연결에 실패했습니다. 관리자에게 문의해주세요." .mysqli_connect_error();
            }
        }
        
        function __destruct() {
            
        }
        
        public function EnrollUser($id, $pwd, $email, $name) {
        
            $stmt = $this->mysqli->prepare("insert into member_table(mb_id, mb_pw, email, mb_name) values (?, ?, ?, ?)");
            $stmt->bind_param("ssss",$id, $pwd, $email, $name);
            $result = $stmt->execute();
            return $result;
        }
        public function IsUserCheck($id) {
            $stmt = $this->mysqli->prepare("SELECT * FROM member_table where mb_id='{$id}'");
            $stmt->execute();
            return $stmt->fetch();
            
        }
        public function IsLoginValid($id, $passwd) {
            $pwd = password_hash($passwd, PASWORD_DEFAULT);
            $stmt = $this->mysqli->prepare("SELECT * FROM member_table where mb_id='{$id}' and mb_pw='{$passwd}'");
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            return $data['mb_name'];
        }
        public function IsUserAdmin($id, $passwd) {
            $stmt = $this->mysqli->prepare("SELECT * FROM adminUser where mb_id='{$id}' and mb_pw ='{$passwd}'");
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            return $data['mb_name'];
            
        }
        
    
    }
    

?>