function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}

function outClickCloseModal(modalId) {
    var e = window.event;
    if(e.target.closest('#modal_content') === null) {
        document.getElementById(modalId).classList.add('hidden');
    }
}

function showPopup(popupOf) {
    let popup_el = document.getElementById(popupOf);
    if(popup_el != null) {
        popup_el.classList.remove('hidden');
        return 0;
    }
    var div_gp = document.createElement('div');
    var div_p = document.createElement('div');
    var div_c1 = document.createElement('div');
    var div_c2 = document.createElement('div');
    div_gp.classList.add("z-10", "fixed", "top-0", "left-0", "h-screen", "w-full");
    div_p.classList.add("flex-col", "z-10", "rounded-xl", "fixed", "text-center", "bg-gray-100", "py-2", "w-1/6", "border", "border-gray-300");
    div_c1.classList.add("border-b", "border-gray-200", "hover:bg-blue-400", "hover:text-white");
    div_c2.classList.add("hover:bg-blue-400", "hover:text-white");

    div_gp.id = popupOf;
    div_p.id = "modal-content";



    div_gp.appendChild(div_p);
    div_p.appendChild(div_c1);
    div_p.appendChild(div_c2);
    document.body.appendChild(div_gp);

    var e = window.event;
    var clientRect = e.target.getBoundingClientRect();

    switch (popupOf) {
        case 'category':
            div_c1.innerHTML = "名前の変更";
            div_c2.innerHTML = "カテゴリの削除";
            div_p.style.left = clientRect.left + "px";
            div_p.style.top = clientRect.top + 20 + "px";

            // action_delete_categoryの引数にカテゴリ名設定
            if(event.target.tagName == "IMG"){
                var target_el = event.target.parentNode.previousElementSibling;
            }else{
                var target_el = event.target.previousElementSibling;
            }
            document.getElementById("delete_category_btn").action += "/" + target_el.textContent.replace("＃ ", "");
            document.getElementById("change_category_name_form").action += "/" + target_el.textContent.replace("＃ ", "");

            div_c1.addEventListener("click", function(){
                openModal("change_category_name_modal");
            });
            div_c2.addEventListener("click", function(){
                openModal("delete_category_modal");
            });
            break;
        case 'setting':
            div_c1.innerHTML = "パスワードの変更";
            div_c2.innerHTML = "パートナーの登録";
            div_p.style.left = clientRect.left + 200 + "px";
            div_p.style.top = clientRect.top + 50 + "px";
            div_c1.addEventListener("click", function(){
                openModal("change_password_modal");
            });
            div_c2.addEventListener("click", function(){
                openModal("partner_modal");
            });
            break;
    }

    div_gp.addEventListener("click", function () {
        outClickCloseModal(popupOf);
    });
}

function showHomeWithoutTask() {
    var wotask_el = document.getElementById("home_without_task");
    var wtask_el = document.getElementById("home_with_task");
    wtask_el.classList.add("hidden");
    wotask_el.classList.remove("hidden");
}

function showHomeWithTask() {
    var wotask_el = document.getElementById("home_without_task");
    var wtask_el = document.getElementById("home_with_task");
    wotask_el.classList.add("hidden");
    wtask_el.classList.remove("hidden");
    var top_category_name = document.getElementById("categories").firstElementChild.firstElementChild.textContent.replace("＃ ", "")
    showMainScreen(top_category_name);
}

function showResultMessageModal(message){
    if(message != ""){
        if(message.indexOf("正常に") == -1){
            document.getElementById("result_message_title").textContent = "Error!";
        }else{
            document.getElementById("result_message_title").textContent = "Success!";
        }
        document.getElementById("result_message_content").textContent = message;
        document.getElementById("result_message_modal").classList.remove("hidden");
    }
}

function highlightCategory(category_name){
    var categories = document.getElementById("categories").children;
    categories = Array.prototype.slice.call(categories);
    var target_category = "";
    categories.forEach(category => {
        category.classList.remove("bg-highlight-red","selectable-red");
        category.lastElementChild.classList.remove("icon-red");
        category.classList.add("selectable-grn");
        category.lastElementChild.classList.add("icon-grn");
        if(category.firstElementChild.textContent == "＃ " + category_name){
            target_category = category;
        }
    });
    target_category.classList.remove("selectable-grn");
    target_category.classList.add("bg-highlight-red","selectable-red");
    target_category.lastElementChild.classList.remove("icon-grn");
    target_category.lastElementChild.classList.add("icon-red");
}

