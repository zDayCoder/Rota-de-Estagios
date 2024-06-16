<style>
    @keyframes pulseAnimation {
        0% {
            color: #9D1221;
        }

        50% {
            color: #a6a6a6;
        }

        100% {
            color: #9D1221;
        }
    }

    .pulsate {
        animation: pulseAnimation 3s infinite;
    }
</style>

<a class="navbar-brand pulsate" id="rest_title" href="javascript:void();"
    onclick="$('html, body').animate({ scrollTop: 0 }, 'slow'); return false;"></a>

<script>
    var rest = 'REST';
    var rest2 = 'Rs';
    var speed = 80;

    function typeWriter() {
        var text = rest;
        var i = 0;

        var interval = setInterval(function() {
            if (i < text.length) {
                document.getElementById("rest_title").innerHTML += text.charAt(i);
                i++;
            } else {
                clearInterval(interval);
                setTimeout(eraseText, 1000); // Aguarda 1 segundo antes de apagar o texto
            }
        }, speed);
    }

    function eraseText() {
        var currentText = document.getElementById("rest_title").innerHTML;
        var newText = currentText.slice(0, -1);
        document.getElementById("rest_title").innerHTML = newText;

        if (newText === '') {
            setTimeout(typeWriter2, 1000); // Aguarda 1 segundo antes de começar a digitar "REST" novamente
        } else {
            setTimeout(eraseText, speed);
        }
    }

    function typeWriter2() {
        var text = rest2;
        var i = 0;

        var interval = setInterval(function() {
            if (i < text.length) {
                document.getElementById("rest_title").innerHTML += text.charAt(i);
                i++;
            } else {
                clearInterval(interval);
                setTimeout(eraseText2, 5000); // Aguarda 1 segundo antes de apagar o texto
            }
        }, speed);
    }

    function eraseText2() {
        var currentText = document.getElementById("rest_title").innerHTML;
        var newText = currentText.slice(0, -1);
        document.getElementById("rest_title").innerHTML = newText;

        if (newText === '') {
            setTimeout(typeWriter, 1000); // Aguarda 1 segundo antes de começar a digitar "REST" novamente
        } else {
            setTimeout(eraseText2, speed);
        }
    }

    typeWriter(); // Inicia a função ao carregar a página
</script>
