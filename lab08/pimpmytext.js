function onclick_event(){
    var text = document.getElementById("text");
    text.innerHTML = "Here is the sample text. Let's see if the 'Bigger Pimpin'!' button works!";
    bigtime();
}
function bigger() {
    var size = parseInt(text.style.fontSize) + 2;
    text.style.fontSize = size + "pt";
}

function bigtime() {

    text.style.fontSize = "12pt";
    setInterval("bigger()", 500);
}
function change(){
    var text1 = document.getElementById("text");
    var text2 = document.getElementById("Bling");
    console.log(text2.checked);
    if(text2.checked == true){
        text1.style.fontWeight = "Bold";
        text1.style.color = "green";
        text1.style.textDecoration = "underline";
    } else {
        text1.style.fontWeight = "";
        text1.style.color = "";
        text1.style.textDecoration = "";
    }
    
}
function snoof(){
    var text = document.getElementById("text");
    text.innerHTML = "Here is the sample text. Let's see if the 'Bigger Pimpin'!' button works!";
    var text2 = text.innerHTML.toUpperCase();
    var a = text2.split(".");
    text.innerHTML = a.join("-izzle.")
}


