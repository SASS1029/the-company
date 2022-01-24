<?php

include "database.php";

class User extends Database {

    public function createUser($first_name,$last_name,$username,$password) {
        $password = password_hash($password, PASSWORD_DEFAULT);  //passwordを暗号化、難読化する mb5(),sha1(）は古いらしい、今のパソコンの性能では簡単に復元されてしまう

        //SQL
        $sql = "INSERT INTO users(first_name,last_name,username,`password`) VALUES ('$first_name','$last_name','$username' ,'$password')";
                                                                //shift + @ バッククォート
        //Excution -> Redirection
        if($this->conn->query($sql)) {
            header('location: ../views');  //go to index.php
            exit;
        }else{
            die("Error createing user" . $this->conn->error);
        }
        //ここまでの作業でregisterから登録したらphpmyadminのuserにデータが登録される
    }

    public function login($username, $password) {
        $sql = "SELECT id, username, `password` FROM users WHERE username ='$username' ";

        if($result = $this->conn->query($sql)) {    //ここのif内データベースに接続できるかどうかの確認
            //$result holds the id username password from the database　（他の変数でもいい）
            //Check if the username exists
            if($result->num_rows == 1) {           //このif内は入力した情報がデータベースにあるかの確認　ここの場合はusername 　
                //Check if the password is correct
                $user_details = $result->fetch_assoc();

                if(password_verify($password, $user_details['password'])) {  //passwordがpassword_hashで作ったハッシュ値と一致しているかを確認する関数　password_verify(パスワード、ハッシュ値)
                    session_start();                                         //このif内はloginでpasswordが一致しているかを確認するためのもの
                    $_SESSION['user_id'] = $user_details['id'] ;         //このようなユーザーによる一連の動作(サイトにログイン、サイトにアクセス、買い物かごに商品を入れる、購入する、ログアウトする)のことを「セッション(Session)」と言います。/Cookie(クッキー)・・・データをブラウザに保存する仕組み(google)
                    $_SESSION['username'] = $user_details['username'];   //サーバー側が「同一クライアントからのアクセスか否かを判定できない,よって「CookieとSessionで状態を一時的に保持する仕組みー＞用語で言うとHTTP通信のステートレスをsession＆cookieで克服して状態を保持できる（擬似的ステートフル）ようにする
                                                                        //今回はloginページの表示とid,username、その後のことまでが同一人物と判断して一時的に関連づけるためにsessionを使う　/他にはショッピングサイトで買い物カゴに物が貯まるように（ないとリクエストのたびに状態がリセットされるため、アクセスのアクセスのたびに買い物カゴがリセットされてしまう）
                    header("location: ../views/dashboard.php" );
                    exit;


                }else{
                    die("Password is incorrect.");
                }

            }else {
               die("Username not found" );
            }
        }else{
            die("Error:" . $this->conn->error);
        }
    }

    public function getAllUsers() {  //dashboard.php に取得アンドloginの人以外表示
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT id, first_name, last_name ,username FROM users WhERE id != $user_id " ;
        //get all users EXCEPT for this id　（where id ! = $user_id & 上の$_SESSIONとdashboard.phpの二行目）

        if($result = $this->conn->query($sql)) {
            return $result;
        }else{
            die("Error retrieving all users:" . $this->conn->error);
        }
    }

    public function getUser($user_id) {  //updateするために一つ取り出す
        $sql = "SELECT * FROM users  WHERE id = $user_id";

        if($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
            //Since we're expecting 1 row of result only, transform
            //the result to ASSOCIATIVE array right away
        }else {
            die("Error retrieving the user: " . $this->conn->error);
        }
    }

    public function updateUser($user_id, $first_name,$last_name,$username) {
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $user_id";

        if($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
        }else {
            die("Errorupdating user:" . $this->conn->error);
        }
    }

    public function deleteUser($user_id) {
        $sql = "DELETE FROM users WHERE id = $user_id";

        if($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
            exit;
        }else {
            die("Error deleting user:" . $this->conn->error);
        }
    }
}


?>