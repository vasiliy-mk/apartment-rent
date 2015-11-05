


function upload(files,post_url) {
    var http = new XMLHttpRequest();

            // Процесс загрузки
            if (http.upload && http.upload.addEventListener) {
               $('#preloader').show();

            http.upload.addEventListener( // Создаем обработчик события в процессе загрузки.
            'progress',function(e) {
            if (e.lengthComputable) {
            // e.loaded — сколько байтов загружено.
            // e.total — общее количество байтов загружаемых файлов.
            // Кто не понял — можно сделать прогресс-бар :-)

            //   console.log(e.loaded+' of '+e.total);

            }
        },
        false
        );

        http.onreadystatechange = function () {
            // Действия после загрузки файлов
            if (this.readyState == 4) { // Считываем только 4 результат, так как их 4 штуки и полная инфа о загрузке находится
            if(this.status == 200) { // Если все прошло гладко

            $('#output').append(this.response);
            // Действия после успешной загрузки.
            // Например, так

            $('#preloader').hide();
            //console.log(this.response);
            // можно получить ответ с сервера после загрузки.


            } else {
            // Сообщаем об ошибке загрузки либо предпринимаем меры.
            }
        }
        };

        http.upload.addEventListener(
        'error',
        function(e) {
            // Паникуем, если возникла ошибка!
            });
        }

        var form = new FormData(); // Создаем объект формы.
        for (var i = 0; i < files.length; i++) {
            form.append('file[]', files[i]); // Прикрепляем к форме все загружаемые файлы.
            }
    if(files[0]){
        http.open('POST', post_url);
        http.send(form);
    }else{
        $('#preloader').hide();
    }
 }




$("#file").change(function(){
    upload(this.files,post_url);
});

