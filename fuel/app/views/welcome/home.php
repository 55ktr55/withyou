<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <?php echo Asset::css('styles.css'); ?>
    <?php echo Asset::js('knockout-3.5.1.js'); ?>
    <?php echo Asset::js('jquery-3.6.0.min.js'); ?>
    <?php echo Asset::js('index.js'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="cursor-default">
    <div  class="flex h-screen">
        <!-- ------------------------------modals----------------------------------- -->
        <div id="change_category_name_modal" onclick="outClickCloseModal('change_category_name_modal')" class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-8 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('change_category_name_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">カテゴリ名の変更</h2>
                    <div class="mt-3 font-semibold">新しいカテゴリ名を入力してください</div>
                    <form id="change_category_name_form" action="http://localhost/withyou/welcome/change_category_name" method="post" accept-charset="utf-8">
                        <?php echo Form::input('new_category_name', null, ['class' => "my-2 p-3 border border-solid border-gray-700 rounded w-full", 'type' => 'text', 'placeholder' => 'ex)買い物リスト']); ?>
                        <p class="text-gray-600">※スペースは入力できません<br>※1文字以上14文字以下で入力してください<br> ※同じカテゴリ名は入力できません</p>
                        <div class="flex justify-end">
                            <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn" name="submit">変更</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="category_modal" onclick="outClickCloseModal('category_modal')" class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-8 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('category_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">カテゴリの作成</h2>
                    <div class="mt-3 font-semibold">カテゴリ名</div>
                    <form action="http://localhost/withyou/welcome/create_category" method="post" accept-charset="utf-8">
                        <?php echo Form::input('category_name', null, ['id' => 'category_name', 'class' => "my-2 p-3 border border-solid border-gray-700 rounded w-full", 'type' => 'text', 'placeholder' => 'ex)買い物リスト']); ?>
                        <p class="text-gray-600">※スペースは入力できません<br>※1文字以上14文字以下で入力してください<br> ※同じカテゴリ名は入力できません</p>
                        <div class="flex justify-end">
                            <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn" name="submit">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="partner_modal" onclick='outClickCloseModal("partner_modal")' class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-8 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('partner_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">パートナーの登録</h2>
                    <div class="bg-gray-100 p-4 text-center w-2/3 mx-auto  text-center">
                        <div class="font-semibold text-gray-500">あなたのメールアドレス</div>
                        <div class="font-semibold text-center w-full break-all">
                            <?php echo $email; ?>
                        </div>
                    </div>
                    <div id="partner_name" class="font-semibold pt-4"><?php echo $current_partner; ?></div>
                    <form id="register_form" action="http://localhost/withyou/welcome/register_partner" method="post" accept-charset="utf-8">
                        <p class="text-gray-600 pt-2">共有相手のメールアドレスを入力してください</p>
                        <?php echo Form::input('email', null, ['id' => 'email', 'class' => "my-2 p-3 border border-solid border-gray-700 rounded w-full", 'type' => 'text']); ?>
                        <div class="flex justify-end">
                            <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn" name="submit">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="result_message_modal" onclick='outClickCloseModal("result_message_modal")' class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-4 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('result_message_modal')">×</div>
                    <h2 id="result_message_title" class="text-3xl font-extrabold text-center py-6"></h2>
                    <p id="result_message_content" class="text-gray-600 text-center font-semibold mb-6"></p>
                    <div class="flex justify-end">
                        <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn" onclick="closeModal('result_message_modal')">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="delete_category_modal" onclick='outClickCloseModal("delete_category_modal")' class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-4 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('delete_category_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">カテゴリの削除</h2>
                    <p class="text-gray-600 text-center font-semibold mb-6 mt-2">本当に削除しますか？</p>
                    <div class="flex justify-end">
                        <form id="delete_category_btn" action="http://localhost/withyou/welcome/delete_category">
                            <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn" type="submit" name="delete">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="change_password_modal" onclick='outClickCloseModal("change_password_modal")' class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-8 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('change_password_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">パスワードの変更</h2>
                    <form  action="http://localhost/withyou/welcome/change_password" method="post" accept-charset="utf-8">
                        <p class="text-gray-600 pt-6">現在のパスワードを入力してください</p>
                        <?php echo Form::input('old_password', null, ['class' => "my-2 p-3 border border-solid border-gray-700 rounded w-full", 'type' => 'password']); ?>
                        <p class="text-gray-600 pt-3">新しいパスワードを入力してください</p>
                        <?php echo Form::input('new_password', null, ['class' => "my-2 p-3 border border-solid border-gray-700 rounded w-full", 'type' => 'password']); ?>
                        <div class="flex justify-end">
                            <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn" name="submit">変更</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- ------------------------------sideBar----------------------------------- -->
        <div  class="w-1/5 bg-grn text-white px-4  items-center font-semibold">
            <h1 class="h-1/6 text-center text-3xl pt-10 underline">withYou</h1>

            <div class="h-1/2 pl-2">
                <div class="flex items-center pb-2 justify-between group">
                    <div class="flex">
                        <?php echo Asset::img('folder.png', array('width'=>'25','height'=>'25','alt'=>'カテゴリアイコン')); ?>
                        <div class="text-lg text-center ml-2">カテゴリ</div>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 icon p-1 rounded" onclick="openModal('category_modal')">
                        <?php echo Asset::img('plus.svg', array('width'=>'15','height'=>'15','alt'=>'カテゴリ作成アイコン')); ?>
                    </div>
                </div>
                <div data-bind="foreach: items" id="categories" class="text-base font-normal px-2" >
                    <div class="flex justify-between group items-center rounded selectable-grn category_el">
                        <div data-bind="text:  '＃ ' + $data"></div>
                        <div id="three_dots_el" class="opacity-0 group-hover:opacity-100 p-1 rounded icon-grn" onclick="showPopup('category')">
                            <img width="13" height="13" alt="カテゴリ設定アイコン" src="http://localhost/withyou/assets/img/three_dots.svg?1650859829">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center selectable-grn w-full mt-5 my-10 py-2 rounded pl-2" onclick="showPopup('setting')">
                    <?php echo Asset::img('gear.svg', array('width'=>'25','height'=>'25','alt'=>'設定アイコン')); ?>
                    <div class="text-lg text-center ml-2">設定</div>
            </div>
            <form action="http://localhost/withyou/welcome/signout" >
                <button  class=" w-4/5 px-2 py-4  bg-gray-500 rounded-xl ml-5 shadow-btn" >サインアウト</button>
            </form>
        </div>

        <!-- ------------------------------Main----------------------------------- -->
        <div id="home_without_task" class="text-xl mx-auto my-auto flex-col text-black">
            <div class="bg-red-500 bg-opacity-60 my-10 px-6 py-8 rounded-3xl">
                <div class="flex items-center">
                    <?php echo Asset::img('people.svg', array('width'=>'60','height'=>'60','alt'=>'人アイコン')); ?>
                    <div class="ml-8">
                        <h4 class="underline text-3xl font-bold">①パートナー登録</h4>
                        <span class="font-normal">タスクを共有する<br>パートナーを登録しましょう</span>
                    </div>
                </div>
            </div>
            <div class="bg-red-500 bg-opacity-60 my-10 px-6 py-8 rounded-3xl ">
                <div class="flex items-center">
                    <?php echo Asset::img('folder.png', array('width'=>'60','height'=>'60','alt'=>'カテゴリアイコン')); ?>
                    <div class="ml-8">
                        <h4 class="underline text-3xl font-bold">②カテゴリの作成</h4>
                        <span class="font-normal">タスクの分類を<br>作成しましょう</span>
                    </div>
                </div>
            </div>
            <div class="bg-red-500 bg-opacity-60 my-10 px-6 py-8 rounded-3xl ">
                <div class="flex items-center">
                    <?php echo Asset::img('check_point_white.svg', array('width'=>'60','height'=>'60','alt'=>'タスク完了ボタン')); ?>
                    <div class="ml-8">
                        <h4 class="underline text-3xl font-bold">③タスクの追加</h4>
                        <span class="font-normal">共有したい <br>タスクを追加しましょう</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="home_with_task" class="flex-grow bg-gray-100 w-4/5 h-full text-black">
            <div class="flex justify-between mt-4 px-3 border-b border-gray-400 h-header">
                <div id="current_category_name" class="font-bold text-3xl ml-2 mt-2"></div>
                <form onsubmit="return add_task()">
                    <div class="flex">
                        <input class="p-3 border border-gray-600 rounded-md" id="add_task_form_content" >
                        <button class="ml-2 px-2 bg-light-grn text-white rounded-md shadow-btn" onclick="addTask()">追加</button>
                    </div>
                </form>
            </div>
            <div id="tasks" class="flex-col overflow-auto h-main"></div>
        </div>
    </div>
</body>
</html>
