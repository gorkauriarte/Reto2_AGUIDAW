let marcado = document.getElementById('marcado');
        let nomarcado = document.getElementById('nomarcado');

         function bookmarkPregunta(idPregunta,idUsuario){
            
            let formData = new FormData();
            formData.append('id_pregunta',idPregunta);
            formData.append('id_usuario',idUsuario);

           fetch("http://localhost/php/auth/preguntas/bookmark.php",{
                method: 'POST',
                body: formData
            }).then(res => {
                return res.json();
            })
            .then(data => {
                if(data.estado == 'ok')
                {
                    marcado.style.display = "block";
                    nomarcado.style.display = "none";

                    alert(data.mensaje);
                }
            })
            ;
            
        }


        function unbookmarkPregunta(idPregunta,idUsuario){
            
            let formData = new FormData();
            formData.append('id_pregunta',idPregunta);
            formData.append('id_usuario',idUsuario);

           fetch("http://localhost/php/auth/preguntas/unbookmark.php",{
                method: 'POST',
                body: formData
            }).then(res => {
                return res.json();
            })
            .then(data => {
                if(data.estado == 'ok')
                {
                    marcado.style.display = "none";
                    nomarcado.style.display = "block";

                    alert(data.mensaje);
                }
            })
            ;
            
        }