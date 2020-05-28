<?php

class DbConnect {

    var $DatabHost = DB_HOST;
    var $DatabUser = DB_USER;
    var $DatabPassword = DB_PASSWORD;
    var $DatabName = DB_NAME;
    public $link;
    var $AllowedIpAdress = ALLOWED_IP_ADDRESS;

    /**
     * Use of DataConnect Function : Database Connection using constructor
     * @DBClass Functions
     */
    function __construct() {
      //  $this->link = @mysqli_connect($this->DatabHost, $this->DatabUser, $this->DatabPassword,$this->DatabName);
        $this->link = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD,DB_DATABASE);

        if (!$this->link) {
            
            die('Could not connect: ' . mysqli_connect_error());
            
        }


    }

    /**
     * Use of DataConnect Function : Query function for get mysql result
     * @DBClass Functions
     */
    function Query($sql) {
        $sql = trim($sql);
        $result = mysqli_query($this->link,$sql);
        if (!$result) {

            echo 'MySQL Error: ' . $this->link->connect_errno();
            exit;
        }
        return $result;
    }
    /**
     * Use of DataConnect Function : Query function for get mysql Row
     * @DBClass Functions
     */
    function QueryGetRow($sql) {
        $sql = trim($sql);
        $result = mysqli_query($this->link,$sql);
        if (!$result) {

            echo 'MySQL Error: ' . $this->link->connect_errno();
            exit;
        }
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    /**
     * Use of DataConnect Function : Get result array using query
     * @DBClass Functions
     */
    function select($sql, $rettype = 1) {
        //RetType will return the type of rwo return
        // 1 for array, 2 for assoc, 3 for id
        $sql = trim($sql);

        $result = mysqli_query($this->link,$sql);
        if (!$result) {

            echo 'MySQL Error: ' . mysqli_error($this->link);
            exit;
        }
        switch ($rettype) {
            case 1:
                //return array
                while ($row = mysqli_fetch_array($result)) {
                    foreach ($row as $key => $value) {
                        $v[$key] = html_entity_decode(htmlspecialchars_decode(stripslashes($value)));

                    }
                    $data[] = $v;


                }
                break;
            case 2:
                //return assoc
                while ($row = mysqli_fetch_assoc($result)) {
                    foreach ($row as $key => $value) {
                        $v[$key] = html_entity_decode(htmlspecialchars_decode(stripslashes($value)));
                    }
                    $data[] = $v;
                }
                break;
            case 3:
                //return row
                while ($row = mysqli_fetch_row($result)) {
                    foreach ($row as $key => $value) {
                        $v[$key] = html_entity_decode(htmlspecialchars_decode(stripslashes($value)));
                    }
                    $data[] = $v;
                }
                break;
            default:
                //return array
                while ($row = mysqli_fetch_array($result)) {
                    foreach ($row as $key => $value) {
                        $v[$key] = html_entity_decode(htmlspecialchars_decode(stripslashes($value)));
                    }
                    $data[] = $v;
                }
                break;
        }
        mysqli_free_result($result);
        if (isset($data)) {
            return $data;
        }
    }

    /**
     * Use of DataConnect Function : Insert Data using table name and key-value array
     * @DBClass Functions
     */
    function insert($table, $store_array = '', $user_id = '') {
        $data = "";
        foreach ($store_array as $k => $v) {
            if (is_array($v)) {
                $v = @implode(",", array_map('trim', $v));
            }
            if ($data == "") {
                $data = " `" . trim($k) . "`='" . @mysqli_escape_string($this->link,trim($v)) . "'";
            } else {
                $data .=", `" . trim($k) . "`='" . @mysqli_escape_string($this->link,trim($v)) . "'";
            }
        }


        $sql = "INSERT INTO " . $table . " SET " . $data;
        $sql = str_replace("\\&quot;\\", "", $sql);
        $sql = str_replace("\\&quot;", "", $sql);

        $sql = trim($sql);
        //echo $sql;
        mysqli_query($this->link,'set names utf8');
        $result = mysqli_query($this->link,$sql);

        if (!$result) {
           //  echo $sql;
            return 0;
        } else {
            $save_id = mysqli_insert_id($this->link);
            return $save_id;
        }
    }

    /**
     * Use of DataConnect Function : Update Data using table name and key-value array
     * @DBClass Functions
     */
    function update($table, $store_array = '', $where = '', $auto_id_value = '', $user_id = '') {
        $data = "";
        foreach ($store_array as $k => $v) {
            if (is_array($v)) {
                $v = @implode(",", array_map('trim', $v));
            }
            if ($data == "") {
                $data = " `" . trim($k) . "`='" . @mysqli_escape_string($this->link,trim($v)) . "'";
            } else {
                $data .=", `" . trim($k) . "`='" . @mysqli_escape_string($this->link,trim($v)) . "'";
            }
        }

        $sql = "UPDATE " . $table . " SET " . $data;
        if ($where) {
            $sql .=" WHERE " . $where;
        }

       // echo $sql;

        $sql = str_replace("\\&quot;\\", "", $sql);
        $sql = str_replace("\\&quot;", "", $sql);

        $sql = trim($sql);
        mysqli_query($this->link,'set names utf8');
        $result = mysqli_query($this->link,$sql);

        if (!$result) {
            return 0;
        } else {
            $save_id = $result;

            return $save_id;
        }

        mysqli_free_result($result);
    }

    /**
     * Use of DataConnect Function : Delete Data using table name and where condition
     * @DBClass Functions
     */
    function delete($table, $where = '') {
        $sql = "DELETE FROM " . $table;
        if ($where) {
            $sql .=" WHERE " . $where;
        }

        $sql = trim($sql);
       //echo $sql;
         //exit;
        $result = mysqli_query($this->link,$sql);
        if (!$result) {
           // echo "not returh";
            return 0;
        } else {
            $save_id = $result;
            return $save_id;
        }

        mysqli_free_result($result);
    }


    /**
     * Use of DataConnect Function : Close Database Conection using mysql function
     * @DBClass Functions
     */
    function DbClose() {
        mysqli_close($this->link);
    }

}

?>
