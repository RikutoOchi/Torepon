// ページの一部だけをreloadする方法
// Ajaxを使う方法
// XMLHttpRequestを使ってAjaxで更新
function ajaxUpdate(url, element) {
 
    // urlを加工し、キャッシュされないurlにする。
    url = url + '?ver=' + new Date().getTime();
 
    // ajaxオブジェクト生成
    var ajax = new XMLHttpRequest;
 
    // ajax通信open
    ajax.open('GET', url, true);
 
    // ajax返信時の処理
    ajax.onload = function () {
 
        // ajax返信から得たHTMLでDOM要素を更新
        element.innerHTML = ajax.responseText;
    };
 
    // ajax開始
    ajax.send(null);
}
 
window.addEventListener('load', function () {
 
    var url = "chat_user_second_over.php";

    var url2 = "chat_text_second_over.php";

    var url3 = "news_second_time.php";
 
    var div = document.getElementById('ajaxreload');

    var div2 = document.getElementById('ajaxreload2');

    var div3 = document.getElementById('ajaxreload3');

    setInterval(function () {
        ajaxUpdate(url, div);
    }, 500);

    setInterval(function () {
        ajaxUpdate(url2, div2);
    }, 500);

    setInterval(function () {
        ajaxUpdate(url3, div3);
    }, 500);
 
});