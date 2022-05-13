<?php

namespace Model;


class TestModel extends \Model {

public static function get_partner_username()
{
    $pair_id = \Auth::get("pair_id");
    if($pair_id == 0) {
        return "未登録";
    }else {
        $query = \DB::select('username')->from('users')->where_open()->where('pair_id', \Auth::get('pair_id'))->and_where('id', "!=", \Auth::get('id'))->where_close();
        return $query->execute()->as_array()[0]['username'];
    }
}

public static function get_category_id($category_name)
{
    return \DB::select('id')->from('category')->where_open()->where('pair_id', \Auth::get('pair_id'))->and_where('name', $category_name)->where_close()->execute()->as_array('id');
}

public static function get_categories()
{
    $categories = \DB::select('name')->from('category')->where('pair_id', \Auth::get('pair_id'))->execute()->as_array('name');
    return array_keys($categories);
}

public static function get_tasks($category_name)
{
    $category_id = TestModel::get_category_id($category_name);
    $tasks = \DB::select(array('task.id', 'id'), 'content', array('users.username', 'created_by'))
    ->from('task')
    ->join('users', 'LEFT')->on('users.id', '=', 'task.user_id')
    ->where_open()
    ->where('done', 0)
    ->where('category_id', $category_id)
    ->where_close()
    ->execute()
    ->as_array();
    return $tasks;
}


public static function register_partner($user_email, $partner_email)
{
    $query1 = \DB::select('id')->from('users')->where('email', $partner_email)->execute()->as_array();
    if(empty($query1)){
        return 1;
    }else{
        $user_id = \Auth::get("id");
        $partner_id = $query1[0]['id'];
        if($user_id == $partner_id){
            return 3;
        }
    }
    $max_pair_id = \DB::query('SELECT MAX("pair_id") FROM users')->execute()->as_array()[0];
    $max_pair_id = intval($max_pair_id) + 1;
    $query3 = \DB::update('users')->value('pair_id', $max_pair_id)->where('id', $user_id)->execute();
    $query4 = \DB::update('users')->value('pair_id', $max_pair_id)->where('id', $partner_id)->execute();
    return $query3 + $query4;
}

public static function create_category($category_name)
{
    $categories = \DB::select('name')->from('category')->where('pair_id', \Auth::get('pair_id'))->execute()->as_array('name');
    foreach($categories as $key => $value){
        if(strcmp($key, $category_name) == 0) return false;
    }
    $query2 = \DB::insert('category')->set(array(
        "name" => $category_name,
        "pair_id" => \Auth::get('pair_id'),
        "created_at" => time()
    ))->execute();
    return true;
}

public static function change_category_name($old_category_name, $new_category_name)
{
    $categories = \DB::select('name')->from('category')->where('pair_id', \Auth::get('pair_id'))->execute()->as_array('name');
    foreach($categories as $key => $value){
        if(strcmp($key, $new_category_name) == 0) return false;
    }
    $result = \DB::update('category')->value('name', $new_category_name)->where_open()->where('pair_id', \Auth::get('pair_id'))->and_where('name', $old_category_name)->where_close()->execute();
    return $result > 0;
}

public static function delete_category($category_name)
{
    $category_id = TestModel::get_category_id($category_name);
    $query = \DB::delete('category')->where_open()->where('pair_id', \Auth::get('pair_id'))->and_where('name', $category_name)->where_close()->execute();
    $query = \DB::delete('task')->where('category_id', $category_id)->execute();
    return $query > 0;
}

public static function add_task($category_name, $task_content)
{
    $category_id = TestModel::get_category_id($category_name);
    $result = \DB::insert('task')->set(array(
        "content" => $task_content,
        "category_id" => $category_id,
        "user_id" => \Auth::get('id'),
        "done" => 0,
        "created_at" => time()
    ))->execute();
    return $result[1] > 0;
}

public static function complete_task($task_id)
{
    $query = \DB::update('task')->value('done', 1)->where('id', $task_id)->execute();
    return $query;
}

public static function delete_completed_task()
{
    $query = \DB::delete('task')->where_open()->where('user_id', \Auth::get('id'))->and_where('done', 1)->where_close()->execute();
    return $query;
}
}