<script language="javascript" type="text/javascript">
                (function(){
                // Dialog
                $('#dialog').dialog({
                    autoOpen: false,
                    width: 600,
                    buttons: {
                        "Ok": function() {
                            $(this).dialog("close");
                        },
                        "Cancel": function() {
                            $(this).dialog("close");
                        }
                    }
                });
                // Dialog Link
                $('#dialog_link').click(function(){
                    $('#dialog').dialog('open');
                    return false;
                });        
 
                //hover states on the static widgets
                $('#dialog_link, ul#icons li').hover(
                    function() { $(this).addClass('ui-state-hover'); },
                    function() { $(this).removeClass('ui-state-hover'); }
                );
 
            });
</script>

<a href="#" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-newwin"></span>Abrir Dialog</a></p>
 
            <!-- ui-dialog -->
        <div id="dialog" title="Aqui você coloca o título">
            <p>Texto que fica dentro do dialog</p>
        </div>