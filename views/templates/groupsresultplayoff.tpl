{include file='index_layout_top.tpl'}    
    
<div align="center">
    <div id="main">

        <form action="/getPlayOffResults/">
      
            {foreach from=$dataresults item=result}
                <li>{$result['teamNameOpponent1']} - {$result['teamNameOpponent2']} {$result['goalsOpponent1']}:{$result['goalsOpponent2']}</li>
                <input type="hidden" value="{$result['winnerId']}" name="teams[]">
            {/foreach}
        {if count($dataresults)>1}
        <button type="submit" class="btn btn-default" id="submit" />Далее</button>
        {/if}
        </form>
    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{include file='index_layout_bottom.tpl'}