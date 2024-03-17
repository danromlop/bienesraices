const { src, dest, watch, parallel } = require("gulp"); //importamos funciones de gulp


// CSS
const sass = require("gulp-sass")(require("sass")); //importamos funcion sass
const plumber = require("gulp-plumber"); //importa plumber desde el json. plumber permite no interrumpir la ejecucion si hay errores

// Imagenes
const cache = require("gulp-cache");
const imagemin = require("gulp-imagemin");
const webp = require("gulp-webp");
const avif = require("gulp-avif");

function css(done){
    //Identificar el archivo de SASS
    //Compilarlo
    //Almacenarlo en el disco duro

    //src identifica el archivo sass
    src("src/scss/**/*.scss") //todas las carpetas y todos los archivos que tengan esta extension .scss
        .pipe( plumber())
        .pipe( sass())
        .pipe(dest("build/css")); //se ejecuta el pipe una vez acabe el src. 
    //el primer pipe compila sass, el segundo lo almacena en disco duro, en la ruta especificada



    done(); //callback avisa a gulp cuando llegamos al final de la funcion
};

function imagenes(done){
    const opciones = {
        optimizationLevel: 3 
    }

    src("src/img/**/*.{png,PNG,jpg,JPG}")
        .pipe( cache( imagemin(opciones)))
        .pipe( dest("build/img"))

    done();
}


function versionWebp(done) {
 
    const opciones = {
        quality: 50 // Esto define que tanta calidad se le bajarán a las imágenes
    }
 
    src('src/img/**/*.{png,PNG,jpg,JPG}') // Busca recursivamente en todos los archivos y carpetas de la carpeta img con los formatos especificados
        .pipe(webp(opciones)) // Los convierte en formato WEBP y les baja la calidad especificada
        .pipe(dest('build/img')) // Los guarda en una nueva carpeta
    
    done(); // Callback que avisa a gulp cuando llegamos al final de la ejecución del script
}

function versionAvif(done) {
 
    const opciones = {
        quality: 50 // Esto define que tanta calidad se le bajarán a las imágenes
    }
 
    src('src/img/**/*.{png,PNG,jpg,JPG}') // Busca recursivamente en todos los archivos y carpetas de la carpeta img con los formatos especificados
        .pipe(avif(opciones)) // Los convierte en formato WEBP y les baja la calidad especificada
        .pipe(dest('build/img')) // Los guarda en una nueva carpeta
    
    done(); // Callback que avisa a gulp cuando llegamos al final de la ejecución del script
}

function javascript(done){
    src("src/js/**/*.js")
        .pipe(dest("build/js"));

    done();
}

function dev(done){  //automatizamos la actualizacion del css y js
    watch("src/scss/**/*.scss", css);
    watch("src/js/**/*.js", javascript);

    done();
};

exports.css = css; //llamamos a la funcion css
exports.js = javascript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.versionAvif = versionAvif;
exports.dev = parallel ( imagenes, versionWebp, versionAvif, javascript, dev);

