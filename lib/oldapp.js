    /**
     * Путь с скрипту для удалению
     */         
    var deletePath = '#';
    
    /**
     * Переключение табов сверху
     */             
    $('#topTabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    /**
     * Сначала показываем первый таб.
     */         
    $('#topTabs a:first').tab('show');
    
    /**
     * Удаление выбранных результатов
     */         
    $('#deleteResults').click(function () {
        var checkedInputs = $('#results input.delete-result:checked'),
            ids = [],
            idsString = '';
        checkedInputs.each(function () {
            ids.push($(this).data('result'));    
        });
        
        /**
         * В данном случае id идут просто строкой через запятую.
         */                 
        idsString = (ids.join(','));
        
        checkedInputs.parents('tr').hide(function () {            
            $(this).remove();
            /**
             * Далее запрос на сервер на удаление результатов             
             */ 
            $.get(deletePath, function() {
                
            });                            
        });
    });
    
    /**
     * Визуальное удаление Reference
     */         
    $('.deleteRef').click(function () {
        var $this = $(this);
        var refId = $this.data('refid');
                
        $('#ref-' + refId).fadeOut(function () {
            $(this).remove();    
        });
    })
    
    /**
     * Прячем поле результатов
     */         
    $('#after-analysis').hide();
    
    /**
     * Начало анализа
     */         
    $('#analyzeStart').click(function() {
        $('#before-analysis').hide();
        $('#after-analysis').show();           
    });
    
    function fillEstimates() {
        $('#estTime').html((Math.round(Math.random() * 1000) + 300) + ':' + '03' );     
    }
    
    fillEstimates(); 