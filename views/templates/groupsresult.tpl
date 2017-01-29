{include file='index_layout_top.tpl'}    
    
<div align="center">
    <div id="main">

        <form action="/getHalfPlayOffResult/">
        {foreach from=$dataGroups item=group key=key}

            {$key} 
                  
            {$i = 0}
            {foreach from=$group item=team}
                <li>{$team['teamName']}
                    <b> И:</b>{$team['countGames']}
                    <b> В:</b>{$team['countWin']}
                    <b> Н:</b>{$team['countStandoff']}
                    <b> П:</b>{$team['countLose']}
                    <b> Голы:</b>{$team['goals']} - {$team['goalsLose']}
                    <b> +-:</b>{$team['goals']-$team['goalsLose']}
                    <b> О:</b>{$team['score']}
                </li>

                {if $i<2}
                    <input type="hidden" value="{$team['teamId']}" name="groups[{$key}][{$i++}]">
                {/if}
                     
            {/foreach}



        {/foreach}


        <button type="submit" class="btn btn-default" id="submit" />Запустить плей-офф</button>
        </form>
    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="/assets/js/index.js"></script>
{include file='index_layout_bottom.tpl'}