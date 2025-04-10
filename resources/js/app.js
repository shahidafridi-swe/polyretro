import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css";

window.Alpine = Alpine;

Alpine.start();


window.toast = (message) => {
    Toastify({
        text: message,
        duration: 3000,
        destination: "",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "green",
        },
        onClick: function(){} // Callback after click
    }).showToast();
}

// toast("hi")
