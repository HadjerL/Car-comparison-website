<?php
require_once('./models/model.php');
class PageModel extends Model{
    public function getWebsite($website_name){
        $conn = $this-> connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT id_website FROM `website` WHERE website_name = \"Markaba\"";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result[0]["id_website"];
    }
    public function getLogo($id_website, $logo_type){
        $conn = $this->connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM `logo` WHERE id_website= $id_website and logo_type = \"$logo_type\"";
        $result = $this->request($conn,$query);
        $this->disconect($conn);
        return $result;
    }
    public function getNavMenu($id_website){
        $conn = $this->connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM `nav_menu` WHERE id_website = $id_website";
        $result = $this ->request($conn,$query);
        $this->disconect($conn);
        return $result[0]["id_nav_menu"];
    }
    public function getNavMenuItems($id_nav_menu){
        $conn = $this->connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM `nav_menu_item` WHERE id_nav_menu = $id_nav_menu";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
    public function getSocials($id_website){
        $conn = $this->connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM `socials` WHERE id_website = $id_website";
        $result = $this ->request($conn,$query);
        $this->disconect($conn);
        return $result[0]["id_socials"];
    }
    public function getSocialItems($id_socials){
        $conn = $this->connect($this->getDbName(), $this->getHost(), $this->getUser(), $this->getPassword());
        $query = "SELECT * FROM `social` WHERE id_socials = $id_socials";
        $result = $this->request($conn, $query);
        $this->disconect($conn);
        return $result;
    }
}
?>