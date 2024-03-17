document.addEventListener("DOMContentLoaded", function(){

    eventListeners();

    darkMode();
});

//darkmode

function darkMode(){
    //leer si el usuario usa dark mode en su pc 
    const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

    // console.log(prefiereDarkMode.matches);
    //se cambia automaticamente dependiendo del usuario
    if(prefiereDarkMode.matches){
        document.body.classList.add("dark-mode");
    }else{
        document.body.classList.remove("dark-mode");
    }

    prefiereDarkMode.addEventListener("change", function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add("dark-mode");
        }else{
            document.body.classList.remove("dark-mode");
        }
    })

    //boton darkmode
    const botonDarkMode = document.querySelector(".dark-mode-boton");

    botonDarkMode.addEventListener("click", function(){
        document.body.classList.toggle("dark-mode");
    } )

};



//menu hamburguesa

function eventListeners(){
    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click", navegacionResponsive);
};

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion");

    navegacion.classList.toggle("mostrar")
}

