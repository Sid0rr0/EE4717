function addEvent(node, type, callback) {
    if (node.addEventListener) {
        node.addEventListener(type, function(e) {
            callback(e, e.target);
        }, false);
    }
}

function instantValidation(field) {
    if (field.getAttribute("pattern") || field.getAttribute("required")) {

        let invalid =
            (field.getAttribute("required") && !field.value) ||
            (field.getAttribute("pattern") && field.value &&
                !new RegExp(field.getAttribute("pattern")).test(field.value));

        if (!invalid && field.getAttribute("aria-invalid")) {
            field.removeAttribute("aria-invalid");
        } else if (invalid && !field.getAttribute("aria-invalid")) {
            field.setAttribute("aria-invalid", "true");
        }
    }
}

addEvent(document, "change", function(e, target) {
    instantValidation(target);
});

function dateValidation(field) {
    let tmp = field.target.getAttribute("type");
    if(tmp === "date") {

        const date = field.target.value.split("-");
        const d = new Date();

        let invalid = false;

        //console.log(parseInt((date[1])) + " " + d.getMonth());

        if(parseInt(date[0]) < d.getFullYear())
            invalid = true;
        else if (parseInt(date[1]) < (d.getMonth() + 1) )
            invalid = true;
        else if (parseInt(date[2]) <= d.getDate())
            invalid = true;

        if (!invalid && field.target.getAttribute("aria-invalid")) {
            field.target.removeAttribute("aria-invalid");
        } else if (invalid && !field.target.getAttribute("aria-invalid")) {
            field.target.setAttribute("aria-invalid", "true");
        }
    }
}


