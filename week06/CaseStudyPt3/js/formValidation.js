function addEvent(node, type, callback) {
    if (node.addEventListener) {
        node.addEventListener(type, function(e) {
            callback(e, e.target);
        }, false);
    }
}

function shouldBeValidated(field) {
    return (
        !(field.getAttribute("readonly") || field.readonly) &&
        !(field.getAttribute("disabled") || field.disabled) &&
        (field.getAttribute("pattern") || field.getAttribute("required"))
    );
}

function instantValidation(field) {
    if (shouldBeValidated(field)) {

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

        let invalid = true;

        //console.log(parseInt((date[1])) + " " + d.getMonth());

        if(parseInt(date[0]) < d.getFullYear())
            invalid = false;
        else if (parseInt(date[1]) < (d.getMonth() + 1) )
            invalid = false;
        else if (parseInt(date[2]) <= d.getDate())
            invalid = false;

        if (!invalid && field.target.getAttribute("aria-invalid")) {
            field.target.removeAttribute("aria-invalid");
        } else if (invalid && !field.target.getAttribute("aria-invalid")) {
            field.target.setAttribute("aria-invalid", "true");
        }
    }
}

//for ie8
/*
var fields = [
    document.getElementsByTagName("input"),
    document.getElementsByTagName("textarea")
];
for (var a = fields.length, i = 0; i < a; i++) {
    for (var b = fields[i].length, j = 0; j < b; j++) {
        addEvent(fields[i][j], "change", function(e, target) {
            instantValidation(target);
        });
    }
}
*/


