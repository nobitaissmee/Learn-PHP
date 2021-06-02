let id = $("input[name*='id']")
id.attr("readonly","readonly");


$(".btnEdit").click( e =>{
    let textValues = displayData(e);

    let bookName = $("input[name*='name']");
    let bookPublisher = $("input[name*='publisher']");
    let bookPrice = $("input[name*='price']");

    id.val(textValues[0]);
    bookName.val(textValues[1]);
    bookPublisher.val(textValues[2]);
    bookPrice.val(textValues[3].replace("$", ""));
});

function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textValues = [];

    for (const value of td) {
        if (value.dataset.id === e.target.dataset.id) {
            textValues[id++] = value.textContent;
        }
    }
    return textValues;
}

function setVisibility(){
    document.getElementById("btn-delete").style.display="none";
}
setVisibility();

$(".btnDelete").click(e => {
    if(confirm("Are you sure?")){
        let textValue=displayData(e);
        id.val(textValue[0]);
        document.getElementById("btn-delete").click();
    }
})

$(".deleteAll").click(e => {
    if(confirm("Are you sure?")){
        document.getElementById("btn-deleteAll").click();
    }
})
