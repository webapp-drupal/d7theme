function showTabs(evt, EvTab) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(EvTab).style.display = "block";

    // handle external called triggered by showTabsExt func
    if( evt.currentTarget == undefined ){
        evt.className += " active";

    }else{
        evt.currentTarget.className += " active";
    }
    

}

// making the current setup work for tabs with URL hash
function showTabsExt(EvTab){
    // EvTab is passed as hash in this function
    var btnElem = document.querySelector('.tablinks[data-btnName="' + EvTab + '"]');
    // console.log(btnElem);

    if( btnElem != null || btnElem != undefined ){
        showTabs(btnElem, EvTab);
    }

    // sets the correct parameter and calls the funciton to show tab
    
}
