let total_amount = document.getElementById("total_amount");
let parent = document.getElementById("products_box");
let total_item = document.getElementById("total_item");
let address = document.getElementById("address");
let save_address = document.getElementById("save_address");
let edit_address = document.getElementById("edit_address");
let confirm_address = document.getElementById("confirm_address");
function get_address() {
    let request = new XMLHttpRequest();
    request.open("GET", "/get_user_details");
    request.send();
    request.addEventListener("load", function () {
        if(request.responseText=='failure')
        {
            console.log('failure');
            // yhan error handling krni h
        }
        let data = JSON.parse(request.responseText);
        address.innerText = data[0].address;
    })
}
get_address();
function decrease_quantity(id, num) {
    let new_quan = Number(num.nextSibling.data) - 1;
    let request = new XMLHttpRequest();
    request.open("POST", "/change_quantity");
    request.setRequestHeader("content-type", "application/json");
    request.send(JSON.stringify({ "cart_id": id, "quantity": new_quan }));
    request.addEventListener("load", function () {
        if (request.responseText == "success") {
            change_amount("decrease", id);
            if (new_quan <= 0) {
                let child = document.getElementById(id);
                parent.removeChild(child);
            }
            else {
                num.nextSibling.data = new_quan;
                let ele = document.getElementById(id + "incr");
                ele.style.display = "inline-block";
            }
        }
        else
            alert('something went wrong,please try again after sometime');

    })
}

function increase_quantity(id, num) {
    let new_quan = Number(num.previousSibling.data) + 1;
    let request = new XMLHttpRequest();
    request.open("POST", "/change_quantity");
    request.setRequestHeader("content-type", "application/json");
    request.send(JSON.stringify({ "cart_id": id, "quantity": new_quan }));
    request.addEventListener("load", function () {
        if (request.responseText == "success") {
            num.previousSibling.data = new_quan;
            change_amount("increase", id);
        }
        else if (request.responseText == "out of stock") {
            let ele = document.getElementById(id + "incr");
            ele.style.display = "none";
        } else
        alert('something went wrong,please try again after sometime');

    })
}

function change_amount(status, id) {
    let amount = document.getElementById(Number(id) + "p");
    if (status == "increase") {
        total_item.innerText = Number(total_item.innerText) + 1;
        total_amount.innerText = Number(total_amount.innerText) + Number(amount.innerText);
    }
    else if (status == "decrease") {
        total_amount.innerText = Number(total_amount.innerText) - Number(amount.innerText);

        total_item.innerText = Number(total_item.innerText) - 1;
    }
}
function remove_quantity(id) {
    let request = new XMLHttpRequest();
    request.open("POST", "/delete_from_cart");
    request.setRequestHeader("content-type", "application/json");
    request.send(JSON.stringify({ "cart_id": id }));
    request.addEventListener("load", function () {
        if (request.responseText == "success") {
            let child = document.getElementById(id);
            parent.removeChild(child);
        }
        else
        alert('something went wrong,please try again after sometime');

    })
}


function place_order() {
    if (confirm_address.innerText.trim()) {
        if(parent.childElementCount>0){
        let request = new XMLHttpRequest();
        request.open("GET", "/place_order");
        request.send();
        request.addEventListener("load", function () {
            if(request.responseText=="order placed")
            {
                alert("order placed successfully");
                window.location.href="/orders";
            }
            else if(request.responseText=="out of stock something")
            window.location.href="/display_cart";
            else
            {
                alert(request.responseText);
            }
        })}
        else{
            alert("cart is empty");
        }
    }
    else {
        alert("Please save address first");
    }
}

function save_address1() {
    if (address.value.trim()) {
        let request = new XMLHttpRequest();
        request.open("POST", "/save_address");
        request.setRequestHeader("content-type", "application/json");
        request.send(JSON.stringify({ "address": address.value.trim() }));
        request.addEventListener("load", function () {  
            if (request.responseText == "success") {
                confirm_address.innerText = address.value;
                address.style.display = "none";
                confirm_address.style.display = "block";
                save_address.style.display = "none";
                edit_address.style.display = "block";

            }
            else {
               alert('Something went wrong,please try again after sometime');
            }

        })
    }
    else {
        alert("address cant be empty");
    }
}


function edit_address1() {

    address.style.display = "block";
    confirm_address.style.display = "none";
    save_address.style.display = "block";
    edit_address.style.display = "none";
}