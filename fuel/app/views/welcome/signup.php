<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <?php echo Asset::css('styles.css'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="flex flex-col h-screen">
        <header class="mt30 flex justify-between p-4 border-b items-center">
            <h1 class="font-semibold text-xl leading-tight underline">withYou</h1>
        </header>
        <div class="bg-gray-100 flex-auto">
            <div class="flex justify-center mt-16">
                <div class="w-2/5 border bg-white">
                    <div class="my-12 text-center">
                        <h2 class="text-4xl font-bold">サインアップ</h2>
                        <p class="my-4">
                            <span class="font-semibold">ユーザー名</span>、
                            <span class="font-semibold">メールアドレス</span>、
                            <span class="font-semibold">パスワード</span>を入力してください
                        </p>
                        <form action="http://localhost/withyou/welcome/signup" method="post" accept-charset="utf-8">
                            <div class="mb-2 form-group">
                                <?php echo Form::input('username', null, ['id' => 'username', 'class' => "text-xl w-3/5 p-3 border rounded", 'placeholder' => 'username']); ?>
                            </div>
                            <div class="mb-2 form-group">
                                <?php echo Form::input('email', null, ['id' => 'email', 'class' => "text-xl w-3/5 p-3 border rounded", 'placeholder' => 'email']); ?>
                            </div>
                            <div class="mb-2 form-group">
                                <?php echo Form::input('password', null, ['id' => 'password', 'class' => "text-xl w-3/5 p-3 border rounded", 'placeholder' => 'password', 'type' => 'password']); ?>
                            </div>
                            <div class="font-semibold text-red-600">
                            <p><?php echo Session::get_flash('message') ?></p>
                            </div>
                            <button  class="bg-grn text-xl w-3/5  text-white py-2 rounded" name="submit">サインアップ</button>
                        </form>
                        <form action="http://localhost/withyou/welcome/signin" method="get">
                            <div>サインインは<button class="text-blue-400 underline hover:text-blue-800" >こちら</button>から</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
