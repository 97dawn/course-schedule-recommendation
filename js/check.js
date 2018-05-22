function checkCheckboxes(){
    var numOfChecked = $( "input:checked" ).length;
    if(numOfChecked == 0){
        alert("Please check the academic standing");
        return false;
    }
    return true;
}
function uncheckOthers(checkbox){
    for(var i=0; i<$(".button").length ; i++){
        if(checkbox != $(".button")[i]){
            $(".button").attr("checked",false);
            checkbox.checked=true;
        }
    }
}