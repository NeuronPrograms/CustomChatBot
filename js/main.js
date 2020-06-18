
var node = document.getElementById("inp");
node.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        // Do more work
        callAjax("api/?q=" + document.getElementById('inp').value, add_answer);
        add_answer(document.getElementById('inp').value, 'me')
        document.getElementById('inp').value = "";
    }
});



function add_answer(an, cl) {
    var ul = document.getElementById("list");
    var listItem = document.createElement('li');
    listItem.appendChild(document.createTextNode(an));
    listItem.className = cl;
    ul.appendChild(listItem);
    var objDiv = document.getElementById("main_div");
    objDiv.scrollTop = objDiv.scrollHeight;

}



function callAjax(url, callback) {
    var xmlhttp;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            callback(JSON.parse(xmlhttp.responseText).data, 'him');
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}
   