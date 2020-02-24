(function(){
    const nav = document.querySelector(".header__icon")
    const section = document.querySelectorAll(".main-section")
    const event = (elem, remove = false) => {
        elem.addEventListener("click", e => {
            if(remove === false) {
                e.preventDefault()
            }
            //if(remove) {
            //    document.querySelector("body").classList.remove("with--sidebar")
            //    return true;
            //}
            document.querySelector("body").classList.toggle("with--sidebar")
        })
    }
    if(nav) {
        event(nav);
        section.forEach(e => event(e,true))
    }
})();