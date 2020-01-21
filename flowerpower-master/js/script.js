function validateName() {
    console.log(document.forms["contactForm"]);

    let form = "";

    if(document.forms["contactForm"] !== undefined) {
        form = "contactForm";
    } else
        form = "checkoutForm";

    const name = document.forms[form]["name"].value;
    const nameRGEX = /^[^-\s][a-zA-Z\s-]+$/;

    if (!nameRGEX.test(name) || name === "") {
        alert("Invalid input on name!");
        document.forms[form]["name"].value = null;

        return false;
    }
}

function validateEmail() {
    let form = "";

    if(document.forms["contactForm"] !== undefined) {
        form = "contactForm";
    } else
        form = "checkoutForm";

    const email = document.forms[form]["email"].value;

    const emailRGEX = /^[A-z\d-.]+@([A-z]*\.){1,3}[A-z]{2,3}$/;
    if (!emailRGEX.test(email) || email === "") {
        alert("Invalid input email!");
        document.forms[form]["mail"].value = "";
        return false;
    }
}

function validateForm() {
    const name = document.forms["contactForm"]["name"].value;
    const nameRGEX = /^[^-\s][a-zA-Z\s-]+$/;
    const email = document.forms["contactForm"]["email"].value;
    const emailRGEX = /^[A-z\d-.]*@([A-z]*\.){1,3}[A-z]{2,3}$/;

    console.log(name);

    if (!nameRGEX.test(name) || name === "") {
        alert("Invalid input on name!");
        document.forms["contactForm"]["name"].value = null;
        return false;

    } else if (!emailRGEX.test(email) || email === "") {
        alert("Invalid input email!");
        return false;
    }
}

function validateTime() {
    const dateToday = new Date();
    const date = document.forms["checkoutForm"]["expiry-date"].value;

    if (new Date(date).getTime() < dateToday.getTime()) {
        alert("Card has expired");
        document.forms["checkoutForm"]["expiry-date"].valueAsDate = null;
        return false;
    }
}

function validateCard() {
    const card = document.forms["checkoutForm"]["card-number"].value;
    const cardRGEX = /\b\d{4}[ -]?\d{4}[ -]?\d{4}[ -]?\d{4}\b/;

    if (!cardRGEX.test(card) || card === "") {
        alert("Invalid input of card numbers");
        return false;
    }
}

function validateCheckout() {
    const name = document.forms["checkoutForm"]["name"].value;
    const nameRGEX = /^[^-\s][a-zA-Z\s-]+$/;
    const surname = document.forms["checkoutForm"]["surname"].value;
    const email = document.forms["checkoutForm"]["email"].value;
    const emailRGEX = /^[A-z\d-.]*@([A-z]*\.){1,3}[A-z]{2,3}$/;
    const card = document.forms["checkoutForm"]["card-number"].value;
    const cardRGEX = /\b\d{4}[ -]?\d{4}[ -]?\d{4}[ -]?\d{4}\b/;
    const date = document.forms["checkoutForm"]["expiry-date"].value;

    if (!nameRGEX.test(name) || name === "") {
        alert("Invalid input on name!");
        return false;
    } else if (!emailRGEX.test(email) || email === "") {
        alert("Invalid input email!");
        return false;
    } else if (!nameRGEX.test(surname) || surname === "") {
        alert("Invalid input email!");
        return false;
    }
    else if (!cardRGEX.test(card) || card === "") {
        alert("Invalid input card numbers");
        return false;
    }
        else if (date===""){
        alert("Insert expiry date");
        return false;
    }
/*
    window.location.href = "./confirmation.php";
    return false;*/
}

function showCheckout() {
    let form = document.getElementById("cart-checkout").style;
    let switchButton = document.getElementById('switchButton');
    if (form.display !== "flex") {
        form.display = "flex";
        switchButton.innerHTML = "Cancel checkout";
        switchButton.style.backgroundColor="red";


    } else {
        form.display = "none";
        switchButton.innerHTML = "Proceed to checkout";
        switchButton.style.backgroundColor="#6ABB14";
    }
}

function calculateSumTotalPrice(len){
    let tdSum = document.getElementById('sumTotal');
    if(tdSum === null) {

    } else {
        let sum=0;
        for (let j = 0; j<len; j++) {
            let totalprice = document.getElementById('totalPrice'+j).innerHTML;
            let price = parseFloat(totalprice);
            sum += price;
        }

        tdSum.innerHTML = 'Total price: ' + Math.round(sum*100)/100 + '$';
    }

}

function calculateTotalPrice(len){
        for (let j = 0; j<len; j++) {
            let totalprice= document.getElementById('totalPrice'+j);
            let quantity = document.getElementById(j).value;
            let pricestr = document.getElementById("price"+ j).innerHTML;
            let price = parseFloat(pricestr);
            let sumPrice = price*quantity;
            totalprice.innerHTML = Math.round(sumPrice*100)/100 + " $";
        }
    calculateSumTotalPrice(len);

}



