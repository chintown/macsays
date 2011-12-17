javascript:(function(){
function post_to_url(path, params, method) {
    method = method || "post"; 
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);
    form.setAttribute("target", "_text2speech");
    for(var key in params) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", params[key]);
        form.appendChild(hiddenField);
    }
    document.body.appendChild(form);
    form.submit();
}
function ajax_post(path, params) {
    var http = new XMLHttpRequest();
    var param = "";
    for(var key in params) {
        param += '&'+key+'='+params[key];
    }
    http.open("POST", path, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.setRequestHeader("Content-length", param.length);
    http.setRequestHeader("Connection", "close");
    http.send(param);
}

function get_selection(){
    var txt = '';
    if (window.getSelection) {
        txt = window.getSelection();
    } else if (document.getSelection){
        txt = document.getSelection();
    } else if (document.selection){
        txt = document.selection.createRange().text;
    }
    return txt;
}
var txt = get_selection();
ajax_post("http://localhost/~chintown/service/t2s/t2s.php", {"s": txt});
})()