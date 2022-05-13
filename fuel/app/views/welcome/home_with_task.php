<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <?php echo Asset::css('styles.css'); ?>
    <?php echo Asset::js('index.js'); ?>
    <script src="https://cdn.tailwindcss.com">
</script>
    <title>Document</title>
</head>
<body class="box-border">
    <div class="flex h-screen ">
        <!-- ------------------------------modals----------------------------------- -->
        <div id="category_modal" onclick="outClickCloseModal('category_modal')" class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-8 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('category_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">カテゴリの作成</h2>
                    <div class="mt-3 font-semibold">カテゴリ名</div>
                    <input type="text" placeholder="ex)買い物リスト" class="my-2 p-3 border border-solid border-gray-700 rounded">
                    <p class="text-gray-600">※スペースは入力できません<br>※1文字以上14文字以下で入力してください<br> ※同じカテゴリ名は入力できません</p>
                    <div class="flex justify-end">
                        <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn">作成</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="partner_modal" onclick='outClickCloseModal("partner_modal")' class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-8 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('partner_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">パートナーの登録</h2>
                    <div class="bg-gray-100 p-4 text-center w-1/2 mx-auto ">
                        <div class="font-semibold text-gray-500">あなたのid</div>
                        <div class="font-semibold">fenjnjnekjnajkvrjnr</div>
                    </div>
                    <p class="text-gray-600 pt-6">共有相手のidを入力してください</p>
                    <input type="text" class="my-2 p-3 border border-solid border-gray-700 rounded">
                    <div class="flex justify-end">
                        <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn">作成</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="delete_category_modal" onclick='outClickCloseModal("delete_category_modal")' class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-8 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('delete_category_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">カテゴリの削除</h2>

                    <p class="text-gray-600">本当に削除しますか？</p>
                    <div class="flex justify-end">
                        <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn">削除</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="change_username_modal" onclick='outClickCloseModal("change_username_modal")' class="hidden z-10 fixed top-0 left-0 h-full w-full flex items-center justify-center" style="background-color: rgba(0, 0, 0, 0.8);">
            <div id="modal_content"  class="z-20 bg-white w-1/3 rounded">
                <div class="flex flex-col text-black pt-2 pb-8 px-6 relative">
                    <div class="rounded w-6 text-l text-center shadow-btn absolute right-3 top-2" onclick="closeModal('change_username_modal')">×</div>
                    <h2 class="text-3xl font-extrabold text-center py-6">ユーザー名の変更</h2>
                    <div class="bg-gray-100 p-4 text-center w-1/2 mx-auto ">
                        <div class="font-semibold text-gray-500">あなたのユーザー名</div>
                        <div class="font-semibold">fenjnjnekjnajkvrjnr</div>
                    </div>
                    <p class="text-gray-600 pt-6">新しいユーザー名を入力してください</p>
                    <input type="text" class="my-2 p-3 border border-solid border-gray-700 rounded">
                    <div class="flex justify-end">
                        <button class="py-1 px-6 rounded bg-yellow-500 text-white font-bold shadow-btn">変更</button>
                    </div>
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
                <div class="text-base font-normal px-2">
                </div>
            </div>

            <div class="flex items-center selectable-grn w-full mt-5 my-10 py-2 rounded pl-2" onclick="showPopup('setting')">
                    <?php echo Asset::img('gear.svg', array('width'=>'25','height'=>'25','alt'=>'設定アイコン')); ?>
                    <div class="text-lg text-center ml-2">設定</div>
            </div>

            <button  class=" w-4/5 px-2 py-4  bg-gray-500 rounded-xl ml-5">サインアウト</button>
        </div>

        <!-- ------------------------------Main----------------------------------- -->
        <div class="flex-grow bg-gray-100 w-4/5">
            <header class="border-b border-gray-400 fixed bg-gray-100 w-4/5">
                <div class="flex justify-between m-3">
                    <div class="font-bold text-3xl ml-2 mt-2">#買い物</div>
                    <div class="flex justify-between">
                        <input type="text" class=" border border-gray-600 rounded-md">
                        <button class="ml-2 px-2 bg-light-grn text-white rounded-md">追加</button>
                    </div>
                </div>
            </header>
            <div class="flex-col overflow-y-scroll h-full pt-20">
                <div class="flex bg-gray-grn items-center rounded-2xl py-4 mt-4 mx-auto w-11/12 px-4  justify-between">
                    <div class="flex items-center">
                        <?php echo Asset::img('check_point.svg', array('width'=>'40','height'=>'40','alt'=>'タスク完了ボタン')); ?>
                        <div class="text-xl font-medium pl-2">kmkjdvldvsajncjdnvdjkncvjklN Vjklvkvvavmvmkvnkvnknvkwv</div>
                    </div>
                    <div class="font-bold  text-xs flex bg-user1 rounded p-2 mr-8">kotaro0530</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
