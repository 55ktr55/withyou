<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

use \Model\TestModel;


class Controller_Welcome extends Controller_Rest
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */

	public $error_message = "";


	public function get_home($error_message=null)
	{
		if(!Auth::check())
		{
			return Response::redirect('welcome/signin');
		}
		$error_message_decoded = urldecode($error_message);
		$data = array();
		$data["email"] = Auth::get_email();
		$data["username"] = Auth::get('username');
		if(\Auth::get("pair_id") == 0)
		{
			$data["current_partner"] = "未登録";
		}else
		{
			$data["current_partner"] = TestModel::get_partner_username();
		}
		$categories = TestModel::get_categories();
		if(count($categories) > 0)
		{
			$categories = json_encode($categories);
			echo <<<EOM
			<script type="text/javascript">
			var categories = $categories;
			document.addEventListener('DOMContentLoaded', () => {
				showCategories($categories);
				showHomeWithTask();
				showResultMessageModal('$error_message_decoded');
			});
			</script>
			EOM;
		}else{
			echo <<<EOM
			<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', () => {
				showHomeWithoutTask();
				showResultMessageModal('$error_message_decoded');
			});
			</script>
			EOM;
		}
		return Response::forge(View::forge('welcome/home', $data));
	}

	public function get_signin()
	{
		$result = TestModel::delete_completed_task();
		if(Auth::check())
		{
			return Response::redirect('welcome/home');
		}else{
			return Response::forge(View::forge('welcome/signin'));
		}
	}

	public function get_signup()
	{
		return Response::forge(View::forge('welcome/signup'));

	}

	public function get_signout()
    {
		$result = TestModel::delete_completed_task();
		Auth::logout();
        if (!Auth::check())
        {
            Response::redirect('welcome/signin');
        }
        else
        {
            Session::set_flash('error', 'Logout failed.');
            return Response::forge(View::forge('welcome/home'));
        }
    }


	public function post_signin()
	{
		if (empty($_POST['username']) || empty($_POST['password']))
		{
			Session::set_flash('message', '入力は全て必須です');
			return Response::forge(View::forge('welcome/signin'));
		}

		if(Auth::login($_POST['username'], $_POST['password']))
		{
			return Response::redirect('welcome/home/' . $this->error_message );
		}else{
			Session::set_flash('message', 'ユーザー名またはパスワードが不正です');
			return Response::forge(View::forge('welcome/signin'));
		}
	}

	public function post_signup()
	{
		if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']))
		{
			Session::set_flash('message', '入力は全て必須です');
			return Response::forge(View::forge('welcome/signup'));
		}

		try
		{
			Auth::create_user($_POST['username'],$_POST['password'],$_POST['email'],1);
			Auth::login($_POST['username'], $_POST['password']);
		} catch (Exception $e)
		{
			var_dump($e->getMessage());
			Session::set_flash('message', 'そのユーザーは登録できません');
			return Response::forge(View::forge('welcome/signup'));
		}

		return Response::redirect('/welcome/home');
	}

	public function post_change_password()
	{
		if (empty($_POST['old_password']) || empty($_POST['new_password']))
		{
			$this->error_message = "入力は必須です";
		}else
		{
			$result = Auth::change_password($_POST['old_password'], $_POST['new_password']);
			if($result)
			{
				$this->error_message = "正常に変更されました";
			}else{
				$this->error_message = "そのパスワードには変更できません";
			}
		}
		return Response::redirect('welcome/home/' . $this->error_message );
	}

	public function post_register_partner()
	{
		if (empty($_POST['email']))
		{
			$this->error_message = "入力は必須です";
		}else
		{
			$partner_id = TestModel::partner_exists($_POST['email']);
			if($partner_id && strcmp(Auth::get('id'), $partner_id))
			{
				$result = TestModel::register_partner(Auth::get('id'), $partner_id);
				$this->error_message = $result ? "正常に登録されました！" : "不正な入力です";
			}else
			{
				$this->error_message = "存在しないユーザーです";
			}
		}
		return Response::redirect('welcome/home/' . $this->error_message);
	}

	public function post_create_category()
	{
		if (empty($_POST['category_name']) || str_contains($_POST['category_name'], " ") || str_contains($_POST['category_name'], "　") || mb_strlen($_POST['category_name']) > 14)
		{
			$this->error_message ="不正な入力です";
		}
		elseif(!Auth::get('pair_id'))
		{
			$this->error_message ="まずはパートナーを登録してください";
		}
		else
		{
			$category_exists = TestModel::category_exists($_POST['category_name']);
			if($category_exists)
			{
				$this->error_message ="既存のカテゴリと同名のカテゴリは作成できません";
			}
			else
			{
				$result = TestModel::create_category($_POST['category_name']);
			}
		}
		return Response::redirect('welcome/home/' . $this->error_message );
	}

	public function post_change_category_name($old_category_name)
	{
		if(empty($_POST['new_category_name']))
		{
			$this->error_message ="入力は必須です";
		}elseif (str_contains($_POST['new_category_name'], " ") || str_contains($_POST['new_category_name'], "　")) {
			$this->error_message ="スペースは入力できません";
		}elseif (mb_strlen($_POST['new_category_name']) > 15)
		{
			$this->error_message = "15文字以下で入力してください" ;
		}else
		{
			$category_exists = TestModel::category_exists($_POST['ncategory_name']);
			if($category_exists)
			{
				$this->error_message ="既存のカテゴリと同名のカテゴリは作成できません";
			}
			else
			{
				$result = TestModel::change_category_name($old_category_name, $_POST['new_category_name']);
			}
		}
		return Response::redirect('welcome/home/' . $this->error_message );
	}

	public function post_delete_category($category_name)
	{
		$category_id = TestModel::get_category_id($category_name);
		$result = TestModel::delete_category($category_id);
		if(!$result)
		{
			$this->error_message = "カテゴリの削除に失敗しました";
		}
		return Response::redirect('welcome/home/' . $this->error_message );
	}

	public function post_add_task()
    {
        $category_name = Input::post('category_name');
        $task_content = Input::post('task_content');
        $tasks = TestModel::add_task($category_name, $task_content);
        return $this->response("ok", 200);
	}

	public function post_get_tasks()
    {
        $category_id = TestModel::get_category_id(Input::post('category_name'));
        $tasks = TestModel::get_tasks($category_id);
        return $this->response($tasks, 200);
    }


    public function post_complete_task()
    {
        $task_id = Input::post('task_id');
        $result = TestModel::complete_task($task_id);
        return $this->response($result, 200);
	}



}
