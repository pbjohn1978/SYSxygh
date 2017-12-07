<?php
    require_once('ava3KsVUvw8syHCJpitM.php');
    require_once('zSntUkOYX5MGUGz7duv3.php');
    #****************************************************************************************
    #               webGuiUser CLASS
    #****************************************************************************************
    class webGuiUser{
        public $UserID;
        public $UserFirstName;
        public $UserLastName;
        public $UserName;
        public $WebMFA;
        public $UserMFAphoneNum;
        public $UserAccessLevel;
        public $UserGuid;
        
        function setUserID($id){
            $this->UserID = $id;
        }
        function setFirstName($Fname){
            $this->UserFirstName = $Fname;
        }
        
        function setLastName($Lname){
            $this->UserLastName = $Lname;
        }
        
        function setUserName($Uname){
            $this->UserName = $Uname;
        }
        
        function setMFA($MFA){
            $this->WebMFA = $MFA;
        }
        
        function setPhone($phone){
            $this->UserMFAphoneNum = $phone;
        }
        
        function setAccessLevel($level){
            $this->UserAccessLevel = $level;
        }
        function setUserGuid($guid){
            $this->UserGuid = $guid;
        }
    }
    #end webGuiUser CLASS
    #****************************************************************************************
?>