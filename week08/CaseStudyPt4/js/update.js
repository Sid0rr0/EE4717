function updateItem(e) {
    const num = parseInt(e.target.value);
    const newPriceRow = "newPriceRow" + num;

    const arr = Array.prototype.slice.call(document.getElementsByClassName(newPriceRow), 0);

    if(arr[0].style.visibility === "visible") {
        arr.forEach(function (element) {
            element.style.visibility = "hidden";
        })
    } else {
        arr.forEach(function (element) {
            element.style.visibility = "visible";
        })
    }

}
