<?php
require_once 'Config.php';
function exesql($sql)
{
    $connection = mysqli_connect(Config::$dbHost, Config::$dbUser, Config::$dbPwd,Config::$dbName);
    mysqli_query($connection,"set names 'utf8'");
    //mysql_query("SET CHARACTER SET utf8");
    if (! $connection) {
        return ('Could not connect: ' . mysqli_connect_error());
    }

    $rt = mysqli_query($connection,$sql);
    if ($rt) {
        if ($rt == "true") {
            $results = mysqli_affected_rows($connection);
        } else {
            $rows = array();
            while ($row = mysqli_fetch_array($rt, MYSQL_ASSOC)) {
                $rows[] = $row;
            }
            $results = $rows;
        }
    } else {
        $results = mysqli_error($connection);
    }

    mysqli_close($connection);
    return $results;
}

function query($sql)
{
    $connection = mysqli_connect(Config::$dbHost, Config::$dbUser, Config::$dbPwd,Config::$dbName);
    mysqli_query($connection,"set names 'utf8'");
    //mysql_query("SET CHARACTER SET utf8");
    if (! $connection) {
        return ('Could not connect: ' . mysqli_connect_error($connection));
    }

    $rt = mysqli_query($connection,$sql);

    if ($rt) {
        if ($rt == "true") {
            $results = mysqli_affected_rows($connection);
            $results=mysqli_query($connection,"SELECT LAST_INSERT_ID()");
            $results = mysqli_fetch_array($results);
            $results=$results[0];
        } else {
            $rows = array();
            while ($row = mysqli_fetch_array($rt, MYSQL_ASSOC)) {
                $rows[] = $row;
            }
            $results = $rows;
        }
    } else {
        $results = mysqli_error($connection);
    }

    mysqli_close($connection);
    return $results;
}
