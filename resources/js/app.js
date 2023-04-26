import './bootstrap';

import.meta.glob(['../images/**']);

import 'animate.css';

import confetti from "canvas-confetti";

Livewire.on('confetti', function() {
    var element = document.getElementById("confetti");
    
    element.scrollIntoView({
      behavior: "smooth",
    });

    confetti({
        particleCount: 300,
        spread: 150,
        origin: {y: 0.6}
    });
})

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();