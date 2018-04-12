<?php
require_once 'Config.php';
function exesql($sql)
{
    //$connection = mysqli_connect(Config::$dbHost, Config::$dbUser, Config::$dbPwd, Config::$dbName);
    mysqli_query("set names 'utf8'");
    //mysql_query("SET CHARACTER SET utf8");
    if (! $connection) {
        return ('Could not connect: ' . mysqli_connect_error());
    }


    $db_selected = mysql_select_db(Config::$dbName, $connection);
    if (! $db_selected) {
        mysql_close($connection);
        return ("Can\'t use test_db : " . mysql_error());
    }

    $rt = mysql_query($sql);
    if ($rt) {
        if ($rt == "true") {
            $results = mysql_affected_rows();
        } else {
            $rows = array();
            while ($row = mysql_fetch_array($rt, MYSQL_ASSOC)) {
                $rows[] = $row;
            }
            $results = $rows;
        }
    } else {
        $results = mysql_error();
    }

    mysql_close($connection);
    return $results;
}

function query($sql)
{
    $connection = mysql_connect(Config::$dbHost, Config::$dbUser, Config::$dbPwd);
    mysql_query("set names 'utf8'");
    //mysql_query("SET CHARACTER SET utf8");
    if (! $connection) {
        return ('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db(Config::$dbName, $connection);
    if (! $db_selected) {
        mysql_close($connection);
        return ("Can\'t use test_db : " . mysql_error());
    }

    $rt = mysql_query($sql);

    if ($rt) {
        if ($rt == "true") {
            $results = mysql_affected_rows();
            $results=mysql_query("SELECT LAST_INSERT_ID()");
            $results = mysql_fetch_array($results);
            $results=$results[0];
        } else {
            $rows = array();
            while ($row = mysql_fetch_array($rt, MYSQL_ASSOC)) {
                $rows[] = $row;
            }
            $results = $rows;
        }
    } else {
        $results = mysql_error();
    }

    mysql_close($connection);
    return $results;
}
