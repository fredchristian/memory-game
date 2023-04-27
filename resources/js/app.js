import './bootstrap';

import.meta.glob(['../images/**']);

import confetti from "canvas-confetti";

Livewire.on('confetti', function() {
    var element = document.getElementById("confetti");
    
    element.scrollIntoView({
      behavior: "smooth",
    });

    var count = 300;
    var defaults = {
      angle: 90,
      origin: { x:0.5, y: 1 }
    };

    function fire(particleRatio, opts) {
      confetti(Object.assign({}, defaults, opts, {
        particleCount: Math.floor(count * particleRatio)
      }));
    }

    fire(0.25, { spread: 26, startVelocity: 55 });
    fire(0.2, { spread: 60 });
    fire(0.35, { spread: 100, decay: 0.91, scalar: 0.8 });
    fire(0.1, { spread: 120, startVelocity: 25, decay: 0.92, scalar: 1.2 });
    fire(0.1, { spread: 120, startVelocity: 45 });
})

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();