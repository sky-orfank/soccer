{include file='index_layout_top.tpl'}    
    
<div align="center">
    <div id="main">

        <form action="/getGroupsResult/">
        {foreach from=$teams item=group key=key}

            {$key} 
                  

            {foreach from=$group item=team}
                <li>{$team['teamName']}</li>
                <input type="hidden" value="{$team['id']}" name="groups[{$key}][]">
            {/foreach}



        {/foreach}


        <button type="submit" class="btn btn-default" id="submit" />Запустить групповые матчи</button>
        </form>
    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="/assets/js/index.js"></script>
{include file='index_layout_bottom.tpl'}