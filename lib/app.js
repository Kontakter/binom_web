$(document).ready(function () {
    /**
     * Получает данные о прогрессе анализа 
     * для использования в функции ShowAnalysisProgress
     * До использования сервера данные вымышленные.     
     */         
    function GetAnalysisProgress() {
        
    }

    /**
     * Обновляет полосу прогресса анализа
     * Берет данные из GetAnalysisProgress     
     */         
    function ShowAnalysisProgress() {
        
    }
    
    /**
     * Показывает модальное окно логина     
     */
    function ShowLogin() {
        $('#loginModal').modal();    
    }
    
    /**
     * Показывает модальное окно превышения лимита    
     */
    function ShowExceed() {
        $('#exceedModal').modal();    
    }
    
    /**
     * Показывает модальное окно с заголовком, текстом и кнопкой Ок
     */         
    function TextModal(title, text) {
        $('#textModal h3').html(title);
        $('#textModal .modal-body').html(text); 
        $('#textModal').modal();    
    }
     
    /**
     * Сортировка таблицы по какому либо из стобцов
     */           
    function SortTableByParam(tableId, param) {
     
    }
    
    /* Начало анализа */
    $('#analyzeStart').click(function() {
        $('#before-analysis').slideUp();
        $('#in-analysis').slideDown(function() {
            var totaltime = $('#estTime').data('minutes') * 1000;
            var currenttime = totaltime + 1000;
            var newinterval = window.setInterval(function () {
                currenttime -= 1000;
                $('#timeLeft').text((currenttime/1000) + ' s.');    
            }, 1000);
            $('#timeLeft').text((currenttime/1000) + ' s.');    
            $('#in-analysis .bar').animate({'width': '100%'}, totaltime, function () {
                $('#in-analysis').slideUp();
                $('#after-analysis').slideDown();
                
                $('#resultsContent').slideDown();
                $('#toggleResults .icon-chevron-up').removeClass('icon-chevron-down');
                                
            });     
        });
    });
    
    
    /**
     * Просит подтвердить удаление
     */         
    function ConfirmDelete(text, callback, obj) {
        $('#deleteModal .modal-body').html('<p>' + text + '</p>');
        $('#deleteModal .deleter').remove();
        $('#deleteModal .modal-footer').append('<button class="btn btn-danger deleter">Delete</button>');
        $('#deleteModal .deleter').click(function (e) {
            callback(obj);
            $(this).unbind(e);
            $('#deleteModal').modal('hide')   
        });
        $('#deleteModal').modal();
    } 
    
    /**
     * Проверяет достаточно ли денег
     * 
     * На данном этапе всегда возвращает false
     * 
     * @TODO Написать реальную проверку                    
     */         
    function CheckPayment() {
        return false;
    }
    
    /**
     * Проверяет почту при регистрации
     * 
     * До связи с сервером проверяет по заданному списку          
     */
    function CheckEmail(email) {
        var emails = [
            'ede@km.ru',
            'info@ibinom.com'
        ];
        if ($.inArray(email, emails) == -1) {
            return true;
        }
        return false; 
    }         
    
    /**
     * Отправляет запрос на регистрацию пользователя и выводит окно если ок
     */
    function RegisterAccount() {
        //TODO запрос на реальный скрипт регистрации
        var useremail = $("inputEmail").val();
        var emailValid = CheckEmail(useremail);
        var pass =  $('#inputPassword1').val();
        var pass2 = $('#inputPassword2').val();
        if (emailValid && (pass != '') && (pass == pass2)) {
            TextModal('E-mail confimation was sent to' + useremail, '<p>To complete registration please follow the link in the e-mail. Unless validated you will not be charged.</p>');   
        } else {
            var errortext = '';
            if (!emailValid) {errortext += '<p>Email already used.</p>';}
            if (pass == '') {errortext += '<p>Empty password</p>';}
            if (pass != pass2) {errortext += '<p>Passwords do not match</p>';}
            TextModal('Error', errortext);
        }   
    }         
    
    /**
     * Обновляет данные аккаунта. Проверяет если деньги на счету
     * и если нет - выводит ошибку     
     */         
    function UpdateAccount() {
        if(!CheckPayment()){
            //$('#updateFail').fadeIn();
            TextModal('Error', '<p>Oops, it seems there are problems with your billing account. Check it!</p>');
            $('#billing').slideDown(); 
            $('#toggleBilling .icon-chevron-up').addClass('icon-chevron-down');  
        }            
    }
    
    /**
     * Сохраняет новые данные пользователя, выводит уведомление если всё хорошо
     */         
    function SaveChanges() {
        $('#saveSuccess').fadeIn();  
    }
    
    /**
     * Обновляет ценник при смене плана
     */
    function UpdatePrice(sum) {
        $('#updatePrice').html('$'+sum);
    }         
     
    /* Активация интерфейса */
    
    /* Общий header */
    
    /* Ссылка входа */
    $('#signIn').click(function (e) {
        e.preventDefault();
        ShowLogin();
    });
    
    
    /* Главная страница */
    
    /* Переключение табов сверху */             
    $('#topTabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    
    /* Сначала показываем первый таб. */         
    $('#topTabs a:first').tab('show');
    
    /* Показ и скрытие списка файлов */
    $('#toggleFiles').click(function () {
        $('#filesContent').slideToggle();
        $('#filesSummary').fadeToggle();
        $('#toggleFiles .icon-chevron-up').toggleClass('icon-chevron-down');
    });
    
    $('#toggleResults').click(function () {
        $('#resultsContent').slideToggle();
        $('#toggleResults .icon-chevron-up').toggleClass('icon-chevron-down');
    });
    
    $('#toggleBilling').click(function (e) {
        e.preventDefault();
        $('#billing').slideToggle();
        $('#toggleBilling .icon-chevron-up').toggleClass('icon-chevron-down');
    });
    
    /* Выделение всех файлов*/
    $('#selectAllFiles').click(function () {
        $('#myFiles input').attr('checked', true);
        $(this).hide();
        $('#deselectAllFiles').show();
    });
    
    /* Снятие выделения со всех файлов */
    $('#deselectAllFiles').click(function () {
        $('#myFiles input').removeAttr('checked');
        $(this).hide();
        $('#selectAllFiles').show();
    });
    
    /* Удаление файлов */
    $('#deleteFiles').click(function () {
        var filesToDelete =  $('#myFiles input:checked');
        var fileCount = filesToDelete.length;
        if (fileCount > 0) {
            var rows = $('#myFiles input:checked').parents('tr');
            var deleter = function (rows) {
                rows.remove();
            }
            var text = 'Do you really want to delete ';
            if( fileCount > 1 ) {
                text += fileCount + ' files';
            } else {
                text += $('#myFiles input:checked').parent().siblings('.filename').html();           
            }
            text += '?';
            ConfirmDelete(text, deleter, rows); 
        }
    });
    
    /* Удаление результатов */
    $('#deleteResults').click(function () {
        var filesToDelete =  $('.delete-result:checked');
        var fileCount = filesToDelete.length;
        if (fileCount > 0) {
            var rows = filesToDelete.parents('tr');
            var deleter = function (rows) {
                rows.remove();
            }
            var text = 'Do you really want to delete ';
            if( fileCount > 1 ) {
                text += fileCount + ' files';
            } else {
                text += filesToDelete.parent().next().html();           
            }
            text += '?';
            ConfirmDelete(text, deleter, rows); 
        }
    });
    
    /* Удаление Reference */
    $('.deleteRef').click(function (){
        var text = 'Do you really want to delete ';
        var refid =  $(this).data('refid');
        var row = $('#ref-' + refid);
        var filename = row.find('label').text();
        text += filename + '?'
        var deleter = function (row) {
           row.remove();
           showDragAndDrop();
           showAnalyze();
        }
        ConfirmDelete(text, deleter, row);    
    })
    
    /* Показ кнопки анализа */
    function showAnalyze() {
        var filesCount = $('#myFiles input:checked').length;
        var refSelectValue = $('#refSelect').val();
        var genBankValue =   $('#genBankNumber').val();
        var customFilesCount = $('#refList input:checked').length;
        var genBankNumberValid = CheckGenBankNumber(genBankValue);
        $('#estTime').text(filesCount * 30);
        $('#estTime').attr('data-minutes', filesCount * 30);
        if (
            (filesCount > 0) 
            && 
           ((refSelectValue === 'human') 
                || 
            ((refSelectValue === 'genbank') && (genBankNumberValid)) 
                || 
            ((refSelectValue === 'custom') && (customFilesCount > 0))
            )
           ) {
                $('#analyzeStart').removeAttr('disabled').addClass('btn-primary'); 
           } else {
                $('#analyzeStart').attr('disabled', true).removeClass('btn-primary');  
           }
    }
    $('#myFiles input, #refSelect, #refList input, #genBankNumber').change(function () {
        showAnalyze();    
    });
    
    /* Окно медленного соединения */
    $('#slowConnection a').click(function (e) {
        e.preventDefault();
        var title = "You can ship hard drive with your files to iBinom:";
        var text = $('#slowConnectionDescription').html();
        TextModal(title, text);    
    });
    
    /* Выбор Reference */
    $('#refSelect').change(function() {
        $('#refList input').tooltip('destroy');
        $('#genBank').hide();
        $('#refList .registerNotice').hide(); 
        $('#refList input').attr('disabled', true);
        $('#refList input').removeAttr('checked'); 
        var v = $(this).val();
        if (v === 'custom') {
            $('#refList input').removeAttr('disabled'); 
            $('#refList .registerNotice').show();   
        } else {
            $('#refList input').tooltip({'placement': 'left'});    
        }
        if (v === 'genbank') {
            $('#genBank').show();    
        }
        showDragAndDrop();
    });
    
    $('#refList input').tooltip({'placement': 'left'});
    
    function showDragAndDrop() {
        var els = $('#refList li');
        var elCount = els.length;
        var customRef = ($('#refSelect').val() === 'custom');
        if ((elCount == 1) && customRef) {
            $('#refList .alert').fadeIn();
        } else {
            $('#refList .alert').fadeOut();
        }
    }
    
    showDragAndDrop();
    
    $('#genBankNumber').keyup(function (e) {
        var numFound = CheckGenBankNumber($(this).val()); 
        if (!numFound) { 
            $("#genBank .alert").fadeIn(); 
        } else {
            $("#genBank .alert").fadeOut();     
        }
        showAnalyze();         
    });
    
    function CheckGenBankNumber(n) {
        var number = parseInt(n);
        var numbers = [1,3,4,6,7];
        if($.inArray(number, numbers) > -1) {
            return true;
        }
        return false;
    }
    
    /* Работа с таблицей результатов */
    $('#results thead a').click(function (e) {
        e.preventDefault();
    });
    
    $('.resultName a').click(function (e) {
        e.preventDefault();
        replaceWithInput(this);
    });
    
    function replaceWithInput(el) {
        var text = $(el).text();
        var replacement = $('<input type="text" class="input-mini" value="' + text + '" />');
        replacement.change(function () { 
            replaceWithLink(this);    
        });
        $(el).replaceWith(replacement);
    }
    
    function replaceWithLink(el) {
        var text = $(el).val();
        var replacement = $('<a href="#">' + text + '</a>');
        replacement.click(function (e) {
            e.preventDefault();
            replaceWithInput(this);  
        });
        $(el).replaceWith(replacement);
    }
    
    $('.resultConsensus a').click(function (e) {
        e.preventDefault();
        var tempElement = $('<span class="loading"></span>');
        $(this).parent().append(tempElement);
        window.setTimeout(function () {
            tempElement.remove();
        }, 3000);
    });
    
    
    function SortResultsBy(colname) {
        //var resultRows = 
    }
    
    /* Страница аккаунта */
    
    /* Если выбор плана или места поменялся - меняем кнопку на Update */
    $('#currentPlan input, #currentSpace input').change(function () {
        CheckPlans();  
    });                 

    $('#registerAccount').click(function (e) {
        e.preventDefault();
        RegisterAccount();
    });

    $('#inputPassword1').change(function () {
        $('#saveInfoChangesBlock').fadeIn();
    });

    $('#inputPassword2').keyup(function (e) {
        checkPasswords();
    });
    
    function checkPasswords () {
        var thisval = $('#inputPassword2').val();
        var firstval =  $('#inputPassword1').val();
        if (thisval ==  firstval) {
            $('#inputPassword2').parents('.control-group').removeClass('error');
        } else {
            $('#inputPassword2').parents('.control-group').addClass('error');
        }    
    }

    function CheckPlans() {
        UpdateSum();
        var planChanged = ($('#currentPlan input:checked').data('current') == 0);
        var spaceChanged = ($('#currentSpace input:checked').data('current') == 0);
        if (planChanged || spaceChanged) {
            $('#updateAccount').show();
            $('#saveChanges').hide();
        } else {
            $('#updateAccount').hide();
            $('#saveChanges').show();    
        }       
    }

    var newCard = false;

    $('#billing input, #billing select').change(function () {
        newCard = true;
        UpdateSum();
    });

    function UpdateSum() {
        var sum = ($('#currentPlan input:checked').data('price') + (newCard ? 2 : 0) ) + ' + $' + $('#currentSpace input:checked').data('price') + ' monthly' ;
        UpdatePrice(sum);
    }
    
    CheckPlans();

    $('#inputEmail, #n').keyup(function (e) {
        if (!CheckEmail($(this).val())) {
            $(this).parents('.control-group').addClass('error');
            $(this).siblings('.help-inline').show();
        } else {
            $(this).parents('.control-group').removeClass('error');
            $(this).siblings('.help-inline').hide();
        }
    });


    $('#updateAccount').click(function (e) {
        e.preventDefault();
        UpdateAccount();    
    });
    
    $('#saveChanges').click(function (e) {
        e.preventDefault();
        SaveChanges();    
    });
    
    $('#saveSuccess, #updateFail').click(function () {
        $(this).fadeOut();
    });
    
    if ($('#results').length) {
        var tableOffset = $("#resultsStart").offset().top;
        var $header = $("#results > thead").clone();
        var $fixedHeader = $("#resultsOverlay").append($header);
        
        $(window).bind("scroll", function() {
            var offset = $(this).scrollTop();
        
            if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
                $fixedHeader.show();
                var $overlayCols = $("#resultsOverlay th");
                var $origCols = $("#results th");
                
                for (var i = 0, l = $origCols.length; i < l; i++) {
                    $($overlayCols[i]).css({'width': $($origCols[i]).width() });    
                } 
            }
            else if (offset < tableOffset) {
                $fixedHeader.hide();
            }
        });
    }
       
});
