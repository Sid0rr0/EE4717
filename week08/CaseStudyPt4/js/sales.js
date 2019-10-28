function showData(e) {
    const num = parseInt(e.target.value);
    const id = "saleDiv" + num;

    const div = document.getElementById(id).style.visibility;

    if(div === "visible")
        document.getElementById(id).style.visibility = "hidden";
    else
        document.getElementById(id).style.visibility = "visible";

}

