/**
 * Created by chen on 2017/2/14.
 */
function getDb() {
    //打开数据库，或者直接连接数据库参数：数据库名称，版本，概述，大小
    //如果数据库不存在那么创建之
    var db = openDatabase("tiku", "1.0", "it's to save topic data!", 1024 * 1024); ;
    return db;
}

function insertData(table,data){
    var sql="insert into "+table+" ( ";
    var v=" values ( ";
    var val=[];
    for(var key in data){
        sql=sql+key+",";
        v=v+"?,";
        val.push(data[key]);
    }
    sql=sql.substr(0, sql.length - 1)+" ) ";
    v=v.substr(0, v.length - 1)+" ) ";
    sql=sql+v;
    var rt=[];
    rt[0]=sql;
    rt[1]=val;
    return rt;
}

function updateData(table,data,where){
    var sql="UPDATE "+table+" SET ";

    var val=[];
    for(var key in data){
        sql=sql+key+"= ? ,";
        val.push(data[key]);
    }
    sql=sql.substr(0, sql.length - 1)+" WHERE  "+ where;

    var rt=[];
    rt[0]=sql;
    rt[1]=val;
    return rt;
}

function toJsonArr(data) {
    var list=[];
    for(var i=0,l=data.length;i<l;i++){
        var item = {};
        var d = data[i];
        for(var key in d){
            item[key]=d[key];
        }
        list.push(item);
    }
    return list;
}