function showTasks(tasks) { //tasksはid,content,created_byの連想配列
    var tasks_el = document.getElementById("tasks");
    while( tasks_el.firstChild ){
        tasks_el.removeChild( tasks_el.firstChild );
    }
    if(tasks){
        tasks.forEach(task => {
            var task_el = document.createElement('div');
            var check_img = document.createElement('img');
            var content_and_check_el = document.createElement('div');
            var task_content_el = document.createElement('div');
            var created_by_el = document.createElement('div');

            task_el.classList.add("flex", "bg-gray-grn", "items-center", "rounded-2xl", "mt-4", "mx-auto", "w-11/12", "p-4", "justify-between", "hidden-transition1");
            content_and_check_el.classList.add("flex", "items-center", "hidden-transition2", "h-10");
            task_content_el.classList.add("text-xl", "font-medium", "pl-4");
            task_content_el.textContent = task['content'];
            created_by_el.textContent = task['created_by'];
            const partner_name = document.getElementById("partner_name").textContent.replace("パートナー：", "");
            if(task['created_by'] == partner_name){
                created_by_el.classList.add("font-bold", "text-xs", "flex", "rounded", "hidden-transition2", "h-8", "mr-8", "px-4", "items-center", "bg-user1");
            }else{
                created_by_el.classList.add("font-bold", "text-xs", "flex", "rounded", "hidden-transition2", "h-8", "mr-8", "px-4", "items-center", "bg-user2");
            }
            check_img.setAttribute("width", "40");
            check_img.setAttribute("height", "40");
            check_img.setAttribute("alt", "タスク完了ボタン");
            check_img.setAttribute("src", "http://localhost/withyou/assets/img/check_point_white.svg?1652346685");
            check_img.addEventListener("click", function() {
                var post_data = {
                    "task_id": task['id']
                };
                $.ajax({
                    url: location.origin + "/withyou/welcome/complete_task.json",
                    type: 'POST',
                    dataType: 'json',
                    data: post_data,
                }).done(function() {
                    check_img.setAttribute("src", "http://localhost/withyou/assets/img/check_point_blue.svg?1652346685");
                    task_el.classList.add("hidden-task");
                    content_and_check_el.classList.add("hidden-task");
                    created_by_el.classList.add("hidden-task");
                }).fail(function() {
                    alert('タスクを完了できません');
                });
            });
            content_and_check_el.appendChild(check_img);
            content_and_check_el.appendChild(task_content_el);
            task_el.appendChild(content_and_check_el);
            task_el.appendChild(created_by_el);
            tasks_el.appendChild(task_el);
        });
    }else{
        var no_task_message = document.createElement('div');
        no_task_message.classList.add("py-4", "mx-auto", "w-11/12", "px-4", "text-center", "text-2xl", "text-gray-700", "my-64", "font-bold");
        no_task_message.textContent = "未完了のタスクはありません";
        tasks_el.appendChild(no_task_message);
    }
}

function showCategories(categories) {
    ko.applyBindings({
        items: categories
    });
    const category_els = document.getElementsByClassName("category_el");
    console.log(category_els)
    for( let i = 0 ; i < category_els.length ; i ++ ) {
        category_els[i].addEventListener('click', function() {
            var category_name = event.currentTarget.firstElementChild.textContent;
            showMainScreen(category_name.replace("＃ ", ""));
        });
    }
}

function showMainScreen(category_name){
    document.getElementById("current_category_name").textContent = "＃ " + category_name;
    highlightCategory(category_name);
    //Ajaxでカテゴリ名送信、タスクリスト受信
    var post_data = { "category_name": category_name};
    $.ajax({
        url: location.origin + "/withyou/welcome/get_tasks.json",
        type: 'POST',
        dataType: 'json',
        data: post_data,
    }).done(function(data) {
        showTasks(data);
    }).fail(function() {
        console.log('失敗・・');
    });
}

function addTask(){
    event.preventDefault();
    var task_content = document.getElementById("add_task_form_content").value;
    var category_name = document.getElementById("current_category_name").textContent.replace("＃ ", "")
    var post_data = {
        "task_content": task_content,
        "category_name": category_name
    };
    $.ajax({
        url: location.origin + "/withyou/welcome/add_task.json",
        type: 'POST',
        dataType: 'json',
        data: post_data,
    }).done(function(data) {
        showMainScreen(category_name);
        document.getElementById("add_task_form_content").value = "";
    }).fail(function() {
        alert('タスクの追加に失敗しました');
    });
    return false;  //enter key でも発火させるため
}

var viewModel = {
    items: ko.observableArray([]),
};
