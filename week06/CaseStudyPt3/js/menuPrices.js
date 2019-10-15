
function updateItem1(e) {
    const single = 2;
    const price = parseFloat(e.target.value) * single;

    document.getElementById("item1Price").innerText = "$" + price;
    updateTotalPrice();
}

function multiply (single, double, price, item, itemRadio1, itemRadio2) {
    if(isNaN(price)) {
        if(document.getElementById(item).value) {
            if(document.getElementById(itemRadio1).checked)
                price = parseFloat(document.getElementById(item).value) * single;
            else if (document.getElementById(itemRadio2).checked)
                price = parseFloat(document.getElementById(item).value) * double;
        } else
            price = 0
    }
    else if(document.getElementById(itemRadio1).checked)
        price *= single;
    else if (document.getElementById(itemRadio2).checked)
        price *= double;

    //console.log(price);
    return price;
}

function updateItem2(e) {
    const single = 2;
    const double = 3;

    let price = parseFloat(e.target.value);

    price = multiply(single, double, price, "item2", "item2Radio1", "item2Radio2");

    document.getElementById("item2Price").innerText = "$" + price;
    updateTotalPrice();
}

function updateItem3(e) {
    const single = 4.75;
    const double = 5.75;

    let price = parseFloat(e.target.value);

    price = multiply(single, double, price, "item3", "item3Radio1", "item3Radio2");

    document.getElementById("item3Price").innerText = "$" + price;

    updateTotalPrice();
}

function updateTotalPrice() {

    let price1 = document.getElementById("item1Price").innerText;
    let price2 = document.getElementById("item2Price").innerText;
    let price3 = document.getElementById("item3Price").innerText;

    price1 = price1.substr(1);
    price2 = price2.substr(1);
    price3 = price3.substr(1);

    let price = 0;

    if(!isNaN(parseFloat(price1)))
        price += parseFloat(price1);

    if(!isNaN(parseFloat(price2)))
        price += parseFloat(price2);

    if(!isNaN(parseFloat(price3)))
        price += parseFloat(price3);

    document.getElementById("totalPrice").innerText = "$" + price;
}
