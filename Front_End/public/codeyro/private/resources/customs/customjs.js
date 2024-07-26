var SUCCESS = 200;

function GetInputData(element){
    const formData = new FormData(element);
    const data = Object.fromEntries(formData.entries());
    return data;
}

function GetFormData(attr){
    var element = document.querySelector(attr);
    const formData = new FormData(element);
    const data = Object.fromEntries(formData.entries());
    return data;
}

function GetValueById(id, datatype="string"){
    $ret = null;
    $value = document.getElementById(id).value;
    switch (datatype) {
        case "string": $ret = $value+""; break;
        case "int": $ret = parseInt($value); break;
        case "float": $ret = parseFloat($value); break;
        default:$ret = $value+"";break;
    } 
    return $ret;
}

function GetValue(attr, datatype="string"){
    $ret = null;
    $value = document.querySelector(attr).value;
    switch (datatype) {
        case "string": $ret = $value+""; break;
        case "int": $ret = parseInt($value); break;
        case "float": $ret = parseFloat($value); break;
        default:$ret = $value+"";break;
    } 
    return $ret;
}

function GetElementById(id){
    return document.getElementById(id);
}

function GetElement(attr){
    var inputElement = document.querySelector(attr);
    return inputElement;
}

function SetValue(attr, value){
    document.querySelector(attr).value = value;
}

function ClearValue(attr){
    document.querySelector(attr).value = "";
}

function InputIsEmpty(attr){
    $ret = false;
    $val =  document.querySelector(attr).value;
    if($val=="" || $val ==null){
        $ret = true;
    }
    return $ret;
}

function WindowIsLoaded(func){
    window.addEventListener("load", func);
}

function WindowLoaded(func){
    window.addEventListener("load", func);
}
function PageIsLoaded(func){
    window.addEventListener("load", func);
}

function PageLoaded(func){
    window.addEventListener("load", func);
}

function SetDelay(func, delay){
   setTimeout(func,delay)
}

function Click(attr){
    var inputElement = document.querySelector(attr);
    inputElement.click();
}
function ClickElementById(id){
    var inputElement = document.getElementById(id);
    inputElement.click();
}

function FormSubmit(attr, reload, func){ //usage: FormSubmit("#form", true, ()=>console.log('hello world.'));
    if(reload === true){
        document.querySelector(attr).addEventListener("submit", func);
    } else {
        document.querySelector(attr).addEventListener("submit", (event) => {
            event.preventDefault();
            func();
        });
    }
}

function PostRequest(url, data = {}, method = 'POST', headers = {}) {
    return new Promise((resolve, reject) => {
        var xhr = new XMLHttpRequest();
        xhr.open(method, url, true);
        
        if (!headers['Content-Type']) {
            headers['Content-Type'] = 'application/x-www-form-urlencoded';
        }

        // Set custom headers
        for (const [key, value] of Object.entries(headers)) {
            xhr.setRequestHeader(key, value);
        }

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    try {
                        let responseData;
                        if (xhr.getResponseHeader('Content-Type')?.includes('application/json')) {
                            responseData = JSON.parse(xhr.responseText);
                        } else {
                            responseData = xhr.responseText;
                        }

                        resolve(responseData);
                    } catch (error) {
                        reject(new Error('Failed to parse response data'));
                    }
                } else {
                    reject(new Error(xhr.statusText));
                }
            }
        };
        if (headers['Content-Type'] === 'application/json') {
            xhr.send(JSON.stringify(data));
        } else {
            var encodedData = new URLSearchParams(data).toString();
            xhr.send(encodedData);
        }
    });
}

function OneSubmit(attr, timeout=2500) {
    var form = document.querySelector(attr);
    var buttons = form.getElementsByTagName('button');
    for (var i = 0; i < buttons.length; i++) {
        if (buttons[i].type === 'submit') {
            buttons[i].disabled = true;
        }
    }

    setTimeout(function(){
        for (var i = 0; i < buttons.length; i++) {
            if (buttons[i].type === 'submit') {
                buttons[i].disabled = false;
            }
        }
    }, timeout);
}

function OneClick(attr, timeout=2500) {
    var btn = document.querySelector(attr);
    btn.disabled = true;
    setTimeout(function(){
        btn.disabled = false;
    }, timeout);
}

function GetAttribute($elemet, $attr){
    return document.querySelector($elemet).getAttribute($attr);
}


